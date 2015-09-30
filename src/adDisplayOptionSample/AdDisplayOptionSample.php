<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for FeedItemService,CampaignFeedService,AdGroupFeedService,
 * Copyright (C) 2013 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// FeedItemService
//=================================================================

$feedItemService = SoapUtils::getService("FeedItemService");

//-----------------------------------------------------------------
// FeedItemService::mutate(ADD) QUICKLINK
//-----------------------------------------------------------------
//request QUICKLINK
$addFeedItemRequest1 = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'placeholderType' => 'QUICKLINK',
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'placeholderType' => 'QUICKLINK',
            'feedItemAttribute' => array(
                array(
                    'placeholderField' => 'LINK_TEXT',
                    'feedAttributeValue' => 'samplelink',
                ),
                array(
                    'placeholderField' => 'LINK_URL',
                    'feedAttributeValue' => 'http://www.quicklink.sample.co.jp',
                ),
            ),
            'startDate' => '20131215',
            'endDate' => '20141215',
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
        ),
    )
);

//call API
$addFeedItemResponse1 = $feedItemService->invoke('mutate', $addFeedItemRequest1);

//response
if (isset($addFeedItemResponse1->rval->values->feedItem)) {
    $feedItem1 = $addFeedItemResponse1->rval->values->feedItem;
} else if (isset($addFeedItemResponse1->rval->values) &&
    is_array($addFeedItemResponse1->rval->values) &&
    isset($addFeedItemResponse1->rval->values[0]->feedItem)
) {
    $feedItem1 = $addFeedItemResponse1->rval->values[0]->feedItem;
} else {
    echo 'Fail to add FeedItem.';
    exit();
}

//-----------------------------------------------------------------
// FeedItemService::mutate(ADD) CALLEXTENSION
//-----------------------------------------------------------------
//request CALLEXTENSION
$addFeedItemRequest2 = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'placeholderType' => 'CALLEXTENSION',
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'placeholderType' => 'CALLEXTENSION',
            'feedItemAttribute' => array(
                array(
                    'placeholderField' => 'CALL_PHONE_NUMBER',
                    'feedAttributeValue' => '0120-123-456',
                )),
            'startDate' => '20131215',
            'endDate' => '20141215',
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

//call API
$addFeedItemResponse2 = $feedItemService->invoke('mutate', $addFeedItemRequest2);

//response
if (isset($addFeedItemResponse2->rval->values->feedItem)) {
    $feedItem2 = $addFeedItemResponse2->rval->values->feedItem;
} else if (isset($addFeedItemResponse2->rval->values) &&
    is_array($addFeedItemResponse2->rval->values) &&
    isset($addFeedItemResponse2->rval->values[0]->feedItem)
) {
    $feedItem2 = $addFeedItemResponse2->rval->values[0]->feedItem;
} else {
    echo 'Fail to add FeedItem.';
    exit();
}

//-----------------------------------------------------------------
// FeedItemService::get
//-----------------------------------------------------------------
//request
$getFeedItemRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'feedItemIds' => array(
            $feedItem1->feedItemId,
            $feedItem2->feedItemId,
        ),
        'placeholderTypes' => array(
            'QUICKLINK',
            'CALLEXTENSION'
        ),
        'approvalStatuses' => array(
            'APPROVED',
            'REVIEW',
            'PRE_DISAPPROVED',
            'APPROVED_WITH_REVIEW',
            'POST_DISAPPROVED',
        ),
        'paging' => array(
            'startIndex' => '1',
            'numberResults' => '20'
        ),
    ),
);

//call API
$getFeedItemResponse = $feedItemService->invoke('get', $getFeedItemRequest);

//response
if (isset($getFeedItemResponse->rval->values->feedItem)) {
    $feedItem = $getFeedItemResponse->rval->values->feedItem;
} else if (isset($getFeedItemResponse->rval->values[0]->feedItem)) {
    $feedItem = $getFeedItemResponse->rval->values[0]->feedItem;
} else {
    echo 'Fail to get FeedItem.';
    exit();
}

//waiting for sandbox review process
sleep(20);

//-----------------------------------------------------------------
// FeedItemService::mutate(SET) QUICKLINK
//-----------------------------------------------------------------
//request QUICKLINK
$setFeedItemRequest1 = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'placeholderType' => 'QUICKLINK',
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'feedItemId' => $feedItem1->feedItemId,
            'placeholderType' => 'QUICKLINK',
            'feedItemAttribute' => array(
                array(
                    'placeholderField' => 'LINK_TEXT',
                    'feedAttributeValue' => 'editlink',
                ),
                array(
                    'placeholderField' => 'LINK_URL',
                    'feedAttributeValue' => 'http://www.quicklink.edit.co.jp',
                ),
            ),
            // unset startDate/endDate
            'startDate' => null,
            'endDate' => null
        ),
    ),
);

//call API
$setFeedItemResponse1 = $feedItemService->invoke('mutate', $setFeedItemRequest1);

//response
if (isset($setFeedItemResponse1->rval->values->feedItem)) {
    $feedItem1 = $setFeedItemResponse1->rval->values->feedItem;
} else if (isset($setFeedItemResponse1->rval->values) &&
    is_array($setFeedItemResponse1->rval->values) &&
    isset($setFeedItemResponse1->rval->values[0]->feedItem)
) {
    $feedItem1 = $setFeedItemResponse1->rval->values[0]->feedItem;
} else {
    echo 'Fail to set FeedItem.';
    exit();
}

//-----------------------------------------------------------------
// FeedItemService::mutate(SET) CALLEXTENSION
//-----------------------------------------------------------------
//request CALLEXTENSION
$setFeedItemRequest2 = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'placeholderType' => 'CALLEXTENSION',
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'feedItemId' => $feedItem2->feedItemId,
            'placeholderType' => 'CALLEXTENSION',
            'feedItemAttribute' => array(
                array(
                    'placeholderField' => 'CALL_PHONE_NUMBER',
                    'feedAttributeValue' => '0120-456-789',
                ),
            ),
            // unset scheduling
            'scheduling' => null
        ),
    ),
);

//call API
$setFeedItemResponse2 = $feedItemService->invoke('mutate', $setFeedItemRequest2);

//response
if (isset($setFeedItemResponse2->rval->values->feedItem)) {
    $feedItem2 = $setFeedItemResponse2->rval->values->feedItem;
} else if (isset($setFeedItemResponse2->rval->values) &&
    is_array($setFeedItemResponse2->rval->values) &&
    isset($setFeedItemResponse2->rval->values[0]->feedItem)
) {
    $feedItem2 = $setFeedItemResponse2->rval->values[0]->feedItem;
} else {
    echo 'Fail to set FeedItem.';
    exit();
}
//=================================================================
// CampaignFeedService
//=================================================================

$campaignFeedService = SoapUtils::getService("CampaignFeedService");

//-----------------------------------------------------------------
// CampaignFeedService::mutate(SET)
//-----------------------------------------------------------------
//request add QUICKLINK setting
$setCampaignFeedRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'placeholderType' => 'QUICKLINK',
            'campaignFeed' => array(
                'feedItemId' => $feedItem1->feedItemId,
            ),
            'devicePlatform' => 'SMART_PHONE'
        )
    )
);

//call API
$setCampaignFeedResponse = $campaignFeedService->invoke('mutate', $setCampaignFeedRequest);

//response
if (isset($setCampaignFeedResponse->rval->values->campaignFeedList)) {
    $campaignFeed = $setCampaignFeedResponse->rval->values->campaignFeedList;
} else if (isset($setCampaignFeedResponse->rval->values) &&
    is_array($setCampaignFeedResponse->rval->values) &&
    isset($setCampaignFeedResponse->rval->values[0]->campaignFeedList)
) {
    $campaignFeed = $setCampaignFeedResponse->rval->values[0]->campaignFeedList;
} else {
    echo 'Fail to set CampaignFeed.';
    exit();
}


//-----------------------------------------------------------------
// CampaignFeedService::get
//-----------------------------------------------------------------
//request
$getCampaignFeedRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array(
            SoapUtils::getCampaignId(),
        ),
        'feedItemEds' => array(
            $feedItem1->feedItemId,
        ),
        'placeholderTypes' => array(
            'QUICKLINK',
            'CALLEXTENSION'
        ),
        'paging' => array(
            'startIndex' => '1',
            'numberResults' => '20'
        ),
    )
);

//call API
$getCampaignFeedResponse = $campaignFeedService->invoke('get', $getCampaignFeedRequest);

//response
if (isset($getCampaignFeedResponse->rval->values->campaignFeedList)) {
    $campaignFeed = $getCampaignFeedResponse->rval->values->campaignFeedList;
} else if (isset($getCampaignFeedResponse->rval->values[0]->campaignFeedList)) {
    $campaignFeed = $getCampaignFeedResponse->rval->values[0]->campaignFeedList;
} else {
    echo 'Fail to get CampaignFeed.';
    exit();
}


//=================================================================
// AdGroupFeedService
//=================================================================

$adGroupFeedService = SoapUtils::getService("AdGroupFeedService");

//-----------------------------------------------------------------
// AdGroupFeedService::mutate(SET)
//-----------------------------------------------------------------
//request add CALLEXTENSION setting
$setAdGroupFeedRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'adGroupId' => SoapUtils::getadGroupId(),
            'placeholderType' => 'CALLEXTENSION',
            'adGroupFeed' => array(
                'feedItemId' => $feedItem2->feedItemId,
            )
        )
    )
);

//call API
$setAdGroupFeedResponse = $adGroupFeedService->invoke('mutate', $setAdGroupFeedRequest);

//response
if (isset($setAdGroupFeedResponse->rval->values->adGroupFeedList)) {
    $adGroupFeed = $setAdGroupFeedResponse->rval->values->adGroupFeedList;
} else if (isset($setAdGroupFeedResponse->rval->values) &&
    is_array($setAdGroupFeedResponse->rval->values) &&
    isset($setAdGroupFeedResponse->rval->values[0]->adGroupFeedList)
) {
    $adGroupFeed = $setAdGroupFeedResponse->rval->values[0]->adGroupFeedList;
} else {
    echo 'Fail to set AdGroupFeed.';
    exit();
}

//-----------------------------------------------------------------
// AdGroupFeedService::get
//-----------------------------------------------------------------
//request
$getAdGroupFeedRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array(
            SoapUtils::getCampaignId(),
        ),
        'adGroupIds' => array(
            SoapUtils::getadGroupId(),
        ),
        'feedItemEds' => array(
            $feedItem2->feedItemId,
        ),
        'placeholderTypes' => array(
            'QUICKLINK',
            'CALLEXTENSION'
        ),
        'paging' => array(
            'startIndex' => '1',
            'numberResults' => '20'
        ),
    )
);

//call API
$getAdGroupFeedResponse = $adGroupFeedService->invoke('get', $getAdGroupFeedRequest);

//response
if (isset($getAdGroupFeedResponse->rval->values->adGroupFeedList)) {
    $adGroupFeed = $getAdGroupFeedResponse->rval->values->adGroupFeedList;
} else if (isset($getAdGroupFeedResponse->rval->values[0]->adGroupFeedList)) {
    $adGroupFeed = $getAdGroupFeedResponse->rval->values[0]->adGroupFeedList;
} else {
    echo 'Fail to get adGroupFeed.';
    exit();
}

//-----------------------------------------------------------------
// CampaignFeedService::mutate(SET)
//-----------------------------------------------------------------
//request remove QUICKLINK setting
$setCampaignFeedRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'placeholderType' => 'QUICKLINK',
            'campaignFeed' => array()
        )
    )
);

//call API
$setCampaignFeedResponse = $campaignFeedService->invoke('mutate', $setCampaignFeedRequest);

//response
if (isset($setCampaignFeedResponse->rval->values->campaignFeedList)) {
    $campaignFeed = $setCampaignFeedResponse->rval->values->campaignFeedList;
} else if (isset($setCampaignFeedResponse->rval->values) &&
    is_array($setCampaignFeedResponse->rval->values) &&
    isset($setCampaignFeedResponse->rval->values[0]->campaignFeedList)
) {
    $campaignFeed = $setCampaignFeedResponse->rval->values[0]->campaignFeedList;
} else {
    echo 'Fail to set CampaignFeed.';
    exit();
}
//-----------------------------------------------------------------
// AdGroupFeedService::mutate(SET)
//-----------------------------------------------------------------
//request remove CALLEXTENSION setting
$setAdGroupFeedRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'adGroupId' => SoapUtils::getadGroupId(),
            'placeholderType' => 'CALLEXTENSION',
            'adGroupFeed' => array()
        )
    )
);

//call API
$setAdGroupFeedResponse = $adGroupFeedService->invoke('mutate', $setAdGroupFeedRequest);

//response
if (isset($setAdGroupFeedResponse->rval->values->adGroupFeedList)) {
    $adGroupFeed = $setAdGroupFeedResponse->rval->values->adGroupFeedList;
} else if (isset($setAdGroupFeedResponse->rval->values) &&
    is_array($setAdGroupFeedResponse->rval->values) &&
    isset($setAdGroupFeedResponse->rval->values[0]->adGroupFeedList)
) {
    $adGroupFeed = $setAdGroupFeedResponse->rval->values[0]->adGroupFeedList;
} else {
    echo 'Fail to set AdGroupFeed.';
    exit();
}

//-----------------------------------------------------------------
// FeedItemService::mutate(REMOVE)
//-----------------------------------------------------------------
//request
$removeFeedItemRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'placeholderType' => 'QUICKLINK',
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'feedItemId' => $feedItem1->feedItemId,
            'placeholderType' => 'QUICKLINK',
        ),
    ),
);

//call API
$removeFeedItemResponse = $feedItemService->invoke('mutate', $removeFeedItemRequest);

//response
if (isset($removeFeedItemResponse->rval->values->feedItem)) {
    $feedItem = $removeFeedItemResponse->rval->values->feedItem;
} else if (isset($removeFeedItemResponse->rval->values[0]->feedItem)) {
    $feedItem = $removeFeedItemResponse->rval->values[0]->feedItem;
} else {
    echo 'Fail to remove FeedItem.';
    exit();
}

