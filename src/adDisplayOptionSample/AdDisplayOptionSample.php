<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for FeedItemService,CampaignFeedService,AdGroupFeedService,
 * Copyright (C) 2013 Yahoo Japan Corporation.
 * All Rights Reserved.
 */
class AdDisplayOptionSample{

    /**
     * Sample Program for Service MUTATE.
     *
     * @param array $operation Exexute service operation entity.
     * @param string $method Operator enum.
     * @param string $serviceName Exexute Service Name.
     * @return array Exexute service return value entity.
     * @throws Exception
     */
    public function mutate($operation, $method, $serviceName){

        // Call API
        $service = SoapUtils::getService($serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
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
    public function get($selector, $serviceName){

        // Call API
        $service = SoapUtils::getService($serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of get ' . $serviceName . '.');
        }

        return $returnValues;
    }

    /**
     * create Quicklink FeedItem sample request.
     *
     * @param long $accountId AccountID
     * @return FeedItemOperation entity.
     */
    public function createFeedItemQuicklinkSampleAddRequest($accountId){
        // -----------------------------------------------------------------
        // FeedItemService::mutate(ADD) QUICKLINK
        // -----------------------------------------------------------------
        // request QUICKLINK
        $addFeedItemRequest1 = array(
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
                        )
                    ),
                    'startDate' => '20161231',
                    'endDate' => '20181231',
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
                    'advanced' => 'TRUE'
                )
            )
        );

        return $addFeedItemRequest1;
    }

    /**
     * create Callextension FeedItem sample request.
     *
     * @param long $accountId AccountID
     * @return FeedItemOperation entity.
     */
    public function createFeedItemCallExtensionSampleAddRequest($accountId){
        // -----------------------------------------------------------------
        // FeedItemService::mutate(ADD) CALLEXTENSION
        // -----------------------------------------------------------------
        // request CALLEXTENSION
        $addFeedItemRequest2 = array(
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
                    'startDate' => '20161231',
                    'endDate' => '20171231',
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

        return $addFeedItemRequest2;
    }

    /**
     * create FeedItem sample request.
     *
     * @param long $accountId AccountID
     * @param array $feedItemIds FeedItemIDs
     * @return AdGroupBidMultiplierSelector entity.
     */
    public function createFeedItemSampleGetRequest($accountId, array $feedItemIds){
        // -----------------------------------------------------------------
        // FeedItemService::get
        // -----------------------------------------------------------------
        // request
        $getFeedItemRequest = array(
            'selector' => array(
                'accountId' => $accountId,
                'feedItemIds' => $feedItemIds,
                'placeholderTypes' => array(
                    'QUICKLINK',
                    'CALLEXTENSION'
                ),
                'approvalStatuses' => array(
                    'APPROVED',
                    'REVIEW',
                    'PRE_DISAPPROVED',
                    'APPROVED_WITH_REVIEW',
                    'POST_DISAPPROVED'
                ),
                'paging' => array(
                    'startIndex' => '1',
                    'numberResults' => '20'
                )
            )
        );

        return $getFeedItemRequest;
    }

    /**
     * create Quicklink FeedItem sample set request.
     *
     * @param long $accountId AccountID
     * @param long $feedItemId FeedItemID
     * @return FeedItemOperation entity.
     */
    public function createFeedItemQuicklinkSampleSetRequest($accountId, $feedItemId){
        // -----------------------------------------------------------------
        // FeedItemService::mutate(SET) QUICKLINK
        // -----------------------------------------------------------------
        // request QUICKLINK
        $setFeedItemRequest1 = array(
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
                            'placeholderField' => 'LINK_URL',
                            'feedAttributeValue' => 'http://www.quicklink.edit.co.jp'
                        )
                    ),
                    // unset startDate/endDate
                    'startDate' => null,
                    'endDate' => null,
                    'customParameters' => array(
                        'isRemove' => 'FALSE',
                        'parameters' => array(
                            'key' => 'id1',
                            'value' => '5678'
                        )
                    ),
                    'advanced' => 'TRUE'
                )
            )
        );
        return $setFeedItemRequest1;
    }

    /**
     * create CallExtension FeedItem sample set request.
     *
     * @param long $accountId AccountID
     * @param long $feedItemId FeedItemID
     * @return FeedItemOperation entity.
     */
    public function createFeedItemCallExtensionSampleSetRequest($accountId, $feedItemId){
        // -----------------------------------------------------------------
        // FeedItemService::mutate(SET) CALLEXTENSION
        // -----------------------------------------------------------------
        // request CALLEXTENSION
        $setFeedItemRequest2 = array(
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
        return $setFeedItemRequest2;
    }

    /**
     * create CampaignFeed sample set request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $feedItemId QuicklinkFeedItemID
     * @param String $placeholderType PlaceholderType enum
     * @return CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleSetRequest($accountId, $campaignId, $feedItemId, $placeholderType){
        // -----------------------------------------------------------------
        // CampaignFeedService::mutate(SET)
        // -----------------------------------------------------------------
        // request add QUICKLINK setting
        $setCampaignFeedRequest = array(
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

        return $setCampaignFeedRequest;
    }

    /**
     * create CampaignFeed sample get request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $feedItemId QuicklinkFeedItemID
     * @return CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleGetRequest($accountId, $campaignId, $feedItemId){
        // -----------------------------------------------------------------
        // CampaignFeedService::get
        // -----------------------------------------------------------------
        // request
        $getCampaignFeedRequest = array(
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
                    'CALLEXTENSION'
                ),
                'paging' => array(
                    'startIndex' => '1',
                    'numberResults' => '20'
                )
            )
        );

        return $getCampaignFeedRequest;
    }

    /**
     * create AdGroupFeed sample set request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @param long $feedItemId CallextensionFeedItemID
     *        　* @param String $placeholderType PlaceholderType enum
     * @return AdGroupFeedSOperation entity.
     */
    public function createAdGroupFeedSampleSetRequest($accountId, $campaignId, $adGroupId, $feedItemId, $placeholderType){
        // -----------------------------------------------------------------
        // AdGroupFeedService::mutate(SET)
        // -----------------------------------------------------------------
        // request add CALLEXTENSION setting
        $setAdGroupFeedRequest = array(
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

        return $setAdGroupFeedRequest;
    }

    /**
     * create AdGroupFeed sample get request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @param long $feedItemId CallextensionFeedItemID
     * @return AdGroupFeedSOperation entity.
     */
    public function createAdGroupFeedSampleGetRequest($accountId, $campaignId, $adGroupId, $feedItemId){
        // -----------------------------------------------------------------
        // AdGroupFeedService::get
        // -----------------------------------------------------------------
        // request
        $getAdGroupFeedRequest = array(
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
                    'CALLEXTENSION'
                ),
                'paging' => array(
                    'startIndex' => '1',
                    'numberResults' => '20'
                )
            )
        );

        return $getAdGroupFeedRequest;
    }

    /**
     * create CampaignFeed sample remove quicklink setting request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param String $placeholderType PlaceholderType enum
     * @return CampaignFeedOperation entity.
     */
    public function createCampaignFeedSampleRemoveRequest($accountId, $campaignId, $placeholderType){
        // -----------------------------------------------------------------
        // CampaignFeedService::mutate(SET)
        // -----------------------------------------------------------------
        // request remove QUICKLINK setting
        $setCampaignFeedRequest = array(
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

        return $setCampaignFeedRequest;
    }

    /**
     * create dGroupFeed sample remove CallExtension setting request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @param String $placeholderType PlaceholderType enum
     * @return AdGroupFeedOperation entity.
     */
    public function createAdGroupFeedSampleRemoveRequest($accountId, $campaignId, $adGroupId, $placeholderType){
        // -----------------------------------------------------------------
        // AdGroupFeedService::mutate(SET)
        // -----------------------------------------------------------------
        // request remove CALLEXTENSION setting
        $setAdGroupFeedRequest = array(
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
        return $setAdGroupFeedRequest;
    }

    /**
     * create FeedItem sample remove request.
     *
     * @param long $accountId AccountID
     * @param String $placeholderType PlaceholderType enum
     * @param long $feedItemId FeedItemID
     * @return FeedItemOperation entity.
     */
    public function createFeedItemSampleRemoveRequest($accountId, $placeholderType, $feedItemId){
        // -----------------------------------------------------------------
        // FeedItemService::mutate(REMOVE)
        // -----------------------------------------------------------------
        // request
        $removeFeedItemRequest = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'placeholderType' => $placeholderType,
                'operand' => array(
                    'accountId' => $accountId,
                    'feedItemId' => $feedItemId,
                    'placeholderType' => $placeholderType
                )
            )
        );

        return $removeFeedItemRequest;
    }
}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * execute AdGroupBidMultiplierServiceSample.
 */
try{
    // =================================================================
    // FeedItemService
    // =================================================================

    $feedItemService = SoapUtils::getService("FeedItemService");
    $adDisplayOptionSample = new AdDisplayOptionSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $feedItem1 = null;
    $feedItem2 = null;

    // create QuickLink FeedItem
    $addFeedItemRequest1 = $adDisplayOptionSample->createFeedItemQuicklinkSampleAddRequest($accountId);
    $addFeedItemResponse1 = $adDisplayOptionSample->mutate($addFeedItemRequest1, 'add', 'FeedItemService');

    // Error
    foreach($addFeedItemResponse1 as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to add FeedItemService');
        }else{
            $feedItem1 = $returnValue->feedItem;
        }
    }

    // create CallExtension FeedItem
    $addFeedItemRequest2 = $adDisplayOptionSample->createFeedItemCallExtensionSampleAddRequest($accountId);
    $addFeedItemResponse2 = $adDisplayOptionSample->mutate($addFeedItemRequest2, 'add', 'FeedItemService');

    // Error
    foreach($addFeedItemResponse2 as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to add FeedItemService');
        }else{
            // response
            $feedItem2 = $returnValue->feedItem;
        }
    }

    // get FeedItem
    $getFeedItemRequest = $adDisplayOptionSample->createFeedItemSampleGetRequest($accountId, array(
        $feedItem1->feedItemId,
        $feedItem2->feedItemId
    ));
    $getFeedItemResponse = $adDisplayOptionSample->get($getFeedItemRequest, 'FeedItemService');

    // Error
    foreach($getFeedItemResponse as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to get FeedItemService');
        }
    }

    // waiting for sandbox review process
    sleep(20);

    // set FeedItem Quicklink
    $setFeedItemRequest1 = $adDisplayOptionSample->createFeedItemQuicklinkSampleSetRequest($accountId, $feedItem1->feedItemId);
    $setFeedItemResponse1 = $adDisplayOptionSample->mutate($setFeedItemRequest1, 'set', 'FeedItemService');

    // Error
    foreach($setFeedItemResponse1 as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to set FeedItemService');
        }
    }

    // set FeedItem CallExtension
    $setFeedItemRequest2 = $adDisplayOptionSample->createFeedItemCallExtensionSampleSetRequest($accountId, $feedItem2->feedItemId);
    $setFeedItemResponse2 = $adDisplayOptionSample->mutate($setFeedItemRequest2, 'set', 'FeedItemService');

    // Error
    foreach($setFeedItemResponse2 as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to set FeedItemService');
        }
    }

    // =================================================================
    // CampaignFeedService
    // =================================================================

    // set CampaignFeed
    $setCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleSetRequest($accountId, $campaignId, $feedItem1->feedItemId, $feedItem1->placeholderType);
    $setCampaignFeedResponse = $adDisplayOptionSample->mutate($setCampaignFeedRequest, 'set', "CampaignFeedService");

    // Error
    foreach($setCampaignFeedResponse as $returnValue){
        if(!isset($returnValue->campaignFeedList)){
            throw new Exception('Fail to set CampaignFeedService');
        }
    }

    // get CampaignFeed
    $getCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleGetRequest($accountId, $campaignId, $feedItem1->feedItemId);
    $getCampaignFeedResponse = $adDisplayOptionSample->get($getCampaignFeedRequest, "CampaignFeedService");

    // Error
    foreach($getCampaignFeedResponse as $returnValue){
        if(!isset($returnValue->campaignFeedList)){
            throw new Exception('Fail to get CampaignFeedService');
        }
    }

    // =================================================================
    // AdGroupFeedService
    // =================================================================

    // set AdGroupFeed
    $setAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleSetRequest($accountId, $campaignId, $adGroupId, $feedItem2->feedItemId, $feedItem2->placeholderType);
    $setAdGroupFeedResponse = $adDisplayOptionSample->mutate($setAdGroupFeedRequest, 'set', "AdGroupFeedService");

    // Error
    foreach($setAdGroupFeedResponse as $returnValue){
        if(!isset($returnValue->adGroupFeedList)){
            throw new Exception('Fail to set AdGroupFeedService');
        }
    }

    // get AdGroupFeed
    $getAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleGetRequest($accountId, $campaignId, $adGroupId, $feedItem2->feedItemId);
    $getAdGroupFeedResponse = $adDisplayOptionSample->get($getAdGroupFeedRequest, 'AdGroupFeedService');

    // Error
    foreach($getAdGroupFeedResponse as $returnValue){
        if(!isset($returnValue->adGroupFeedList)){
            throw new Exception('Fail to get AdGroupFeedService');
        }
    }

    // remove Quicklink setting
    $setCampaignFeedRequest = $adDisplayOptionSample->createCampaignFeedSampleRemoveRequest($accountId, $campaignId, $feedItem1->placeholderType);
    $setCampaignFeedResponse = $adDisplayOptionSample->mutate($setCampaignFeedRequest, 'set', "CampaignFeedService");

    // Error
    foreach($setCampaignFeedResponse as $returnValue){
        if(!isset($returnValue->campaignFeedList)){
            throw new Exception('Fail to set CampaignFeedService');
        }
    }

    // remove CallExtension setting
    $setAdGroupFeedRequest = $adDisplayOptionSample->createAdGroupFeedSampleRemoveRequest($accountId, $campaignId, $adGroupId, $feedItem2->placeholderType);
    $setAdGroupFeedResponse = $adDisplayOptionSample->mutate($setAdGroupFeedRequest, 'set', 'AdGroupFeedService');

    // Error
    foreach($setAdGroupFeedResponse as $returnValue){
        if(!isset($returnValue->adGroupFeedList)){
            throw new Exception('Fail to set AdGroupFeedService');
        }
    }

    // remove Quicklink FeedItem
    $removeFeedItemRequest = $adDisplayOptionSample->createFeedItemSampleRemoveRequest($accountId, $feedItem1->placeholderType, $feedItem1->feedItemId);
    $removeFeedItemResponse = $adDisplayOptionSample->mutate($removeFeedItemRequest, 'remove', "FeedItemService");

    // Error
    foreach($removeFeedItemResponse as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to remove FeedItemService');
        }
    }

    // remove Quicklink FeedItem
    $removeFeedItemRequest = $adDisplayOptionSample->createFeedItemSampleRemoveRequest($accountId, $feedItem2->placeholderType, $feedItem2->feedItemId);
    $removeFeedItemResponse = $adDisplayOptionSample->mutate($removeFeedItemRequest, 'remove', "FeedItemService");

    // Error
    foreach($removeFeedItemResponse as $returnValue){
        if(!isset($returnValue->feedItem)){
            throw new Exception('Fail to remove FeedItemService');
        }
    }
}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
