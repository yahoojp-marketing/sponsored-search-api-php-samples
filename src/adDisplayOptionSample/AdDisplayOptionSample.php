<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedItemServiceSample.php');

/**
 * Sample Program for FeedItemService,CampaignFeedService,AdGroupFeedService,
 * Copyright (C) 2013 Yahoo Japan Corporation.
 * All Rights Reserved.
 */
class AdDisplayOptionSample
{

    /**
     * Sample Program for Service MUTATE.
     *
     * @param array $operation Exexute service operation entity.
     * @param string $method Operator enum.
     * @param string $serviceName Exexute Service Name.
     * @return array Exexute service return value entity.
     * @throws Exception
     */
    public function mutate($operation, $method, $serviceName)
    {

        // Call API
        $service = SoapUtils::getService($serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of ' . $method . ' ' . $serviceName . '.');
        }

        return $returnValues;
    }

    /**
     * Sample Program for Service GET.
     *
     * @param array $selector Exexute Service selector entity.
     * @param string $serviceName Exexute Service Name.
     * @return array AdGroupBidMultiplierValues entity.
     * @throws Exception
     */
    public function get($selector, $serviceName)
    {

        // Call API
        $service = SoapUtils::getService($serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of get ' . $serviceName . '.');
        }

        return $returnValues;
    }

    /**
     * create Quicklink FeedItem sample request.
     *
     * @param string $accountId AccountID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemQuicklinkSampleAddRequest($accountId)
    {
        $request = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'placeholderType' => 'QUICKLINK',
                'operand' => array(
                    'accountId' => $accountId,
                    'placeholderType' => 'QUICKLINK',
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'LINK_TEXT',
                            'feedAttributeValue' => 'samplelink'
                        ),
                        array(
                            'placeholderField' => 'ADVANCED_URL',
                            'feedAttributeValue' => 'http://www.quicklink.sample.co.jp'
                        ),
                        array(
                            'placeholderField' => 'ADVANCED_MOBILE_URL',
                            'feedAttributeValue' => 'http://www.quicklink.sample.co.jp/mobile'
                        ),
                        array(
                            'placeholderField' => 'TRACKING_URL',
                            'feedAttributeValue' => 'http://www.quicklink.sample.co.jp?url={lpurl}&amp;pid={_id1}'
                        ),
                        array(
                            'placeholderField' => 'ADDITIONAL_ADVANCED_URLS',
                            'feedAttributeValues' => array(
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced1/'),
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced2/'),
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced3/')
                            )
                        ),
                        array(
                            'placeholderField' => 'ADDITIONAL_ADVANCED_MOBILE_URLS',
                            'feedAttributeValues' => array(
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced1/mobile'),
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced2/mobile'),
                                array('feedAttributeValue' => 'http://www.quicklink.sample.co.jp/AdditionalAdvanced3/mobile')
                            )
                        )
                    ),
                    'startDate' => date('Ymd'),
                    'endDate' => date("Ymd", strtotime("+1 month")),
                    'scheduling' => array(
                        'schedules' => array(
                            0 => array(
                                'dayOfWeek' => 'SUNDAY',
                                'startHour' => 14,
                                'startMinute' => 'ZERO',
                                'endHour' => 15,
                                'endMinute' => 'THIRTY'
                            ),
                            1 => array(
                                'dayOfWeek' => 'MONDAY',
                                'startHour' => 14,
                                'startMinute' => 'ZERO',
                                'endHour' => 15,
                                'endMinute' => 'THIRTY'
                            )
                        )
                    ),
                    'devicePreference' => 'SMART_PHONE',
                    'customParameters' => array(
                        'parameters' => array(
                            'key' => 'id1',
                            'value' => '1234'
                        )
                    ),
                )
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            switch ($feedItemAttribute['placeholderField']) {
                default:
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
                    break;
                case 'ADDITIONAL_ADVANCED_URLS':
                case 'ADDITIONAL_ADVANCED_MOBILE_URLS':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'MultipleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
                    break;
            }
        }

        return $request;
    }

    /**
     * create Callextension FeedItem sample request.
     *
     * @param string $accountId AccountID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemCallExtensionSampleAddRequest($accountId)
    {
        $request = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'placeholderType' => 'CALLEXTENSION',
                'operand' => array(
                    'accountId' => $accountId,
                    'placeholderType' => 'CALLEXTENSION',
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'CALL_PHONE_NUMBER',
                            'feedAttributeValue' => '0120-123-456'
                        )
                    ),
                    'startDate' => date('Ymd'),
                    'endDate' => date("Ymd", strtotime("+1 month")),
                    'scheduling' => array(
                        'schedules' => array(
                            0 => array(
                                'dayOfWeek' => 'SUNDAY',
                                'startHour' => 10,
                                'startMinute' => 'ZERO',
                                'endHour' => 12,
                                'endMinute' => 'THIRTY'
                            ),
                            1 => array(
                                'dayOfWeek' => 'MONDAY',
                                'startHour' => 10,
                                'startMinute' => 'ZERO',
                                'endHour' => 12,
                                'endMinute' => 'THIRTY'
                            )
                        )
                    )
                )
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
        }

        return $request;
    }

    /**
     * create CalloutExtension FeedItem sample request.
     *
     * @param string $accountId AccountID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemCalloutExtensionSampleAddRequest($accountId)
    {
        $request = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'placeholderType' => 'CALLOUT',
                'operand' => array(
                    'accountId' => $accountId,
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'CALLOUT_TEXT',
                            'feedAttributeValue' => 'sample callout text'
                        )
                    ),
                    'startDate' => date('Ymd'),
                    'endDate' => date("Ymd", strtotime("+1 month")),
                    'scheduling' => array(
                        'schedules' => array(
                            0 => array(
                                'dayOfWeek' => 'SUNDAY',
                                'startHour' => 10,
                                'startMinute' => 'ZERO',
                                'endHour' => 12,
                                'endMinute' => 'THIRTY'
                            ),
                            1 => array(
                                'dayOfWeek' => 'MONDAY',
                                'startHour' => 10,
                                'startMinute' => 'ZERO',
                                'endHour' => 12,
                                'endMinute' => 'THIRTY'
                            )
                        )
                    )
                )
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
        }

        return $request;
    }

    /**
     * create Quicklink FeedItem sample set request.
     *
     * @param string $accountId AccountID
     * @param string $feedItemId FeedItemID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemQuicklinkSampleSetRequest($accountId, $feedItemId)
    {
        $request = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'placeholderType' => 'QUICKLINK',
                'operand' => array(
                    'accountId' => $accountId,
                    'feedItemId' => $feedItemId,
                    'placeholderType' => 'QUICKLINK',
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'LINK_TEXT',
                            'feedAttributeValue' => 'editlink'
                        ),
                        array(
                            'placeholderField' => 'ADVANCED_URL',
                            'feedAttributeValue' => 'http://edit.quicklink.sample.co.jp'
                        ),
                        array(
                            'placeholderField' => 'ADVANCED_MOBILE_URL',
                            'feedAttributeValue' => 'http://edit.quicklink.sample.co.jp/mobile'
                        ),
                        array(
                            'placeholderField' => 'TRACKING_URL',
                            'feedAttributeValue' => 'http://edit.quicklink.sample.co.jp?url={lpurl}&amp;pid={_id1}'
                        ),
                        // unset ADDITIONAL_ADVANCED_URLS
                        array(
                            'placeholderField' => 'ADDITIONAL_ADVANCED_URLS',
                            'isRemove' => 'TRUE'
                        ),
                        // unset ADDITIONAL_ADVANCED_MOBILE_URLS
                        array(
                            'placeholderField' => 'ADDITIONAL_ADVANCED_MOBILE_URLS',
                            'isRemove' => 'TRUE'
                        )
                    ),
                    // unset startDate/endDate
                    'startDate' => null,
                    'endDate' => null,
                    // unset customParameters
                    'customParameters' => array(
                        'isRemove' => 'TRUE'
                    ),
                )
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            switch ($feedItemAttribute['placeholderField']) {
                default:
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
                    break;
                case 'ADDITIONAL_ADVANCED_URLS':
                case 'ADDITIONAL_ADVANCED_MOBILE_URLS':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'MultipleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
                    break;
            }
        }

        return $request;
    }

    /**
     * create CallExtension FeedItem sample set request.
     *
     * @param string $accountId AccountID
     * @param string $feedItemId FeedItemID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemCallExtensionSampleSetRequest($accountId, $feedItemId)
    {
        $request = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'placeholderType' => 'CALLEXTENSION',
                'operand' => array(
                    'accountId' => $accountId,
                    'feedItemId' => $feedItemId,
                    'placeholderType' => 'CALLEXTENSION',
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'CALL_PHONE_NUMBER',
                            'feedAttributeValue' => '0120-456-789'
                        )
                    ),
                    // unset scheduling
                    'scheduling' => null
                )
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
        }

        return $request;
    }

    /**
     * create CampaignFeed sample set request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $feedItemId QuicklinkFeedItemID
     * @param string $placeholderType PlaceholderType enum
     * @return array CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleSetRequest($accountId, $campaignId, $feedItemId, $placeholderType)
    {
        return array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => array(
                    'accountId' => $accountId,
                    'campaignId' => $campaignId,
                    'placeholderType' => $placeholderType,
                    'campaignFeed' => array(
                        'feedItemId' => $feedItemId
                    ),
                    'devicePlatform' => 'SMART_PHONE'
                )
            )
        );
    }

    /**
     * create CampaignFeed sample get request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $feedItemId QuicklinkFeedItemID
     * @return array CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleGetRequest($accountId, $campaignId, $feedItemId)
    {
        return array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId
                ),
                'feedItemIds' => array(
                    $feedItemId
                ),
                'placeholderTypes' => array(
                    'QUICKLINK',
                    'CALLEXTENSION',
                    'CALLOUT',
                    'STRUCTURED_SNIPPET'
                ),
                'paging' => array(
                    'startIndex' => '1',
                    'numberResults' => '20'
                )
            )
        );
    }

    /**
     * create AdGroupFeed sample set request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param string $feedItemId CallextensionFeedItemID
     * @param string $placeholderType PlaceholderType enum
     * @return array AdGroupFeedSOperation entity.
     */
    public function createAdGroupFeedSampleSetRequest($accountId, $campaignId, $adGroupId, $feedItemId, $placeholderType)
    {
        return array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => array(
                    'accountId' => $accountId,
                    'campaignId' => $campaignId,
                    'adGroupId' => $adGroupId,
                    'placeholderType' => $placeholderType,
                    'adGroupFeed' => array(
                        'feedItemId' => $feedItemId
                    )
                )
            )
        );
    }

    /**
     * create AdGroupFeed sample get request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param string $feedItemId CallextensionFeedItemID
     * @return array AdGroupFeedSOperation entity.
     */
    public function createAdGroupFeedSampleGetRequest($accountId, $campaignId, $adGroupId, $feedItemId)
    {
        return array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId
                ),
                'adGroupIds' => array(
                    $adGroupId
                ),
                'feedItemEds' => array(
                    $feedItemId
                ),
                'placeholderTypes' => array(
                    'QUICKLINK',
                    'CALLEXTENSION',
                    'CALLOUT',
                    'STRUCTURED_SNIPPET'
                ),
                'paging' => array(
                    'startIndex' => '1',
                    'numberResults' => '20'
                )
            )
        );
    }

    /**
     * create CampaignFeed sample remove quicklink setting request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $placeholderType PlaceholderType enum
     * @return array CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleRemoveRequest($accountId, $campaignId, $placeholderType)
    {
        return array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => array(
                    'accountId' => $accountId,
                    'campaignId' => $campaignId,
                    'placeholderType' => $placeholderType,
                    'campaignFeed' => array()
                )
            )
        );
    }

    /**
     * create dGroupFeed sample remove CallExtension setting request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param string $placeholderType PlaceholderType enum
     * @return array AdGroupFeedOperation entity.
     */
    public function createAdGroupFeedSampleRemoveRequest($accountId, $campaignId, $adGroupId, $placeholderType)
    {
        return array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => array(
                    'accountId' => $accountId,
                    'campaignId' => $campaignId,
                    'adGroupId' => $adGroupId,
                    'placeholderType' => $placeholderType,
                    'adGroupFeed' => array()
                )
            )
        );
    }

    /**
     * create FeedItem sample remove request.
     *
     * @param string $accountId AccountID
     * @param string $placeholderType PlaceholderType enum
     * @param string $feedItemId FeedItemID
     * @return array FeedItemOperation entity.
     */
    public function createFeedItemSampleRemoveRequest($accountId, $placeholderType, $feedItemId)
    {
        return array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'placeholderType' => $placeholderType,
                'operand' => array(
                    'accountId' => $accountId,
                    'feedItemId' => $feedItemId,
                )
            )
        );
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute AdGroupBidMultiplierServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $feedItemServiceSample = new FeedItemServiceSample();
    $adDisplayOptionSample = new AdDisplayOptionSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    //=================================================================
    // add CampaignService,AdGroupService
    //=================================================================
    // CampaignService
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcStandardCampaign($accountId));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // AdGroupService
    $adGroupValues = array();
    if ($adGroupId === 'xxxxxxxx') {
        $addAdGroupRequest = $adGroupServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddStandardAdGroup($accountId, $campaignId));
        $adGroupValues = $adGroupServiceSample->mutate($addAdGroupRequest, 'ADD');
        foreach ($adGroupValues as $adGroupValue) {
            $adGroupId = $adGroupValue->adGroup->adGroupId;
        }
    }

    //=================================================================
    // FeedItemService ADD
    //=================================================================
    // create QuickLink FeedItem
    $addQuickLinkRequest = $adDisplayOptionSample->createFeedItemQuicklinkSampleAddRequest($accountId);
    $quickLinkValues = $feedItemServiceSample->mutate($addQuickLinkRequest, 'ADD');
    $feedItemServiceSample->checkApprovalStatus($accountId, $quickLinkValues);
    foreach ($quickLinkValues as $value) {
        $quickLink = $value->feedItem;
    }

    // create CallExtension FeedItem
    $addCallExtensionRequest = $adDisplayOptionSample->createFeedItemCallExtensionSampleAddRequest($accountId);
    $callExtensionValues = $feedItemServiceSample->mutate($addCallExtensionRequest, 'ADD');
    $feedItemServiceSample->checkApprovalStatus($accountId, $callExtensionValues);
    foreach ($callExtensionValues as $value) {
        $callExtension = $value->feedItem;
    }

    // create CalloutExtension FeedItem
    $addCalloutExtensionRequest = $adDisplayOptionSample->createFeedItemCalloutExtensionSampleAddRequest($accountId);
    $calloutExtensionValues = $feedItemServiceSample->mutate($addCalloutExtensionRequest, 'ADD');
    $feedItemServiceSample->checkApprovalStatus($accountId, $calloutExtensionValues);
    foreach ($calloutExtensionValues as $value) {
        $calloutExtension = $value->feedItem;
    }

    //=================================================================
    // FeedItemService SET
    //=================================================================
    // set FeedItem Quicklink
    $setQuickLinkRequest = $adDisplayOptionSample->createFeedItemQuicklinkSampleSetRequest($accountId, $quickLink->feedItemId);
    $quickLinkValues = $feedItemServiceSample->mutate($addQuickLinkRequest, 'SET');

    // set FeedItem CallExtension
    $setCallExtensionRequest = $adDisplayOptionSample->createFeedItemCallExtensionSampleSetRequest($accountId, $callExtension->feedItemId);
    $callExtensionValues = $feedItemServiceSample->mutate($setCallExtensionRequest, 'SET');

    // =================================================================
    // CampaignFeedService
    // =================================================================
    // set CampaignFeed
    $setCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleSetRequest($accountId, $campaignId, $quickLink->feedItemId, $quickLink->placeholderType);
    $campaignFeedValues = $adDisplayOptionSample->mutate($setCampaignFeedRequest, 'set', "CampaignFeedService");

    // get CampaignFeed
    $getCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleGetRequest($accountId, $campaignId, $quickLink->feedItemId);
    $adDisplayOptionSample->get($getCampaignFeedRequest, "CampaignFeedService");

    // =================================================================
    // AdGroupFeedService
    // =================================================================
    // set AdGroupFeed
    $setAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleSetRequest($accountId, $campaignId, $adGroupId, $callExtension->feedItemId, $callExtension->placeholderType);
    $AdGroupFeedValues = $adDisplayOptionSample->mutate($setAdGroupFeedRequest, 'set', "AdGroupFeedService");

    // get AdGroupFeed
    $getAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleGetRequest($accountId, $campaignId, $adGroupId, $callExtension->feedItemId);
    $adDisplayOptionSample->get($getAdGroupFeedRequest, 'AdGroupFeedService');

    // =================================================================
    // remvoe CampaignFeed, AdGroupFeed
    // =================================================================
    // CampaignFeed
    $setCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleRemoveRequest($accountId, $campaignId, $quickLink->placeholderType);
    $adDisplayOptionSample->mutate($setCampaignFeedRequest, 'set', "CampaignFeedService");

    // AdGroupFeed
    $setAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleRemoveRequest($accountId, $campaignId, $adGroupId, $callExtension->placeholderType);
    $adDisplayOptionSample->mutate($setAdGroupFeedRequest, 'set', 'AdGroupFeedService');

    // Quicklink FeedItem
    $feedItemServiceSample->removeFeedItem($accountId, $quickLinkValues);

    // CallExtension FeedItem
    $feedItemServiceSample->removeFeedItem($accountId, $callExtensionValues);

    // CalloutExtension FeedItem
    $feedItemServiceSample->removeFeedItem($accountId, $calloutExtensionValues);

    // AdGroup
    if (count($adGroupValues) > 0) {
        $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
        $adGroupServiceSample->mutate($operation, 'REMOVE');
    }

    // Campaign
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
