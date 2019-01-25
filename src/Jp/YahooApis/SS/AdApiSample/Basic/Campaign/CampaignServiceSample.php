<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Campaign;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{BiddingStrategy\BiddingStrategyServiceSample, FeedFolder\FeedFolderServiceSample};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyType as BSBiddingStrategyType;
use Jp\YahooApis\SS\V201901\Campaign\{AppStore,
    BiddingStrategyType,
    Budget,
    BudgetDeliveryMethod,
    BudgetPeriod,
    Campaign,
    CampaignBiddingStrategy,
    CampaignOperation,
    CampaignSelector,
    CampaignService,
    CampaignType,
    CustomParameter,
    CustomParameters,
    DynamicAdsForSearchSetting,
    EnhancedCpcEnabled,
    GeoTargetType,
    GeoTargetTypeSetting,
    get,
    getResponse,
    ManualCpcBiddingScheme,
    mutate,
    mutateResponse,
    Operator,
    SettingType,
    TargetAll,
    TargetingSetting,
    TargetSpendBiddingScheme,
    UrlApprovalStatus,
    UserStatus};
use Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderPlaceholderType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignService operation and Utility method collection.
 */
class CampaignServiceSample
{

    const SERVICE_NAME = 'CampaignService';

    /**
     * @var CampaignService
     */
    private static $service = null;

    /**
     * CampaignServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignService::class);
    }

    /**
     * example get campaigns.
     *
     * @param get $request
     * @return getResponse
     * @throws Exception
     */
    public static function get(get $request): getResponse
    {
        self::init();

        // Call API
        $response = self::$service->get($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example mutate campaigns.
     *
     * @param mutate $request
     * @return mutateResponse
     * @throws Exception
     */
    public static function mutate(mutate $request): mutateResponse
    {
        self::init();

        // Call API
        $response = self::$service->mutate($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example check campaign review status.
     *
     * @param int[] $campaignIds
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $campaignIds): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for Campaign Review Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $campaignIds);
            $getResponse = self::get($getRequest);

            $approvalCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $campaignValues) {
                if (!is_null($campaignValues->getCampaign()->getUrlReviewData()->getUrlApprovalStatus())) {
                    switch ($campaignValues->getCampaign()->getUrlReviewData()->getUrlApprovalStatus()) {
                        default:
                        case UrlApprovalStatus::REVIEW:
                        case UrlApprovalStatus::APPROVED_WITH_REVIEW:
                            continue 1;
                        case UrlApprovalStatus::DISAPPROVED:
                            throw new Exception('Campaign Review Status failed.');
                        case UrlApprovalStatus::NONE:
                        case UrlApprovalStatus::APPROVED:
                            $approvalCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get CampaignService.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $approvalCount) {
                return;
            }
        }

        throw new Exception('Fail to get CampaignService.');
    }

    /**
     * create basic Campaign.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $parentValuesHolder = self::setup();
        $parentValuesRepositoryFacade = new ValuesRepositoryFacade($parentValuesHolder);
        $accountId = SoapUtils::getAccountId();
        $feedFolderId = $parentValuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedFolderId(
            FeedFolderPlaceholderType::DYNAMIC_AD_FOR_SEARCH_PAGE_FEEDS
        );

        // sleep 30 second.
        sleep(30);

        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
            self::createExampleStandardCampaign(
                'SampleManualCpcStandardCampaign_',
                self::createManualBiddingCampaignBiddingStrategy()
            ),
            self::createExampleMobileAppCampaignForIOS(
                'SampleManualCpcIOSCampaign_',
                self::createManualBiddingCampaignBiddingStrategy()
            ),
            self::createExampleDynamicAdsForSearchCampaign(
                'SampleManualCpcDynamicAdsForSearchCampaign_',
                [$feedFolderId],
                self::createManualBiddingCampaignBiddingStrategy()),
        ]);
        $response = self::mutate($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($parentValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($parentValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($response->getRval()->getValues());
        return $selfValuesHolder;
    }

    /**
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        $biddingStrategyValuesHolder = BiddingStrategyServiceSample::create();
        $feedFolderValuesHolder = FeedFolderServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($biddingStrategyValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($feedFolderValuesHolder->getFeedFolderValuesList());
        return $selfValuesHolder;
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        if (count($valuesHolder->getCampaignValuesList()) > 0) {
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            self::mutate(
                self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                    $valuesRepositoryFacade->getCampaignValuesRepository()->getCampaigns()
                )
            );
        }
        BiddingStrategyServiceSample::cleanup($valuesHolder);
        FeedFolderServiceSample::cleanup($valuesHolder);
    }

    /**
     * example CampaignService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesHolder = new ValuesHolder();
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // check & create upper service object.
            // =================================================================
            $valuesHolder = self::setup();
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            $biddingStrategyId = $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->findBiddingStrategyId(BSBiddingStrategyType::PAGE_ONE_PROMOTED);

            sleep(30);

            // =================================================================
            // CampaignService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                // Manual Bidding
                self::createExampleStandardCampaign(
                    'SampleManualCpcStandardCampaign_', self::createManualBiddingCampaignBiddingStrategy()),
                // Portfolio Bidding
                self::createExampleStandardCampaign(
                    'SamplePortfolioBiddingStandardCampaign_', self::createPortfolioBiddingCampaignBiddingStrategy($biddingStrategyId)),
                // Standard Bidding
                self::createExampleStandardCampaign(
                    'SampleStandardBiddingStandardCampaign_', self::createStandardBiddingCampaignBiddingStrategy()),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesHolder->setCampaignValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // CampaignService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getCampaignValuesRepository()->getCampaignIds());

            // run
            self::get($getRequest);

            // check review status
            self::checkStatus($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaignIds());

            // =================================================================
            // CampaignService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaigns())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // CampaignService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getCampaignValuesRepository()->getCampaigns()
            );

            // run
            self::mutate($removeRequest);
            $valuesHolder->setCampaignValuesList([]);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            self::cleanup($valuesHolder);
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $campaignIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignIds): get
    {
        $selector = new CampaignSelector($accountId);

        if (!is_null($campaignIds)) {
            $selector->setCampaignIds($campaignIds);
        }

        $selector->setUserStatuses([
            UserStatus::ACTIVE,
            UserStatus::PAUSED,
        ]);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param Campaign[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example Standard Campaign request.
     *
     * @param string $campaignNamePrefix
     * @param CampaignBiddingStrategy|null $campaignBiddingStrategy
     * @return Campaign
     */
    public static function createExampleStandardCampaign(string $campaignNamePrefix, CampaignBiddingStrategy $campaignBiddingStrategy = null): Campaign
    {
        $campaign = new Campaign();
        $campaign->setCampaignName($campaignNamePrefix . SoapUtils::getCurrentTimestamp());
        $campaign->setUserStatus(UserStatus::ACTIVE);
        $campaign->setStartDate(date('Ymd'));
        $campaign->setEndDate('20301231');
        $campaign->setCampaignType(CampaignType::STANDARD);
        $campaign->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set budget
        $budget = new Budget();
        $budget->setPeriod(BudgetPeriod::DAILY);
        $budget->setAmount(1000);
        $budget->setDeliveryMethod(BudgetDeliveryMethod::STANDARD);
        $campaign->setBudget($budget);

        // set BiddingStrategyConfiguration
        if (!is_null($campaignBiddingStrategy)) {
            $campaign->setBiddingStrategyConfiguration($campaignBiddingStrategy);
        }

        // set settings
        $geoTargetTypeSetting = new GeoTargetTypeSetting();
        $geoTargetTypeSetting->setType(SettingType::GEO_TARGET_TYPE_SETTING);
        $geoTargetTypeSetting->setNegativeGeoTargetType(GeoTargetType::DONT_CARE);
        $geoTargetTypeSetting->setPositiveGeoTargetType(GeoTargetType::AREA_OF_INTENT);
        $targetingSetting = new TargetingSetting();
        $targetingSetting->setType(SettingType::TARGET_LIST_SETTING);
        $targetingSetting->setTargetAll(TargetAll::ACTIVE);
        $campaign->setSettings([
            $geoTargetTypeSetting,
            $targetingSetting
        ]);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $campaign->setCustomParameters($customParameters);

        return $campaign;
    }

    /**
     * example MobileApp Campaign for IOS request.
     *
     * @param string $campaignNamePrefix
     * @param CampaignBiddingStrategy|null $campaignBiddingStrategy
     * @return Campaign
     */
    public static function createExampleMobileAppCampaignForIOS(string $campaignNamePrefix, CampaignBiddingStrategy $campaignBiddingStrategy = null): Campaign
    {
        $campaign = new Campaign();
        $campaign->setCampaignName($campaignNamePrefix . SoapUtils::getCurrentTimestamp());
        $campaign->setUserStatus(UserStatus::ACTIVE);
        $campaign->setStartDate(date('Ymd'));
        $campaign->setEndDate('20301231');
        $campaign->setCampaignType(CampaignType::MOBILE_APP);
        $campaign->setAppStore(AppStore::IOS);
        $campaign->setAppId(SoapUtils::getCurrentTimestamp());
        $campaign->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set budget
        $budget = new Budget();
        $budget->setPeriod(BudgetPeriod::DAILY);
        $budget->setAmount(1000);
        $budget->setDeliveryMethod(BudgetDeliveryMethod::STANDARD);
        $campaign->setBudget($budget);

        // set BiddingStrategyConfiguration
        if (!is_null($campaignBiddingStrategy)) {
            $campaign->setBiddingStrategyConfiguration($campaignBiddingStrategy);
        }

        // set settings
        $geoTargetTypeSetting = new GeoTargetTypeSetting();
        $geoTargetTypeSetting->setType(SettingType::GEO_TARGET_TYPE_SETTING);
        $geoTargetTypeSetting->setNegativeGeoTargetType(GeoTargetType::DONT_CARE);
        $geoTargetTypeSetting->setPositiveGeoTargetType(GeoTargetType::AREA_OF_INTENT);
        $targetingSetting = new TargetingSetting();
        $targetingSetting->setType(SettingType::TARGET_LIST_SETTING);
        $targetingSetting->setTargetAll(TargetAll::ACTIVE);
        $campaign->setSettings([
            $geoTargetTypeSetting,
            $targetingSetting
        ]);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $campaign->setCustomParameters($customParameters);

        return $campaign;
    }

    /**
     * example MobileApp Campaign for ANDROID request.
     *
     * @param string $campaignNamePrefix
     * @param CampaignBiddingStrategy|null $campaignBiddingStrategy
     * @return Campaign
     */
    public static function createExampleMobileAppCampaignForANDROID(string $campaignNamePrefix, CampaignBiddingStrategy $campaignBiddingStrategy = null): Campaign
    {
        $campaign = new Campaign();
        $campaign->setCampaignName($campaignNamePrefix . SoapUtils::getCurrentTimestamp());
        $campaign->setUserStatus(UserStatus::ACTIVE);
        $campaign->setStartDate(date('Ymd'));
        $campaign->setEndDate('20301231');
        $campaign->setCampaignType(CampaignType::MOBILE_APP);
        $campaign->setAppStore(AppStore::ANDROID);
        $campaign->setAppId('jp.co.yahoo.' . SoapUtils::getCurrentTimestamp());

        // set budget
        $budget = new Budget();
        $budget->setPeriod(BudgetPeriod::DAILY);
        $budget->setAmount(1000);
        $budget->setDeliveryMethod(BudgetDeliveryMethod::STANDARD);
        $campaign->setBudget($budget);

        // set BiddingStrategyConfiguration
        if (!is_null($campaignBiddingStrategy)) {
            $campaign->setBiddingStrategyConfiguration($campaignBiddingStrategy);
        }

        // set settings
        $geoTargetTypeSetting = new GeoTargetTypeSetting();
        $geoTargetTypeSetting->setType(SettingType::GEO_TARGET_TYPE_SETTING);
        $geoTargetTypeSetting->setNegativeGeoTargetType(GeoTargetType::DONT_CARE);
        $geoTargetTypeSetting->setPositiveGeoTargetType(GeoTargetType::AREA_OF_INTENT);
        $targetingSetting = new TargetingSetting();
        $targetingSetting->setType(SettingType::TARGET_LIST_SETTING);
        $targetingSetting->setTargetAll(TargetAll::ACTIVE);
        $campaign->setSettings([
            $geoTargetTypeSetting,
            $targetingSetting
        ]);

        return $campaign;
    }

    /**
     * example Dynamic Ads for Search Campaign request.
     *
     * @param string $campaignNamePrefix
     * @param string[] $feedFolderIds FeedFolderIds
     * @param CampaignBiddingStrategy|null $campaignBiddingStrategy
     * @return Campaign
     */
    public static function createExampleDynamicAdsForSearchCampaign(string $campaignNamePrefix, array $feedFolderIds = [], CampaignBiddingStrategy $campaignBiddingStrategy = null): Campaign
    {
        $campaign = new Campaign();
        $campaign->setCampaignName($campaignNamePrefix . SoapUtils::getCurrentTimestamp());
        $campaign->setUserStatus(UserStatus::ACTIVE);
        $campaign->setStartDate(date('Ymd'));
        $campaign->setEndDate('20301231');
        $campaign->setCampaignType(CampaignType::DYNAMIC_ADS_FOR_SEARCH);
        $campaign->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set budget
        $budget = new Budget();
        $budget->setPeriod(BudgetPeriod::DAILY);
        $budget->setAmount(1000);
        $budget->setDeliveryMethod(BudgetDeliveryMethod::STANDARD);
        $campaign->setBudget($budget);

        // set BiddingStrategyConfiguration
        if (!is_null($campaignBiddingStrategy)) {
            $campaign->setBiddingStrategyConfiguration($campaignBiddingStrategy);
        }

        // set settings
        $geoTargetTypeSetting = new GeoTargetTypeSetting();
        $geoTargetTypeSetting->setType(SettingType::GEO_TARGET_TYPE_SETTING);
        $geoTargetTypeSetting->setNegativeGeoTargetType(GeoTargetType::DONT_CARE);
        $geoTargetTypeSetting->setPositiveGeoTargetType(GeoTargetType::AREA_OF_INTENT);
        $targetingSetting = new TargetingSetting();
        $targetingSetting->setType(SettingType::TARGET_LIST_SETTING);
        $targetingSetting->setTargetAll(TargetAll::ACTIVE);
        $dynamicAdsForSearchSetting = new DynamicAdsForSearchSetting();
        $dynamicAdsForSearchSetting->setType(SettingType::DYNAMIC_ADS_FOR_SEARCH_SETTING);
        $dynamicAdsForSearchSetting->setFeedFolderIds($feedFolderIds);
        $campaign->setSettings([
            $geoTargetTypeSetting,
            $targetingSetting,
            $dynamicAdsForSearchSetting
        ]);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $campaign->setCustomParameters($customParameters);

        return $campaign;
    }

    /**
     * example Manual Bidding CampaignBiddingStrategy request.
     *
     * @return CampaignBiddingStrategy
     */
    public static function createManualBiddingCampaignBiddingStrategy(): CampaignBiddingStrategy
    {
        $biddingStrategyConfiguration = new CampaignBiddingStrategy();
        $biddingStrategyConfiguration->setBiddingStrategyType(BiddingStrategyType::MANUAL_CPC);
        $manualCpcBiddingScheme = new ManualCpcBiddingScheme();
        $manualCpcBiddingScheme->setBiddingStrategyType(BiddingStrategyType::MANUAL_CPC);
        $manualCpcBiddingScheme->setEnhancedCpcEnabled(EnhancedCpcEnabled::FALSE);
        $biddingStrategyConfiguration->setBiddingScheme($manualCpcBiddingScheme);
        return $biddingStrategyConfiguration;
    }

    /**
     * example Portfolio Bidding CampaignBiddingStrategy request.
     *
     * @param int $biddingStrategyId
     * @return CampaignBiddingStrategy
     */
    public static function createPortfolioBiddingCampaignBiddingStrategy(int $biddingStrategyId): CampaignBiddingStrategy
    {
        $biddingStrategyConfiguration = new CampaignBiddingStrategy();
        $biddingStrategyConfiguration->setBiddingStrategyId($biddingStrategyId);
        return $biddingStrategyConfiguration;
    }

    /**
     * example Standard Bidding CampaignBiddingStrategy request.
     *
     * @return CampaignBiddingStrategy
     */
    public static function createStandardBiddingCampaignBiddingStrategy(): CampaignBiddingStrategy
    {
        $biddingStrategyConfiguration = new CampaignBiddingStrategy();
        $biddingStrategyConfiguration->setBiddingStrategyType(BiddingStrategyType::TARGET_SPEND);
        $targetSpendBiddingScheme = new TargetSpendBiddingScheme();
        $targetSpendBiddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_SPEND);
        $targetSpendBiddingScheme->setBidCeiling(700);
        $targetSpendBiddingScheme->setSpendTarget(10);
        $biddingStrategyConfiguration->setBiddingScheme($targetSpendBiddingScheme);
        return $biddingStrategyConfiguration;
    }

    /**
     * example campaigns set request.
     *
     * @param Campaign[] $campaigns
     * @return Campaign[]
     */
    public static function createExampleSetRequest(array $campaigns): array
    {
        // create operands
        $operands = [];

        foreach ($campaigns as $campaign) {

            $operand = new Campaign();
            $operand->setCampaignId($campaign->getCampaignId());
            $operand->setCampaignName('Sample_UpdateOn_' . $campaign->getCampaignId() . '_' . SoapUtils::getCurrentTimestamp());
            $operand->setUserStatus(UserStatus::PAUSED);
            $operand->setEndDate('20371231');

            // set budget
            $budget = new Budget();
            $budget->setAmount(2000);
            $budget->setDeliveryMethod(BudgetDeliveryMethod::ACCELERATED);
            $operand->setBudget($budget);

            // set TrackingUrl & customParameters
            if ($campaign->getCampaignType() === CampaignType::STANDARD
                || $campaign->getCampaignType() === CampaignType::DYNAMIC_ADS_FOR_SEARCH
                || ($campaign->getCampaignType() === CampaignType::MOBILE_APP && $campaign->getAppStore() === AppStore::IOS)) {
                $operand->setTrackingUrl('http://yahoo.co.jp?url={lpurl}&amp;a={creative}&amp;pid={_id2}');

                // set customParameters
                $customParameter = new CustomParameter();
                $customParameter->setKey('id2');
                $customParameter->setValue('5678');
                $customParameters = new CustomParameters();
                $customParameters->setParameters([$customParameter]);
                $operand->setCustomParameters($customParameters);
            }

            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}

