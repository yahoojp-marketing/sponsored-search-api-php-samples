<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupAd;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupAd\{AdGroupAd,
    AdGroupAdAdditionalAdvancedMobileUrls,
    AdGroupAdAdditionalAdvancedUrls,
    AdGroupAdOperation,
    AdGroupAdSelector,
    AdGroupAdService,
    AdType,
    AppAd,
    ApprovalStatus,
    CustomParameter,
    CustomParameters,
    DevicePreference,
    DynamicSearchLinkedAd,
    ExtendedTextAd,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    UserStatus};
use Jp\YahooApis\SS\V201901\Campaign\AppStore;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example AdGroupAdService operation and Utility method collection.
 */
class AdGroupAdServiceSample
{

    const SERVICE_NAME = 'AdGroupAdService';

    /**
     * @var AdGroupAdService
     */
    private static $service = null;

    /**
     * AdGroupAdServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupAdService::class);
    }

    /**
     * example get adGroupAds.
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
     * example mutate adGroupAds.
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
     * create basic AdGroupAd.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $parentValuesHolder = self::setup();
        $parentValuesRepositoryFacade = new ValuesRepositoryFacade($parentValuesHolder);
        $accountId = SoapUtils::getAccountId();

        $campaignId = $parentValuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
        $adGroupId = $parentValuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
            self::createExampleExtendedTextAd($campaignId, $adGroupId),
        ]);
        $response = self::mutate($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($parentValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($parentValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($parentValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($parentValuesHolder->getAdGroupValuesList());
        $selfValuesHolder->setAdGroupAdValuesList($response->getRval()->getValues());
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
        return AdGroupServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        AdGroupServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupCriterionService operation.
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
            $campaignIdStandard = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(
                CampaignType::STANDARD
            );
            $campaignIdMobileAppCampaign = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(
                CampaignType::MOBILE_APP, AppStore::IOS
            );
            $appIdIOS = $valuesRepositoryFacade->getCampaignValuesRepository()->findAppId($campaignIdMobileAppCampaign);
            $campaignIdDynamicAdsForSearch = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(
                CampaignType::DYNAMIC_ADS_FOR_SEARCH
            );
            $adGroupIdStandard = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdStandard);
            $adGroupIdMobileAppCampaign = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdMobileAppCampaign);
            $adGroupIdDynamicAdsForSearch = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdDynamicAdsForSearch);

            // =================================================================
            // AdGroupAdService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleExtendedTextAd($campaignIdStandard, $adGroupIdStandard),
                self::createExampleAppAdIOS($campaignIdMobileAppCampaign, $appIdIOS, $adGroupIdMobileAppCampaign),
                self::createExampleDynamicSearchLinkedAd($campaignIdDynamicAdsForSearch, $adGroupIdDynamicAdsForSearch),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $adGroupAds = [];
            foreach ($addResponse->getRval()->getValues() as $adGroupAdValues) {
                $adGroupAds[] = $adGroupAdValues->getAdGroupAd();
            }

            // =================================================================
            // AdGroupAdService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($adGroupAds)
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // AdGroupAdService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $adGroupAds);

            // run
            self::get($getRequest);

            // =================================================================
            // AdGroupAdService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $adGroupAds);

            // run
            self::mutate($removeRequest);

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
     * @param AdGroupAd[] $adGroupAds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $adGroupAds): get
    {
        $selector = new AdGroupAdSelector($accountId);

        if (!is_null($adGroupAds)) {

            $campaignIds = [];
            $adGroupIds = [];
            $adIds = [];
            foreach ($adGroupAds as $adGroupAd) {
                $campaignIds[] = $adGroupAd->getCampaignId();
                $adGroupIds[] = $adGroupAd->getAdGroupId();
                $adIds[] = $adGroupAd->getAdId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setAdGroupIds(array_unique($adGroupIds));
            $selector->setAdIds($adIds);
        }

        $selector->setAdTypes([
            AdType::APP_AD,
            AdType::EXTENDED_TEXT_AD,
            AdType::DYNAMIC_SEARCH_LINKED_AD,
        ]);
        $selector->setUserStatuses([
            UserStatus::ACTIVE,
            UserStatus::PAUSED,
        ]);
        $selector->setApprovalStatuses([
            ApprovalStatus::APPROVED,
            ApprovalStatus::APPROVED_WITH_REVIEW,
            ApprovalStatus::REVIEW,
            ApprovalStatus::PRE_DISAPPROVED,
            ApprovalStatus::POST_DISAPPROVED,
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
     * @param AdGroupAd[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupAdOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example ExtendedText Ad request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return AdGroupAd
     */
    public static function createExampleExtendedTextAd(int $campaignId, int $adGroupId): AdGroupAd
    {
        // set ad
        $ad = new ExtendedTextAd();
        $ad->setType(AdType::EXTENDED_TEXT_AD);
        $ad->setHeadline('sample headline');
        $ad->setHeadline2('sample headline2');
        $ad->setDescription('sample ad desc');
        $ad->setPath1('path1');
        $ad->setPath2('path2');
        $ad->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set advanced url
        $ad->setAdvancedUrl('http://www.yahoo.co.jp');
        $additionalAdvancedUrls1 = new AdGroupAdAdditionalAdvancedUrls();
        $additionalAdvancedUrls1->setAdvancedUrl('http://www1.yahoo.co.jp');
        $additionalAdvancedUrls2 = new AdGroupAdAdditionalAdvancedUrls();
        $additionalAdvancedUrls2->setAdvancedUrl('http://www2.yahoo.co.jp');
        $additionalAdvancedUrls3 = new AdGroupAdAdditionalAdvancedUrls();
        $additionalAdvancedUrls3->setAdvancedUrl('http://www3.yahoo.co.jp');
        $ad->setAdditionalAdvancedUrls([
            $additionalAdvancedUrls1,
            $additionalAdvancedUrls2,
            $additionalAdvancedUrls3,
        ]);

        // set advanced mobile url
        $ad->setAdvancedMobileUrl('http://www.yahoo.co.jp/mobile');
        $adGroupAdAdditionalAdvancedMobileUrls1 = new AdGroupAdAdditionalAdvancedMobileUrls();
        $adGroupAdAdditionalAdvancedMobileUrls1->setAdvancedMobileUrl('http://www1.yahoo.co.jp/mobile');
        $adGroupAdAdditionalAdvancedMobileUrls2 = new AdGroupAdAdditionalAdvancedMobileUrls();
        $adGroupAdAdditionalAdvancedMobileUrls2->setAdvancedMobileUrl('http://www2.yahoo.co.jp/mobile');
        $adGroupAdAdditionalAdvancedMobileUrls3 = new AdGroupAdAdditionalAdvancedMobileUrls();
        $adGroupAdAdditionalAdvancedMobileUrls3->setAdvancedMobileUrl('http://www3.yahoo.co.jp/mobile');
        $ad->setAdditionalAdvancedMobileUrls([
            $adGroupAdAdditionalAdvancedMobileUrls1,
            $adGroupAdAdditionalAdvancedMobileUrls2,
            $adGroupAdAdditionalAdvancedMobileUrls3,
        ]);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $ad->setCustomParameters($customParameters);

        // set adgroupad
        $adGroupAd = new AdGroupAd($campaignId, $adGroupId);
        $adGroupAd->setAdName('SampleExtendedTextAd_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroupAd->setUserStatus(UserStatus::ACTIVE);
        $adGroupAd->setAd($ad);

        return $adGroupAd;
    }

    /**
     * example App Ad IOS request.
     *
     * @param int $campaignId
     * @param string $appId
     * @param int $adGroupId
     * @return AdGroupAd
     */
    public static function createExampleAppAdIOS(int $campaignId, string $appId, int $adGroupId): AdGroupAd
    {
        // set ad
        $ad = new AppAd();
        $ad->setType(AdType::APP_AD);
        $ad->setHeadline('sample headline');
        $ad->setDescription('sample ad desc');
        $ad->setDescription2('sample ad desc2');
        $ad->setDevicePreference(DevicePreference::SMART_PHONE);
        $ad->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set advanced url
        $ad->setAdvancedUrl("http://www.apple.com/jp/itunes/app/appname/{$appId}");

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $ad->setCustomParameters($customParameters);

        // set adgroupad
        $adGroupAd = new AdGroupAd($campaignId, $adGroupId);
        $adGroupAd->setAdName('SampleAppAdIOS_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroupAd->setUserStatus(UserStatus::ACTIVE);
        $adGroupAd->setAd($ad);

        return $adGroupAd;
    }

    /**
     * example App Ad ANDROID request.
     *
     * @param int $campaignId
     * @param string $appId
     * @param string $adGroupId
     * @return AdGroupAd
     */
    public static function createExampleAppAdANDROID(int $campaignId, string $appId, string $adGroupId): AdGroupAd
    {
        // set ad
        $ad = new AppAd();
        $ad->setType(AdType::APP_AD);
        $ad->setHeadline('sample headline');
        $ad->setDescription('sample ad desc');
        $ad->setDescription2('sample ad desc2');
        $ad->setDevicePreference(DevicePreference::SMART_PHONE);

        // set advanced url
        $ad->setAdvancedUrl("https://play.google.com/store/apps/details?id={$appId}");

        // set adgroupad
        $adGroupAd = new AdGroupAd($campaignId, $adGroupId);
        $adGroupAd->setAdName('SampleAppAdANDROID_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroupAd->setUserStatus(UserStatus::ACTIVE);
        $adGroupAd->setAd($ad);

        return $adGroupAd;
    }

    /**
     * example DynamicSearchLinkedAd request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return AdGroupAd
     */
    public static function createExampleDynamicSearchLinkedAd(int $campaignId, int $adGroupId): AdGroupAd
    {
        // set ad
        $ad = new DynamicSearchLinkedAd();
        $ad->setType(AdType::DYNAMIC_SEARCH_LINKED_AD);
        $ad->setDescription('sample ad desc');
        $ad->setDevicePreference(DevicePreference::SMART_PHONE);
        $ad->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $ad->setCustomParameters($customParameters);

        // set adgroupad
        $adGroupAd = new AdGroupAd($campaignId, $adGroupId);
        $adGroupAd->setAdName('SampleDynamicSearchLinkedAd_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $adGroupAd->setUserStatus(UserStatus::ACTIVE);
        $adGroupAd->setAd($ad);

        return $adGroupAd;
    }

    /**
     * example AdCustomizer request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param string $feedFolderName Feed Folder Name
     * @param array $feedAttributeNames Feed Attribute Names
     * @return AdGroupAd[]
     */
    public static function createExampleAdCustomizerAds(int $campaignId, int $adGroupId, string $feedFolderName, array $feedAttributeNames): array
    {

        // example KeywordInsertion
        $keywordInsertion = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $keywordInsertion->setAdName('KeywordInsertion_' . SoapUtils::getCurrentTimestamp());
        $keywordInsertion->getAd()->setDescription('sample {KEYWORD:keyword}');

        // example CountdownOption
        $countdownOption = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $countdownOption->setAdName('SampleCountdownOption_' . SoapUtils::getCurrentTimestamp());
        $countdownOption->getAd()->setDescription('{=COUNTDOWN("2020/12/15 18:00:00","ja")}');

        // example CountdownOption & AdCustomizerDate
        $countdownOptionAdOfAdCustomizer = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $countdownOptionAdOfAdCustomizer->setAdName('CountdownOfAdCustomizer_' . SoapUtils::getCurrentTimestamp());
        $countdownOptionAdOfAdCustomizer->getAd()->setDescription('{=COUNTDOWN(' . $feedFolderName . '.' . $feedAttributeNames['AD_CUSTOMIZER_DATE'] . ',"ja")}');

        // example DefaultText & AdCustomizerString
        $defaultTextOfAdCustomizer = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $defaultTextOfAdCustomizer->setAdName('DefaultTextOfAdCustomizer_' . SoapUtils::getCurrentTimestamp());
        $defaultTextOfAdCustomizer->getAd()->setHeadline('{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline');
        $defaultTextOfAdCustomizer->getAd()->setHeadline2('{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline2');
        $defaultTextOfAdCustomizer->getAd()->setDescription('{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}Description');

        // example Mobile specification with IF function
        $ifFunction = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $ifFunction->setAdName('IF_Function_' . SoapUtils::getCurrentTimestamp());
        $ifFunction->getAd()->setHeadline('{=IF(device=mobile,MOBILE):PC}Headline');
        $ifFunction->getAd()->setHeadline2('{=IF(device=mobile,MOBILE):PC}Headline2');
        $ifFunction->getAd()->setDescription('{=IF(device=mobile,MOBILE):PC}Description');

        // example Mobile specification with IF function & DefaultText AdCustomizerString
        $ifFunctionDefaultTextOfAdCustomizer = self::createExampleExtendedTextAd($campaignId, $adGroupId);
        $ifFunctionDefaultTextOfAdCustomizer->setAdName('IF_Function_DefaultTextOfAdCustomizer_' . SoapUtils::getCurrentTimestamp());
        $ifFunctionDefaultTextOfAdCustomizer->getAd()->setHeadline('{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline');
        $ifFunctionDefaultTextOfAdCustomizer->getAd()->setHeadline2('{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING']
            . ':default}headline2');
        $ifFunctionDefaultTextOfAdCustomizer->getAd()->setDescription('{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING']
            . ':default}description');

        return [
            $keywordInsertion,
            $countdownOption,
            $countdownOptionAdOfAdCustomizer,
            $defaultTextOfAdCustomizer,
            $ifFunction,
            $ifFunctionDefaultTextOfAdCustomizer,
        ];
    }

    /**
     * example adGroupAd set request.
     *
     * @param AdGroupAd[] $adGroupAds
     * @return AdGroupAd[] AdGroupAdOperation entity.
     */
    public static function createExampleSetRequest(array $adGroupAds): array
    {
        $operands = [];

        foreach ($adGroupAds as $adGroupAd) {

            $operand = new AdGroupAd($adGroupAd->getCampaignId(), $adGroupAd->getAdGroupId());
            $operand->setAdId($adGroupAd->getAdId());
            $operand->setAdName('UpdateOn_' . $adGroupAd->getAdId() . '_' . SoapUtils::getCurrentTimestamp());
            $operand->setUserStatus(UserStatus::PAUSED);
            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupAdServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
