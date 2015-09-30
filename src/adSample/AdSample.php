<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/BiddingStrategyServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignTargetServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignCriterionServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupCriterionServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupBidMultiplierServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupAdServiceSample.php');

/**
 * Sample Program for BiddingStrategy, CampaignService,CampaignTargetService,
 * CampaignCriterionService,AdGroupService,AdGroupCriterionService,AdGroupAdService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

try {
    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = 0;
    $campaignId = 0;
    $adGroupId = 0;

    //=================================================================
    // BiddingStrategy
    //=================================================================
    // ADD
    $biddingStrategyValues = addBiddingStrategy($accountId);

    // GET
    getBiddingStrategy($accountId, $biddingStrategyValues);

    // SET
    setBiddingStrategy($accountId, $biddingStrategyValues);

    foreach ($biddingStrategyValues as $biddingStrategyValue) {
        if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'PAGE_ONE_PROMOTED') {
            $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
        }
    }

    //=================================================================
    // CampaignService
    //=================================================================
    // ADD
    $campaignValues = addCampaign($accountId, $biddingStrategyId);

    // GET
    getCampaign($accountId, $campaignValues);

    // SET
    setCampaign($accountId, $campaignValues, $biddingStrategyId);

    foreach ($campaignValues as $campaignValue) {
        if ($campaignId === 0) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    //=================================================================
    // CampaignTargetService
    //=================================================================
    // ADD
    $campaignTargetValues = addCampaignTarget($accountId, $campaignId);

    // GET
    getCampaignTarget($accountId, $campaignTargetValues);

    // SET
    setCampaignTarget($accountId, $campaignTargetValues);

    //=================================================================
    // CampaignCriterionService
    //=================================================================
    // ADD
    $campaignCriterionValues = addCampaignCriterion($accountId, $campaignId);

    // GET
    getCampaignCriterion($accountId, $campaignId, $campaignCriterionValues);

    //=================================================================
    // AdGroupService
    //=================================================================
    // ADD
    $adGroupValues = addAdGroup($accountId, $campaignId, $biddingStrategyId);

    // GET
    getAdGroup($accountId, $campaignId, $adGroupValues);

    // SET
    setAdGroup($accountId, $campaignId, $adGroupValues, $biddingStrategyId);

    foreach ($adGroupValues as $adGroupValue) {
        if ($adGroupId === 0) {
            $adGroupId = $adGroupValue->adGroup->adGroupId;
        }
    }

    //=================================================================
    // AdGroupCriterionService
    //=================================================================
    // ADD
    $adGroupCriterionValues = addAdGroupCriterion($accountId, $campaignId, $adGroupId);

    // GET
    getAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // SET
    setAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    //=================================================================
    // AdGroupBidMultiplierService
    //=================================================================
    // SET
    setAdGroupBidMultiplier($accountId, $campaignId, $adGroupId);

    // GET
    getAdGroupBidMultiplier($accountId, $campaignId, $adGroupId);

    //=================================================================
    // AdGroupAdService
    //=================================================================
    // ADD
    $adGroupAdValues = addAdGroupAd($accountId, $campaignId, $adGroupId);

    // GET
    getAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);

    // SET
    setAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);


    //=================================================================
    // remove AsGroupAdService, AsGroupCriterionService, AsGroupService,
    // CampaignCriterionService, CampaignTarget, BiddingStrategy, Campaign
    //=================================================================
    // AdGroupAdService
    removeAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);

    // AdGroupCriterion
    removeAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // AdGroup
    removeAdGroup($accountId, $campaignId, $adGroupValues);

    // CampaignCriterion
    removeCampaignCriterion($accountId, $campaignId, $campaignCriterionValues);

    // CampaignTarget
    removeCampaignTarget($accountId, $campaignTargetValues);

    // Campaign
    removeCampaign($accountId, $campaignValues);

    // BiddingStrategy
    removeBiddingStrategy($accountId, $biddingStrategyValues);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}




