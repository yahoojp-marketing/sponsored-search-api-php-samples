<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\FeedItem;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderPlaceholderType;
use Jp\YahooApis\SS\V201909\FeedItem\{ApprovalStatus,
    CriterionTypeFeedItem,
    CustomParameter,
    CustomParameters,
    DayOfWeek,
    DevicePreference,
    FeedAttributeValue,
    FeedItem,
    FeedItemGeoRestriction,
    FeedItemOperation,
    FeedItemPlaceholderField,
    FeedItemPlaceholderType,
    FeedItemSchedule,
    FeedItemScheduling,
    FeedItemSelector,
    FeedItemService,
    get,
    getResponse,
    IsRemove,
    KeywordMatchType,
    Location,
    MinuteOfHour,
    MultipleFeedItemAttribute,
    mutate,
    mutateResponse,
    Operator,
    SimpleFeedItemAttribute,
    TargetingAdGroup,
    TargetingCampaign,
    TargetingKeyword};
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example FeedItemService operation and Utility method collection.
 */
class FeedItemServiceSample
{

    const SERVICE_NAME = 'FeedItemService';

    /**
     * @var FeedItemService
     */
    private static $service = null;

    /**
     * FeedItemServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(FeedItemService::class);
    }

    /**
     * example get feedItems.
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
     * example mutate feedItems.
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
     * example check feedItem review status.
     *
     * @param FeedItem[] $feedItems
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $feedItems): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            echo PHP_EOL . '***** sleep 30 seconds for FeedItem Review Status Check *****' . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $feedItems);

            // run
            $getResponse = self::get($getRequest);

            $approvalCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $feedItemValues) {
                switch ($feedItemValues->getFeedItem()->getApprovalStatus()) {
                    default:
                    case ApprovalStatus::REVIEW:
                    case ApprovalStatus::APPROVED_WITH_REVIEW:
                        continue;
                    case ApprovalStatus::PRE_DISAPPROVED:
                    case ApprovalStatus::POST_DISAPPROVED:
                        throw new Exception('Feed Item Review Status failed.');
                    case ApprovalStatus::APPROVED:
                        $approvalCount++;
                        continue;
                }
            }

            if (count($getResponse->getRval()->getValues()) === $approvalCount) {
                return;
            }
        }

        throw new Exception('Fail to get FeedItemService.');
    }

    /**
     * create basic FeedItem.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $parentValuesHolder = self::setup();
        $accountId = SoapUtils::getAccountId();

        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, FeedItemPlaceholderType::QUICKLINK, [
            self::createExampleQuicklink(),
        ]);
        $response = self::mutate($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($parentValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($parentValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($parentValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($parentValuesHolder->getAdGroupValuesList());
        $selfValuesHolder->setFeedItemValuesList($response->getRval()->getValues());
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
        if (count($valuesHolder->getFeedItemValuesList()) > 0) {
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            self::mutate(
                self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                    FeedItemPlaceholderType::QUICKLINK,
                    $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItems())
            );
        }
        AdGroupServiceSample::cleanup($valuesHolder);
    }

    /**
     * example FeedItemService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesRepositoryFacade = new ValuesRepositoryFacade(new ValuesHolder());
        $accountId = SoapUtils::getAccountId();

        try {
            //=================================================================
            // FeedItemService ADD (QUICKLINK)
            //=================================================================
            // create request.
            $addRequestQuicklink = self::buildExampleMutateRequest(
                Operator::ADD,
                $accountId,
                FeedItemPlaceholderType::QUICKLINK,
                [self::createExampleQuicklink()]
            );

            // run
            $addResponseQuicklink = self::mutate($addRequestQuicklink);
            $valuesRepositoryFacade->getValuesHolder()->setFeedItemValuesList($addResponseQuicklink->getRval()->getValues());

            //=================================================================
            // FeedItemService ADD (CALLEXTENSION)
            //=================================================================
            // create request.
            $addRequestCallextension = self::buildExampleMutateRequest(
                Operator::ADD,
                $accountId,
                FeedItemPlaceholderType::CALLEXTENSION,
                [self::createExampleCallextension()]
            );

            // run
            $addResponseCallextension = self::mutate($addRequestCallextension);
            $valuesRepositoryFacade->getValuesHolder()->setFeedItemValuesList($addResponseCallextension->getRval()->getValues());

            //=================================================================
            // FeedItemService ADD (CALLOUT)
            //=================================================================
            // create request.
            $addRequestCallout = self::buildExampleMutateRequest(
                Operator::ADD,
                $accountId,
                FeedItemPlaceholderType::CALLOUT,
                [self::createExampleCallout()]
            );

            // run
            $addResponseCallout = self::mutate($addRequestCallout);
            $valuesRepositoryFacade->getValuesHolder()->setFeedItemValuesList($addResponseCallout->getRval()->getValues());

            //=================================================================
            // FeedItemService SET (QUICKLINK)
            //=================================================================
            // create request.
            $setRequestQuicklink = self::buildExampleMutateRequest(
                Operator::SET, $accountId, FeedItemPlaceholderType::QUICKLINK,
                self::createExampleSetRequest([
                    $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(
                        FeedItemPlaceholderType::QUICKLINK
                    )
                ])
            );

            // run
            self::mutate($setRequestQuicklink);

            //=================================================================
            // FeedItemService SET (CALLEXTENSION)
            //=================================================================
            // create request.
            $setRequestCallextension = self::buildExampleMutateRequest(
                Operator::SET, $accountId, FeedItemPlaceholderType::CALLEXTENSION,
                self::createExampleSetRequest([
                    $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(
                        FeedItemPlaceholderType::CALLEXTENSION
                    )
                ])
            );

            // run
            self::mutate($setRequestCallextension);

            //=================================================================
            // FeedItemService SET (CALLOUT)
            //=================================================================
            // create request.
            $setRequestCallout = self::buildExampleMutateRequest(
                Operator::SET, $accountId, FeedItemPlaceholderType::CALLOUT,
                self::createExampleSetRequest([
                    $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(
                        FeedItemPlaceholderType::CALLOUT
                    )
                ])
            );

            // run
            self::mutate($setRequestCallout);

            //=================================================================
            // FeedItemService GET
            //=================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId,
                $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds()
            );

            // run
            self::get($getRequest);

            //=================================================================
            // FeedItemService REMOVE (QUICKLINK)
            //=================================================================
            // create request.
            $removeRequestQuicklink = self::buildExampleMutateRequest(
                Operator::REMOVE, $accountId, FeedItemPlaceholderType::QUICKLINK,
                [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::QUICKLINK)]
            );

            // run
            self::mutate($removeRequestQuicklink);

            //=================================================================
            // FeedItemService REMOVE (CALLEXTENSION)
            //=================================================================
            // create request.
            $removeRequestCallextension = self::buildExampleMutateRequest(
                Operator::REMOVE, $accountId, FeedItemPlaceholderType::CALLEXTENSION,
                [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLEXTENSION)]
            );

            // run
            self::mutate($removeRequestCallextension);

            //=================================================================
            // FeedItemService REMOVE (CALLOUT)
            //=================================================================
            // create request.
            $removeRequestCallout = self::buildExampleMutateRequest(
                Operator::REMOVE, $accountId, FeedItemPlaceholderType::CALLOUT,
                [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLOUT)]
            );

            // run
            self::mutate($removeRequestCallout);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $feedItemIds
     * @param int[] $feedFolderIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $feedItemIds, array $feedFolderIds = null): get
    {
        $selector = new FeedItemSelector($accountId);

        if (!is_null($feedItemIds)) {
            $selector->setFeedItemIds($feedItemIds);
        }

        if (!is_null($feedFolderIds)) {
            $selector->setFeedFolderIds($feedFolderIds);
        }

        $selector->setPlaceholderTypes([
            FeedItemPlaceholderType::QUICKLINK,
            FeedItemPlaceholderType::CALLEXTENSION,
            FeedItemPlaceholderType::AD_CUSTOMIZER,
            FeedItemPlaceholderType::CALLOUT,
            FeedItemPlaceholderType::STRUCTURED_SNIPPET,
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
     * @param string $operator
     * @param int $accountId
     * @param FeedFolderPlaceholderType $placeholderType
     * @param FeedItem[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, string $placeholderType, array $operand): mutate
    {
        return new mutate(
            new FeedItemOperation($operator, $accountId, $placeholderType, $operand)
        );
    }

    /**
     * example AdCustomizer FeedItem request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $feedFolderId
     * @param int[] $feedAttributeIds
     * @return FeedItem
     */
    public static function createExampleAdCustomizer(int $campaignId, int $adGroupId, int $feedFolderId, array $feedAttributeIds): FeedItem
    {
        // set feedItem
        $feedItem = new FeedItem();
        $feedItem->setFeedFolderId($feedFolderId);
        $feedItem->setStartDate(date('Ymd'));
        $feedItem->setEndDate(date("Ymd", strtotime("+1 month")));

        // set feedItemAttribute
        $feedItemAttributeInteger = new SimpleFeedItemAttribute();
        $feedItemAttributeInteger->setFeedAttributeId($feedAttributeIds['AD_CUSTOMIZER_INTEGER']);
        $feedItemAttributeInteger->setFeedAttributeValue('1234567890');
        $feedItemAttributePrice = new SimpleFeedItemAttribute();
        $feedItemAttributePrice->setFeedAttributeId($feedAttributeIds['AD_CUSTOMIZER_PRICE']);
        $feedItemAttributePrice->setFeedAttributeValue('9,999,999.99');
        $feedItemAttributeDate = new SimpleFeedItemAttribute();
        $feedItemAttributeDate->setFeedAttributeId($feedAttributeIds['AD_CUSTOMIZER_DATE']);
        $feedItemAttributeDate->setFeedAttributeValue(date("Ymd His", strtotime("+1 week")));
        $feedItemAttributeString = new SimpleFeedItemAttribute();
        $feedItemAttributeString->setFeedAttributeId($feedAttributeIds['AD_CUSTOMIZER_STRING']);
        $feedItemAttributeString->setFeedAttributeValue('sample Value');
        $feedItem->setFeedItemAttribute([
            $feedItemAttributeInteger,
            $feedItemAttributePrice,
            $feedItemAttributeDate,
            $feedItemAttributeString,
        ]);

        // set scheduling
        $schedule1 = new FeedItemSchedule();
        $schedule1->setDayOfWeek(DayOfWeek::SUNDAY);
        $schedule1->setStartHour(14);
        $schedule1->setStartMinute(MinuteOfHour::ZERO);
        $schedule1->setEndHour(15);
        $schedule1->setEndMinute(MinuteOfHour::THIRTY);
        $schedule2 = new FeedItemSchedule();
        $schedule2->setDayOfWeek(DayOfWeek::MONDAY);
        $schedule2->setStartHour(14);
        $schedule2->setStartMinute(MinuteOfHour::ZERO);
        $schedule2->setEndHour(15);
        $schedule2->setEndMinute(MinuteOfHour::THIRTY);
        $scheduling = new FeedItemScheduling();
        $scheduling->setSchedules([
            $schedule1,
            $schedule2,
        ]);
        $feedItem->setScheduling($scheduling);

        // set targetCampaign
        $targetingCampaign = new TargetingCampaign();
        $targetingCampaign->setTargetingCampaignId($campaignId);
        $feedItem->setTargetingCampaign($targetingCampaign);

        // set targetAdGroup
        $targetingAdGroup = new TargetingAdGroup();
        $targetingAdGroup->setTargetingAdGroupId($adGroupId);
        $feedItem->setTargetingAdGroup($targetingAdGroup);

        // set targetKeyword
        $targetingKeyword = new TargetingKeyword();
        $targetingKeyword->setText('sample keyword');
        $targetingKeyword->setMatchType(KeywordMatchType::EXACT);
        $feedItem->setTargetingKeyword($targetingKeyword);

        // set geoTargeting
        $location = new Location();
        $location->setType(CriterionTypeFeedItem::LOCATION);
        $location->setGeoTargetingRestriction(FeedItemGeoRestriction::LOCATION_OF_PRESENCE);
        $location->setTargetId('JP-01-0010');
        $feedItem->setGeoTargeting($location);

        return $feedItem;
    }

    /**
     * example Quicklink FeedItem request.
     *
     * @return FeedItem
     */
    public static function createExampleQuicklink(): FeedItem
    {
        // set feedItem
        $feedItem = new FeedItem();
        $feedItem->setStartDate(date('Ymd'));
        $feedItem->setEndDate(date("Ymd", strtotime("+1 month")));
        $feedItem->setDevicePreference(DevicePreference::SMART_PHONE);

        // set feedItemAttribute
        $feedItemAttributeLinkText = new SimpleFeedItemAttribute();
        $feedItemAttributeLinkText->setPlaceholderField(FeedItemPlaceholderField::LINK_TEXT);
        $feedItemAttributeLinkText->setFeedAttributeValue('samplelink');

        $feedItemAttributeAdvancedUrl = new SimpleFeedItemAttribute();
        $feedItemAttributeAdvancedUrl->setPlaceholderField(FeedItemPlaceholderField::ADVANCED_URL);
        $feedItemAttributeAdvancedUrl->setFeedAttributeValue('http://www.quicklink.sample.co.jp');

        $feedItemAttributeAdvancedMobileUrl = new SimpleFeedItemAttribute();
        $feedItemAttributeAdvancedMobileUrl->setPlaceholderField(FeedItemPlaceholderField::ADVANCED_MOBILE_URL);
        $feedItemAttributeAdvancedMobileUrl->setFeedAttributeValue('http://www.quicklink.sample.co.jp/mobile');

        $feedItemAttributeTrackingUrl = new SimpleFeedItemAttribute();
        $feedItemAttributeTrackingUrl->setPlaceholderField(FeedItemPlaceholderField::TRACKING_URL);
        $feedItemAttributeTrackingUrl->setFeedAttributeValue('http://www.quicklink.sample.co.jp?url={lpurl}&amp;pid={_id1}');

        $feedItemAttributeAdditionalAdvancedUrls = new MultipleFeedItemAttribute();
        $feedItemAttributeAdditionalAdvancedUrls->setPlaceholderField(FeedItemPlaceholderField::ADDITIONAL_ADVANCED_URLS);
        $feedAttributeValue1 = new FeedAttributeValue();
        $feedAttributeValue1->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced1/');
        $feedAttributeValue2 = new FeedAttributeValue();
        $feedAttributeValue2->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced2/');
        $feedAttributeValue3 = new FeedAttributeValue();
        $feedAttributeValue3->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced3/');
        $feedItemAttributeAdditionalAdvancedUrls->setFeedAttributeValues([
            $feedAttributeValue1,
            $feedAttributeValue2,
            $feedAttributeValue3,
        ]);

        $feedItemAttributeAdditionalAdvancedMobileUrls = new MultipleFeedItemAttribute();
        $feedItemAttributeAdditionalAdvancedMobileUrls->setPlaceholderField(FeedItemPlaceholderField::ADDITIONAL_ADVANCED_MOBILE_URLS);
        $feedAttributeValue4 = new FeedAttributeValue();
        $feedAttributeValue4->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced1/mobile');
        $feedAttributeValue5 = new FeedAttributeValue();
        $feedAttributeValue5->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced2/mobile');
        $feedAttributeValue6 = new FeedAttributeValue();
        $feedAttributeValue6->setFeedAttributeValue('http://www.quicklink.sample.co.jp/AdditionalAdvanced3/mobile');
        $feedItemAttributeAdditionalAdvancedMobileUrls->setFeedAttributeValues([
            $feedAttributeValue4,
            $feedAttributeValue5,
            $feedAttributeValue6,
        ]);

        $feedItemAttributeLinkDescription1 = new SimpleFeedItemAttribute();
        $feedItemAttributeLinkDescription1->setPlaceholderField(FeedItemPlaceholderField::LINK_DESCRIPTION_1);
        $feedItemAttributeLinkDescription1->setFeedAttributeValue('sampledescription1');

        $feedItemAttributeLinkDescription2 = new SimpleFeedItemAttribute();
        $feedItemAttributeLinkDescription2->setPlaceholderField(FeedItemPlaceholderField::LINK_DESCRIPTION_2);
        $feedItemAttributeLinkDescription2->setFeedAttributeValue('sampledescription2');

        $feedItem->setFeedItemAttribute([
            $feedItemAttributeLinkText,
            $feedItemAttributeAdvancedUrl,
            $feedItemAttributeAdvancedMobileUrl,
            $feedItemAttributeTrackingUrl,
            $feedItemAttributeAdditionalAdvancedUrls,
            $feedItemAttributeAdditionalAdvancedMobileUrls,
            $feedItemAttributeLinkDescription1,
            $feedItemAttributeLinkDescription2
        ]);

        // set scheduling
        $schedule1 = new FeedItemSchedule();
        $schedule1->setDayOfWeek(DayOfWeek::SUNDAY);
        $schedule1->setStartHour(14);
        $schedule1->setStartMinute(MinuteOfHour::ZERO);
        $schedule1->setEndHour(15);
        $schedule1->setEndMinute(MinuteOfHour::THIRTY);
        $schedule2 = new FeedItemSchedule();
        $schedule2->setDayOfWeek(DayOfWeek::MONDAY);
        $schedule2->setStartHour(14);
        $schedule2->setStartMinute(MinuteOfHour::ZERO);
        $schedule2->setEndHour(15);
        $schedule2->setEndMinute(MinuteOfHour::THIRTY);
        $scheduling = new FeedItemScheduling();
        $scheduling->setSchedules([
            $schedule1,
            $schedule2,
        ]);
        $feedItem->setScheduling($scheduling);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $feedItem->setCustomParameters($customParameters);

        return $feedItem;
    }

    /**
     * example Callextension FeedItem request.
     *
     * @return FeedItem
     */
    public static function createExampleCallextension(): FeedItem
    {
        // set feedItem
        $feedItem = new FeedItem();
        $feedItem->setStartDate(date('Ymd'));
        $feedItem->setEndDate(date("Ymd", strtotime("+1 month")));
        $feedItem->setDevicePreference(DevicePreference::SMART_PHONE);

        // set feedItemAttribute
        $feedItemAttributeCallPhoneNumber = new SimpleFeedItemAttribute();
        $feedItemAttributeCallPhoneNumber->setPlaceholderField(FeedItemPlaceholderField::CALL_PHONE_NUMBER);
        $feedItemAttributeCallPhoneNumber->setFeedAttributeValue('0120-123-456');
        $feedItem->setFeedItemAttribute([$feedItemAttributeCallPhoneNumber]);

        // set scheduling
        $schedule1 = new FeedItemSchedule();
        $schedule1->setDayOfWeek(DayOfWeek::SUNDAY);
        $schedule1->setStartHour(14);
        $schedule1->setStartMinute(MinuteOfHour::ZERO);
        $schedule1->setEndHour(15);
        $schedule1->setEndMinute(MinuteOfHour::THIRTY);
        $schedule2 = new FeedItemSchedule();
        $schedule2->setDayOfWeek(DayOfWeek::MONDAY);
        $schedule2->setStartHour(14);
        $schedule2->setStartMinute(MinuteOfHour::ZERO);
        $schedule2->setEndHour(15);
        $schedule2->setEndMinute(MinuteOfHour::THIRTY);
        $scheduling = new FeedItemScheduling();
        $scheduling->setSchedules([
            $schedule1,
            $schedule2,
        ]);
        $feedItem->setScheduling($scheduling);

        return $feedItem;
    }

    /**
     * example Callout FeedItem request.
     *
     * @return FeedItem
     */
    public static function createExampleCallout(): FeedItem
    {
        // set feedItem
        $feedItem = new FeedItem();
        $feedItem->setStartDate(date('Ymd'));
        $feedItem->setEndDate(date("Ymd", strtotime("+1 month")));
        $feedItem->setDevicePreference(DevicePreference::SMART_PHONE);

        // set feedItemAttribute
        $feedItemAttributeCalloutText = new SimpleFeedItemAttribute();
        $feedItemAttributeCalloutText->setPlaceholderField(FeedItemPlaceholderField::CALLOUT_TEXT);
        $feedItemAttributeCalloutText->setFeedAttributeValue('sample callout text');
        $feedItem->setFeedItemAttribute([$feedItemAttributeCalloutText]);

        // set scheduling
        $schedule1 = new FeedItemSchedule();
        $schedule1->setDayOfWeek(DayOfWeek::SUNDAY);
        $schedule1->setStartHour(14);
        $schedule1->setStartMinute(MinuteOfHour::ZERO);
        $schedule1->setEndHour(15);
        $schedule1->setEndMinute(MinuteOfHour::THIRTY);
        $schedule2 = new FeedItemSchedule();
        $schedule2->setDayOfWeek(DayOfWeek::MONDAY);
        $schedule2->setStartHour(14);
        $schedule2->setStartMinute(MinuteOfHour::ZERO);
        $schedule2->setEndHour(15);
        $schedule2->setEndMinute(MinuteOfHour::THIRTY);
        $scheduling = new FeedItemScheduling();
        $scheduling->setSchedules([
            $schedule1,
            $schedule2,
        ]);
        $feedItem->setScheduling($scheduling);

        return $feedItem;
    }

    /**
     * example StructuredSnippet FeedItem request.
     *
     * @return FeedItem
     */
    public static function createExampleStructuredSnippet(): FeedItem
    {
        // set feedItem
        $feedItem = new FeedItem();
        $feedItem->setStartDate(date('Ymd'));
        $feedItem->setEndDate(date("Ymd", strtotime("+1 month")));
        $feedItem->setDevicePreference(DevicePreference::SMART_PHONE);

        // set feedItemAttribute
        $feedItemAttributeHeader = new SimpleFeedItemAttribute();
        $feedItemAttributeHeader->setPlaceholderField(FeedItemPlaceholderField::STRUCTURED_SNIPPET_HEADER);
        $feedItemAttributeHeader->setFeedAttributeValue('ブランド');

        $feedItemAttributeValues = new MultipleFeedItemAttribute();
        $feedItemAttributeValues->setPlaceholderField(FeedItemPlaceholderField::STRUCTURED_SNIPPET_VALUES);
        $feedAttributeValue1 = new FeedAttributeValue();
        $feedAttributeValue1->setFeedAttributeValue('SampleBrand1');
        $feedAttributeValue2 = new FeedAttributeValue();
        $feedAttributeValue2->setFeedAttributeValue('SampleBrand2');
        $feedAttributeValue3 = new FeedAttributeValue();
        $feedAttributeValue3->setFeedAttributeValue('SampleBrand3');
        $feedItemAttributeValues->setFeedAttributeValues([
            $feedAttributeValue1,
            $feedAttributeValue2,
            $feedAttributeValue3,
        ]);

        $feedItem->setFeedItemAttribute([
            $feedItemAttributeHeader,
            $feedItemAttributeValues,
        ]);

        // set scheduling
        $schedule1 = new FeedItemSchedule();
        $schedule1->setDayOfWeek(DayOfWeek::SUNDAY);
        $schedule1->setStartHour(14);
        $schedule1->setStartMinute(MinuteOfHour::ZERO);
        $schedule1->setEndHour(15);
        $schedule1->setEndMinute(MinuteOfHour::THIRTY);
        $schedule2 = new FeedItemSchedule();
        $schedule2->setDayOfWeek(DayOfWeek::MONDAY);
        $schedule2->setStartHour(14);
        $schedule2->setStartMinute(MinuteOfHour::ZERO);
        $schedule2->setEndHour(15);
        $schedule2->setEndMinute(MinuteOfHour::THIRTY);
        $scheduling = new FeedItemScheduling();
        $scheduling->setSchedules([
            $schedule1,
            $schedule2,
        ]);
        $feedItem->setScheduling($scheduling);

        return $feedItem;
    }

    /**
     * example feedItem set request.
     *
     * @param FeedItem[] $feedItems
     * @return FeedItem[]
     */
    public static function createExampleSetRequest(array $feedItems): array
    {
        $operands = [];

        foreach ($feedItems as $feedItem) {
            $operand = new FeedItem();
            $operand->setFeedItemId($feedItem->getFeedItemId());

            // clear date
            $operand->setStartDate('');
            $operand->setEndDate('');

            // clear scheduling
            $operand->setScheduling(new FeedItemScheduling());

            // clear geoTargeting
            if ($feedItem->getPlaceholderType() == FeedItemPlaceholderType::AD_CUSTOMIZER) {
                $location = new Location();
                $location->setIsRemove(IsRemove::TRUE);
                $operand->setGeoTargeting($location);
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
    FeedItemServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
