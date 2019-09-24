<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroup;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroup\{AdGroup,
    AdGroupAdRotationMode,
    AdGroupOperation,
    AdGroupSelector,
    AdGroupService,
    AdRotationMode,
    Bid,
    CriterionType,
    CustomParameter,
    CustomParameters,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    TargetAll,
    TargetingSetting,
    UrlApprovalStatus,
    UserStatus};
use Jp\YahooApis\SS\V201909\Campaign\CampaignType;
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example AdGroupService operation and Utility method collection.
 */
class AdGroupServiceSample
{

    const SERVICE_NAME = 'AdGroupService';

    /**
     * @var AdGroupService
     */
    private static $service = null;

    /**
     * AdGroupServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupService::class);
    }

    /**
     * example get adGroups.
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
     * example mutate adGroups.
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
     * example check adGroup review status.
     *
     * @param AdGroup[] $adGroups
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $adGroups): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for AdGroup Review Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $adGroups);
            $getResponse = self::get($getRequest);

            $approvalCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $adGroupValues) {
                if (!is_null($adGroupValues->getAdGroup()->getUrlReviewData()->getUrlApprovalStatus())) {
                    switch ($adGroupValues->getAdGroup()->getUrlReviewData()->getUrlApprovalStatus()) {
                        default:
                        case UrlApprovalStatus::REVIEW:
                        case UrlApprovalStatus::APPROVED_WITH_REVIEW:
                            continue 1;
                        case UrlApprovalStatus::DISAPPROVED:
                            throw new Exception('AdGroup Review Status failed.');
                        case UrlApprovalStatus::NONE:
                        case UrlApprovalStatus::APPROVED:
                            $approvalCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get AdGroupService.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $approvalCount) {
                return;
            }
        }

        throw new Exception('Fail to get AdGroupService.');
    }

    /**
     * create basic AdGroup.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $parentValuesHolder = self::setup();
        $parentValuesRepositoryFacade = new ValuesRepositoryFacade($parentValuesHolder);
        $accountId = SoapUtils::getAccountId();
        $campaignIdStandard = $parentValuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
        $campaignIdMobileApp = $parentValuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::MOBILE_APP);
        $campaignIdDynamicAdsForSearch = $parentValuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::DYNAMIC_ADS_FOR_SEARCH);

        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
            self::createExampleStandardAdGroup($campaignIdStandard),
            self::createExampleMobileAppIOSAdGroup($campaignIdMobileApp),
            self::createExampleDynamicAdsForSearchAdGroup($campaignIdDynamicAdsForSearch),
        ]);
        $response = self::mutate($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($parentValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($parentValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($parentValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($response->getRval()->getValues());
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
        return CampaignServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        CampaignServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupService operation.
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(
                CampaignType::STANDARD
            );

            // =================================================================
            // AdGroupService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleStandardAdGroup($campaignId),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesHolder->setAdGroupValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // AdGroupService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());

            // run
            self::get($getRequest);

            // check review status
            self::checkStatus($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());

            // =================================================================
            // AdGroupService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // AdGroupService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups()
            );

            // run
            self::mutate($removeRequest);
            $valuesHolder->setAdGroupValuesList([]);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;

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
     * @param AdGroup[] $adGroups
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, $adGroups): get
    {
        $selector = new AdGroupSelector($accountId);

        if (!is_null($adGroups)) {
            $campaignIds = [];
            $adGroupIds = [];
            foreach ($adGroups as $adGroup) {
                $campaignIds[] = $adGroup->getCampaignId();
                $adGroupIds[] = $adGroup->getAdGroupId();
            }
            $selector->setCampaignIds($campaignIds);
            $selector->setAdGroupIds($adGroupIds);
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
     * @param AdGroup[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example Standard AdGroup request.
     *
     * @param int $campaignId
     * @return AdGroup
     */
    public static function createExampleStandardAdGroup(int $campaignId): AdGroup
    {
        $adGroup = new AdGroup($campaignId);
        $adGroup->setAdGroupName('SampleStandardAdGroup_' . $campaignId . '_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroup->setUserStatus(UserStatus::ACTIVE);
        $adGroup->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set bid
        $bid = new Bid();
        $bid->setMaxCpc(100);
        $adGroup->setBid($bid);

        // set settings
        $setting = new TargetingSetting(CriterionType::TARGET_LIST);
        $setting->setTargetAll(TargetAll::ACTIVE);
        $adGroup->setSettings($setting);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $adGroup->setCustomParameters($customParameters);

        // set ad rotation mode
        $adGroupAdRotationMode = new AdGroupAdRotationMode();
        $adGroupAdRotationMode->setAdRotationMode(AdRotationMode::ROTATE_FOREVER);
        $adGroup->setAdGroupAdRotationMode($adGroupAdRotationMode);

        return $adGroup;
    }

    /**
     * example MobileApp IOS AdGroup request.
     *
     * @param int $campaignId
     * @return AdGroup
     */
    public static function createExampleMobileAppIOSAdGroup(int $campaignId): AdGroup
    {
        $adGroup = new AdGroup($campaignId);
        $adGroup->setAdGroupName('SampleMobileAppIOSAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroup->setUserStatus(UserStatus::ACTIVE);
        $adGroup->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set bid
        $bid = new Bid();
        $bid->setMaxCpc(100);
        $adGroup->setBid($bid);

        // set settings
        $setting = new TargetingSetting(CriterionType::TARGET_LIST);
        $setting->setTargetAll(TargetAll::ACTIVE);
        $adGroup->setSettings($setting);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $adGroup->setCustomParameters($customParameters);

        // set ad rotation mode
        $adGroupAdRotationMode = new AdGroupAdRotationMode();
        $adGroupAdRotationMode->setAdRotationMode(AdRotationMode::ROTATE_FOREVER);
        $adGroup->setAdGroupAdRotationMode($adGroupAdRotationMode);

        return $adGroup;
    }

    /**
     * example MobileApp ANDROID AdGroup request.
     *
     * @param int $campaignId
     * @return AdGroup
     */
    public static function createExampleMobileAppANDROIDAdGroup(int $campaignId): AdGroup
    {
        $adGroup = new AdGroup($campaignId);
        $adGroup->setAdGroupName('SampleMobileAppANDROIDAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroup->setUserStatus(UserStatus::ACTIVE);

        // set bid
        $bid = new Bid();
        $bid->setMaxCpc(100);
        $adGroup->setBid($bid);

        // set settings
        $setting = new TargetingSetting(CriterionType::TARGET_LIST);
        $setting->setTargetAll(TargetAll::ACTIVE);
        $adGroup->setSettings($setting);

        // set ad rotation mode
        $adGroupAdRotationMode = new AdGroupAdRotationMode();
        $adGroupAdRotationMode->setAdRotationMode(AdRotationMode::ROTATE_FOREVER);
        $adGroup->setAdGroupAdRotationMode($adGroupAdRotationMode);

        return $adGroup;
    }

    /**
     * example DynamicAdsForSearch AdGroup request.
     *
     * @param int $campaignId
     * @return AdGroup
     */
    public static function createExampleDynamicAdsForSearchAdGroup(int $campaignId): AdGroup
    {
        $adGroup = new AdGroup($campaignId);
        $adGroup->setAdGroupName('SampleDynamicAdsForSearchAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroup->setUserStatus(UserStatus::ACTIVE);
        $adGroup->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set bid
        $bid = new Bid();
        $bid->setMaxCpc(100);
        $adGroup->setBid($bid);

        // set settings
        $setting = new TargetingSetting(CriterionType::TARGET_LIST);
        $setting->setTargetAll(TargetAll::ACTIVE);
        $adGroup->setSettings($setting);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $adGroup->setCustomParameters($customParameters);

        // set ad rotation mode
        $adGroupAdRotationMode = new AdGroupAdRotationMode();
        $adGroupAdRotationMode->setAdRotationMode(AdRotationMode::ROTATE_FOREVER);
        $adGroup->setAdGroupAdRotationMode($adGroupAdRotationMode);

        return $adGroup;
    }

    /**
     * example adGroup set request.
     *
     * @param AdGroup[] $adGroups
     * @return AdGroup[]
     */
    public static function createExampleSetRequest(array $adGroups): array
    {
        // create operands
        $operands = [];

        foreach ($adGroups as $adGroup) {

            $operand = new AdGroup($adGroup->getCampaignId());
            $operand->setAdGroupId($adGroup->getAdGroupId());
            $operand->setAdGroupName('Sample_UpdateOn_' . $adGroup->getAdGroupId() . '_' . SoapUtils::getCurrentTimestamp());
            $operand->setUserStatus(UserStatus::PAUSED);

            // set bid
            $bid = new Bid();
            $bid->setMaxCpc(150);
            $operand->setBid($bid);

            // set settings
            $setting = new TargetingSetting(CriterionType::TARGET_LIST);
            $setting->setTargetAll(TargetAll::DEACTIVE);
            $operand->setSettings($setting);

            // set ad rotation mode
            $adGroupAdRotationMode = new AdGroupAdRotationMode();
            $adGroupAdRotationMode->setAdRotationMode(AdRotationMode::OPTIMIZE);
            $operand->setAdGroupAdRotationMode($adGroupAdRotationMode);

            // set customParameters
            if ($adGroup->getUrlReviewData()->getUrlApprovalStatus() != UrlApprovalStatus::NONE) {
                $operand->setTrackingUrl('http://yahoo.co.jp?url={lpurl}&amp;a={creative}&amp;pid={_id2}');
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
    AdGroupServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
