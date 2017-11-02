<?php
/**
 * Sample Program for AdCustomizerSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupCriterionServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupAdServiceSample.php');
require_once(dirname(__FILE__) . '/FeedFolderServiceSample.php');
require_once(dirname(__FILE__) . '/FeedItemServiceSample.php');

/**
 * CampaignService::mutate(ADD)
 *
 * @param string $accountId Account ID
 * @return array CampaignValues entity
 * @throws Exception
 */
function createCampaign($accountId)
{
    // Set Operand
    $operand = array(
        // Set ManualCpc Campaign
        array(
            'accountId' => $accountId,
            'campaignName' => 'SampleCampaign_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'startDate' => '20300101',
            'endDate' => '20301231',
            'budget' => array(
                'period' => 'DAILY',
                'amount' => 1000,
                'deliveryMethod' => 'STANDARD',
            ),
            'biddingStrategyConfiguration' => array(
                'biddingStrategyType' => 'MANUAL_CPC',
            ),
            'adServingOptimizationStatus' => 'ROTATE_INDEFINITELY',
            'settings' => array(
                array(
                    'type' => 'GEO_TARGET_TYPE_SETTING',
                    'positiveGeoTargetType' => 'AREA_OF_INTENT',
                ),
            ),
            'trackingUrl' => 'http://yahoo.co.jp?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
            'customParameters' => array(
                'parameters' => array(
                    'key' => 'id1',
                    'value' => '1234',
                ),
            ),
        ),
    );

    //xsi:type for settings
    $operand[0]['settings'][0] =
        new SoapVar($operand[0]['settings'][0],
            SOAP_ENC_OBJECT, 'GeoTargetTypeSetting', API_NS, 'settings', XMLSCHEMANS);

    // Set Request
    $campaignRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignService = SoapUtils::getService('CampaignService');
    $campaignResponse = $campaignService->invoke('mutate', $campaignRequest);

    // Response
    if (isset($campaignResponse->rval->values)) {
        if (is_array($campaignResponse->rval->values)) {
            $campaignReturnValues = $campaignResponse->rval->values;
        } else {
            $campaignReturnValues = array($campaignResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add CampaignService.");
    }

    // Error
    foreach ($campaignReturnValues as $campaignReturnValue) {
        if (!isset($campaignReturnValue->campaign)) {
            throw new Exception("Fail to add CampaignService.");
        }
    }

    return $campaignReturnValues;
}

/**
 * AdGroupService::mutate(ADD)
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @return array AdGroupValues entity
 * @throws Exception
 */
function createAdGroup($accountId, $campaignId)
{
    // Set Operand
    $operand = array(
        // Set ManualCpc AdGroup
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupName' => 'SampleAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'trackingUrl' => 'http://yahoo.co.jp?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
            'customParameters' => array(
                'parameters' => array(
                    'key' => 'id1',
                    'value' => '1234',
                ),
            ),
        ),
    );

    // Set Request
    $adGroupRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupService = SoapUtils::getService('AdGroupService');
    $adGroupResponse = $adGroupService->invoke('mutate', $adGroupRequest);

    // Response
    if (isset($adGroupResponse->rval->values)) {
        if (is_array($adGroupResponse->rval->values)) {
            $adGroupReturnValues = $adGroupResponse->rval->values;
        } else {
            $adGroupReturnValues = array($adGroupResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add AdGroupService.");
    }

    // Error
    foreach ($adGroupReturnValues as $adGroupReturnValue) {
        if (!isset($adGroupReturnValue->adGroup)) {
            throw new Exception("Fail to add AdGroupService.");
        }
    }

    return $adGroupReturnValues;
}

/**
 * AdGroupCriterionService::mutate(ADD)
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @return array AdGroupCriterionValues entity
 * @throws Exception
 */
function createAdGroupCriterion($accountId, $campaignId, $adGroupId)
{
    // Set Operand
    $operand = array(
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'criterionUse' => 'BIDDABLE',
            'criterion' => array(
                'type' => 'KEYWORD',
                'text' => 'sample Value',
                'matchType' => 'EXACT'
            ),
            'userStatus' => 'ACTIVE',
            'destinationUrl' => 'http://www.yahoo.co.jp/',
            'biddingStrategyConfiguration' => array(
                'bid' => array(
                    'maxCpc' => 100,
                ),
            ),
            'advancedUrl' => 'http://www.yahoo.co.jp',
            'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
            'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
            'customParameters' => array(
                'parameters' => array(
                    'key' => 'id1',
                    'value' => '1234',
                ),
            ),
            'advanced' => 'TRUE',
        ),
    );

    //xsi:type for criterion Keyword
    $operand[0]['criterion'] =
        new SoapVar($operand[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
    //xsi:type for operand BiddableAdGroupCriterion
    $operand[0] =
        new SoapVar($operand[0], SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

    // Set Request
    $adGroupCriterionRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'criterionUse' => 'BIDDABLE',
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupCriterionService = SoapUtils::getService('AdGroupCriterionService');
    $adGroupCriterionResponse = $adGroupCriterionService->invoke('mutate', $adGroupCriterionRequest);

    // Response
    if (isset($adGroupCriterionResponse->rval->values)) {
        if (is_array($adGroupCriterionResponse->rval->values)) {
            $adGroupCriterionReturnValues = $adGroupCriterionResponse->rval->values;
        } else {
            $adGroupCriterionReturnValues = array($adGroupCriterionResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add AdGroupCriterionService.");
    }

    // Error
    foreach ($adGroupCriterionReturnValues as $adGroupCriterionReturnValue) {
        if (!isset($adGroupCriterionReturnValue->adGroupCriterion)) {
            throw new Exception("Fail to add AdGroupCriterionService.");
        }
    }

    return $adGroupCriterionReturnValues;
}

/**
 * AdGroupAdService(ADD)
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param string $feedFolderName Feed Folder Name
 * @param array $feedAttributeNames Feed Attribute Names
 * @return array AdGroupAdValues entity
 * @throws Exception
 */
function createAdGroupAd($accountId, $campaignId, $adGroupId, $feedFolderName, $feedAttributeNames)
{
    // Set Operand
    $operand = array(
        // Set ExtendedTextAd(Keyword)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleExtendedTextAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => 'sample headline',
                'headline2' => 'sample headline2',
                'description' => 'sample {KEYWORD:keyword}',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
        // Set ExtendedTextAd(CountdownOption)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleCountdownOptionAd_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => 'sample headline',
                'headline2' => 'sample headline2',
                'description' => '{=COUNTDOWN("2018/12/15 18:00:00","ja")}',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
        // Set ExtendedTextAd(CountdownOption&AD_CUSTOMIZER_DATE)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleCountdownOfAdCustomizer_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => 'sample headline',
                'headline2' => 'sample headline2',
                'description' => '{=COUNTDOWN(' . $feedFolderName . '.' . $feedAttributeNames['AD_CUSTOMIZER_DATE'] . ',"ja")}',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
        // Set ExtendedTextAd(adCustomizer defaultText)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleAdCustomizer_DefaultText_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => '{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline',
                'headline2' => '{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline2',
                'description' => '{=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}Description',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
        // ExtendedTextAd(adCustomizer Mobile specification with IF function)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleAdCustomizer_IF_function_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => '{=IF(device=mobile, MOBILE):PC}Headline',
                'headline2' => '{=IF(device=mobile, MOBILE):PC}Headline2',
                'description' => '{=IF(device=mobile, MOBILE):PC}Description',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
        // ExtendedTextAd(adCustomizer Mobile specification with IF function and DefaultText)
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleAdCustomizer_IF_And_Default' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => '{=IF(device=mobile, MOBILE):PC}test + {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline' ,
                'headline2' => '{=IF(device=mobile, MOBILE):PC}test + {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline2' ,
                'description' => '{=IF(device=mobile, MOBILE):PC}test + {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}description' ,
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234',
                    ),
                ),
            ),
            'userStatus' => 'ACTIVE',
        ),
    );

    //xsi:typ for ad of ExtendedTextAd
    foreach ($operand as $adGroupAdKey => $adGroupAdValue) {
        $operand[$adGroupAdKey]['ad'] = new SoapVar($operand[$adGroupAdKey]['ad'], SOAP_ENC_OBJECT, 'ExtendedTextAd', API_NS, 'ad', XMLSCHEMANS);
    }

    // Set Request
    $adGroupAdRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupAdService = SoapUtils::getService('AdGroupAdService');
    $adGroupAdResponse = $adGroupAdService->invoke('mutate', $adGroupAdRequest);

    // Response
    if (isset($adGroupAdResponse->rval->values)) {
        if (is_array($adGroupAdResponse->rval->values)) {
            $adGroupAdReturnValues = $adGroupAdResponse->rval->values;
        } else {
            $adGroupAdReturnValues = array($adGroupAdResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add AdGroupAdService.");
    }

    // Error
    foreach ($adGroupAdReturnValues as $adGroupAdReturnValue) {
        if (!isset($adGroupAdReturnValue->adGroupAd)) {
            throw new Exception("Fail to add AdGroupAdService.");
        }
    }

    return $adGroupAdReturnValues;
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    $campaignService = new CampaignServiceSample();
    $adGroupService = new AdGroupServiceSample();
    $adGroupCriterionService = new AdGroupCriterionServiceSample();
    $feedFolderService = new FeedFolderServiceSample();
    $feedItemService = new FeedItemServiceSample();
    $adGroupAdService = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = 0;
    $adGroupId = 0;
    $feedFolderId = 0;
    $feedFolderName = null;
    $feedAttributeNames = array(
        'AD_CUSTOMIZER_INTEGER' => null,
        'AD_CUSTOMIZER_PRICE' => null,
        'AD_CUSTOMIZER_DATE' => null,
        'AD_CUSTOMIZER_STRING' => null,
    );
    $feedAttributeIds = array(
        'AD_CUSTOMIZER_INTEGER' => 0,
        'AD_CUSTOMIZER_PRICE' => 0,
        'AD_CUSTOMIZER_DATE' => 0,
        'AD_CUSTOMIZER_STRING' => 0,
    );

    //=================================================================
    // add CampaignService,AdGroupService,AdGroupCriterionService,
    //=================================================================
    // CampaignService
    $campaignValues = createCampaign($accountId);
    foreach ($campaignValues as $campaignValue) {
        if ($campaignId === 0) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // AdGroupService
    $adGroupValues = createAdGroup($accountId, $campaignId);
    foreach ($adGroupValues as $adGroupValue) {
        if ($adGroupId === 0) {
            $adGroupId = $adGroupValue->adGroup->adGroupId;
        }
    }

    // AdGroupCriterionService
    $adGroupCriterionValues = createAdGroupCriterion($accountId, $campaignId, $adGroupId);

    //=================================================================
    // FeedFolderService
    //=================================================================
    // FeedFolderServiceSample ADD
    $feedFolderValues = $feedFolderService->addFeedFolder($accountId);
    foreach ($feedFolderValues as $feedFolderValue) {
        if ($feedFolderId === 0) {
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
        }
        if (is_null($feedFolderName)) {
            $feedFolderName = $feedFolderValue->feedFolder->feedFolderName;
        }
        foreach ($feedFolderValue->feedFolder->feedAttribute as $feedAttributeKey => $feedAttributeValue) {
            if (is_null($feedAttributeNames[$feedAttributeValue->placeholderField])) {
                $feedAttributeNames[$feedAttributeValue->placeholderField] = $feedAttributeValue->feedAttributeName;
            }
            if ($feedAttributeIds[$feedAttributeValue->placeholderField] === 0) {
                $feedAttributeIds[$feedAttributeValue->placeholderField] = $feedAttributeValue->feedAttributeId;
            }
        }
    }

    // FeedFolderServiceSample SET
    $feedFolderService->setFeedFolder($accountId, $feedFolderValues);

    // FeedFolderServiceSample GET
    $feedFolderService->getFeedFolder($accountId, $feedFolderValues);

    //=================================================================
    // FeedItemService
    //=================================================================
    // FeedItemServiceSample(AD_CUSTOMIZER) ADD
    $feedItemValues = $feedItemService->addFeedItem($accountId, $campaignId, $adGroupId, $feedFolderId, $feedAttributeIds);

    //waiting for sandbox review process
    sleep(20);

    // FeedItemServiceSample(AD_CUSTOMIZER) SET
    $feedItemService->setFeedItem($accountId, $feedAttributeIds, $feedItemValues);

    // FeedItemServiceSample GET
    $feedItemService->getFeedItem($accountId, $feedItemValues);

    //=================================================================
    // add AdGroupAdService
    //=================================================================
    $adGroupAdValues = createAdGroupAd($accountId, $campaignId, $adGroupId, $feedFolderName, $feedAttributeNames);

    //=================================================================
    // remove AdGroupAdService,FeedItemService,FeedFolderService,
    // AdGroupCriterionService,AdGroupService,CampaignService
    //=================================================================
    // AdGroupAdService
    $operation = $adGroupAdService->createSampleRemoveRequest($accountId, $adGroupAdValues);
    $adGroupAdService->mutate($operation, 'REMOVE');

    // FeedItemService
    $feedItemService->removeFeedItem($accountId, $feedItemValues);

    // FeedFolderService
    $feedFolderService->removeFeedFolder($accountId, $feedFolderValues);

    // AdGroupCriterionService
    $operation = $adGroupCriterionService->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionService->mutate($operation, 'REMOVE');

    // AdGroupService
    $operation = $adGroupService->createSampleRemoveRequest($accountId, $adGroupValues);
    $adGroupService->mutate($operation, 'REMOVE');

    // CampaignService
    $operation = $campaignService->createSampleRemoveRequest($accountId, $campaignValues);
    $campaignService->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}