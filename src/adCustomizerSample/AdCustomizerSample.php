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
 * Example AdCustomizer DynamicSearchLinkedAd entity.
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
                'headline' => '{=IF(device=mobile,MOBILE):PC}Headline',
                'headline2' => '{=IF(device=mobile,MOBILE):PC}Headline2',
                'description' => '{=IF(device=mobile,MOBILE):PC}Description',
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
                'headline' => '{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline' ,
                'headline2' => '{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}headline2' ,
                'description' => '{=IF(device=mobile,MOBILE):PC}test {=' . $feedFolderName . "." . $feedAttributeNames['AD_CUSTOMIZER_STRING'] . ':default}description' ,
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
        $operand[$adGroupAdKey]['ad'] = SoapUtils::encodingSoapVar($operand[$adGroupAdKey]['ad'], 'ExtendedTextAd','AdGroupAd' , 'ad');
    }

    return $operand;
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupCriterionServiceSample = new AdGroupCriterionServiceSample();
    $feedFolderServiceSample = new FeedFolderServiceSample();
    $feedItemServiceSample = new FeedItemServiceSample();
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $feedAttributeIds = array(
        'AD_CUSTOMIZER_INTEGER' => SoapUtils::getIntegerFeedAttributeId(),
        'AD_CUSTOMIZER_PRICE' => SoapUtils::getPriceFeedAttributeId(),
        'AD_CUSTOMIZER_DATE' => SoapUtils::getDateFeedAttributeId(),
        'AD_CUSTOMIZER_STRING' => SoapUtils::getStringFeedAttributeId(),
    );
    $feedFolderName = null;
    $feedAttributeNames = array(
        'AD_CUSTOMIZER_INTEGER' => null,
        'AD_CUSTOMIZER_PRICE' => null,
        'AD_CUSTOMIZER_DATE' => null,
        'AD_CUSTOMIZER_STRING' => null,
    );

    //=================================================================
    // add CampaignService,AdGroupService,AdGroupCriterionService,
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

    // AdGroupCriterionService
    $adGroupCriterionAddRequest = $adGroupCriterionServiceSample->createSampleAddRequest($accountId,$campaignId,$adGroupId);
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($adGroupCriterionAddRequest, 'ADD');

    //=================================================================
    // FeedFolderService
    //=================================================================
    // FeedFolderServiceSample ADD
    $feedFolderValues = array();
    if ($feedFolderId === 'xxxxxxxx') {
        $feedFolderAddRequest = $feedFolderServiceSample->createMutateRequest('ADD', $accountId);
        array_push($feedFolderAddRequest['operations']['operand'], $feedFolderServiceSample->createAddAdCustomizerFeedFolder($accountId));
        $feedFolderValues = $feedFolderServiceSample->mutate($feedFolderAddRequest, 'ADD');
        foreach ($feedFolderValues as $feedFolderValue) {
            $feedFolderName = $feedFolderValue->feedFolder->feedFolderName;
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
            foreach ($feedFolderValue->feedFolder->feedAttribute as $feedAttribute) {
                $feedAttributeNames[$feedAttribute->placeholderField] = $feedAttribute->feedAttributeName;
                $feedAttributeIds[$feedAttribute->placeholderField] = $feedAttribute->feedAttributeId;
            }
        }
    }

    // FeedFolderServiceSample SET
    $feedFolderServiceSample->setFeedFolder($accountId, $feedFolderValues);

    // FeedFolderServiceSample GET
    $feedFolderServiceSample->getFeedFolder($accountId, $feedFolderValues);

    //=================================================================
    // FeedItemService
    //=================================================================
    // FeedItemServiceSample(AD_CUSTOMIZER) ADD
    $feedItemValues = $feedItemServiceSample->addFeedItem($accountId, $campaignId, $adGroupId, $feedFolderId, $feedAttributeIds);

    // FeedItemServiceSample GET
    $feedItemServiceSample->checkApprovalStatus($accountId, $feedItemValues);

    // FeedItemServiceSample(AD_CUSTOMIZER) SET
    $feedItemServiceSample->setFeedItem($accountId, $feedAttributeIds, $feedItemValues);

    //=================================================================
    // add AdGroupAdService
    //=================================================================
    $adGroupAdAddRequest = $adGroupAdServiceSample->createMutateRequest('ADD',$accountId);
    $adGroupAdAddRequest['operations']['operand'] = createAdGroupAd($accountId, $campaignId, $adGroupId, $feedFolderName, $feedAttributeNames);
    $adGroupAdValues = $adGroupAdServiceSample->mutate($adGroupAdAddRequest, 'ADD');

    //=================================================================
    // remove AdGroupAdService,FeedItemService,FeedFolderService,
    // AdGroupCriterionService,AdGroupService,CampaignService
    //=================================================================
    // AdGroupAdService
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);
    $adGroupAdServiceSample->mutate($operation, 'REMOVE');

    // FeedItemService
    $feedItemServiceSample->removeFeedItem($accountId, $feedItemValues);

    // AdGroupCriterionService
    $operation = $adGroupCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionServiceSample->mutate($operation, 'REMOVE');

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

    // FeedFolderService
    if(count($feedFolderValues) > 0) {
        $feedFolderServiceSample->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}