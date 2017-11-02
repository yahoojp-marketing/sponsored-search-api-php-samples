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
 * Sample Program for AdSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
try {
    $biddingStrategyServiceSample = new BiddingStrategyServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $campaignTargetServiceSample = new CampaignTargetServiceSample();
    $campaignCriterionServiceSample = new CampaignCriterionServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupCriterionServiceSample = new AdGroupCriterionServiceSample();
    $adGroupBidMultiplierServiceSample = new AdGroupBidMultiplierServiceSample();
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = 0;
    $campaignId = 0;
    $appCampaignId = 0;
    $adGroupId = 0;
    $appAdGroupId = 0;

    // =================================================================
    // BiddingStrategy
    // =================================================================
    // ADD
    $operation = $biddingStrategyServiceSample->createSampleAddRequest($accountId);
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'ADD');

    // sleep 30 second.
    sleep(30);

    // GET
    $selector = $biddingStrategyServiceSample->createSampleGetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyValues = $biddingStrategyServiceSample->get($selector);

    // Get BiddingStrategyType for TARGET_SPEND
    foreach ($biddingStrategyValues as $biddingStrategyValue) {
        if ($biddingStrategyId === 0) {
            switch ($biddingStrategyValue->biddingStrategy->biddingStrategyType) {
                default :
                    break;
                case 'TARGET_SPEND' :
                    $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
                    break 2;
            }
        }
    }

    // sleep 20 second.
    sleep(20);

    // =================================================================
    // CampaignService
    // =================================================================
    // ADD
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);
    $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignServiceSample->createSampleGetRequest($accountId, $campaignValues);
    $campaignValues = $campaignServiceSample->get($selector);

    foreach ($campaignValues as $campaignValue) {
        if (($campaignId === 0 || $appCampaignId === 0) && $campaignValue->campaign->biddingStrategyConfiguration->biddingStrategyType === 'TARGET_SPEND') {
            switch ($campaignValue->campaign->campaignType) {
                default :
                    break;
                case 'STANDARD' :
                    $campaignId = $campaignValue->campaign->campaignId;
                    break;
                case 'MOBILE_APP' :
                    $appCampaignId = $campaignValue->campaign->campaignId;
                    break;
            }
        }
    }

    // =================================================================
    // CampaignTargetService
    // =================================================================
    // ADD
    $operation = $campaignTargetServiceSample->createSampleAddRequest($accountId, $campaignId);
    $campaignTargetValues = $campaignTargetServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignTargetServiceSample->createSampleGetRequest($accountId, $campaignTargetValues);
    $campaignTargetValues = $campaignTargetServiceSample->get($selector);

    foreach ($campaignTargetValues as $campaignTargetKey => $campaignTargetValue) {
        if ($campaignTargetValue->campaignTarget->target->targetType === 'PLATFORM') {
            unset($campaignTargetValues[$campaignTargetKey]);
        }
    }

    // =================================================================
    // CampaignCriterionService
    // =================================================================
    // ADD
    $operation = $campaignCriterionServiceSample->createSampleAddRequest($accountId, $campaignId);
    $campaignCriterionValues = $campaignCriterionServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignCriterionServiceSample->createSampleGetRequest($accountId, $campaignId, $campaignCriterionValues);
    $campaignCriterionValues = $campaignCriterionServiceSample->get($selector);

    // =================================================================
    // AdGroupService
    // =================================================================
    // ADD
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);
    $adGroupValues = $adGroupServiceSample->get($selector);

    foreach ($adGroupValues as $adGroupValue) {
        if ($adGroupId === 0 || $appAdGroupId === 0) {
            if ($adGroupValue->adGroup->campaignId === $campaignId) {
                $adGroupId = $adGroupValue->adGroup->adGroupId;
            } elseif ($adGroupValue->adGroup->campaignId === $appCampaignId) {
                $appAdGroupId = $adGroupValue->adGroup->adGroupId;
            }
        }
    }

    // =================================================================
    // AdGroupCriterionService
    // =================================================================
    // ADD
    $operation = $adGroupCriterionServiceSample->createSampleAddRequest($accountId, $campaignId, $adGroupId);
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $adGroupCriterionServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionValues = $adGroupCriterionServiceSample->get($selector);

    // =================================================================
    // AdGroupBidMultiplierService
    // =================================================================
    // SET
    $operation = $adGroupBidMultiplierServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId);
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->mutate($operation, 'SET');

    // GET
    $selector = $adGroupBidMultiplierServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId);
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->get($selector);

    // =================================================================
    // AdGroupAdService
    // =================================================================
    // ADD
    $operation = $adGroupAdServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId);
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $adGroupAdServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $adGroupAdValues);
    $adGroupAdValues = $adGroupAdServiceSample->get($selector);

    // =================================================================
    // remove AsGroupAdService, AsGroupCriterionService, AsGroupService,
    // CampaignCriterionService, CampaignTarget, BiddingStrategy, Campaign
    // =================================================================
    // AdGroupAdService
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'REMOVE');

    // AdGroupCriterion
    $operation = $adGroupCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'REMOVE');

    // AdGroup
    $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
    $adGroupServiceSample->mutate($operation, 'REMOVE');

    // CampaignCriterion
    $operation = $campaignCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $campaignCriterionValues);
    $campaignCriterionValues = $campaignCriterionServiceSample->mutate($operation, 'REMOVE');

    // CampaignTarget
    $operation = $campaignTargetServiceSample->createSampleRemoveRequest($accountId, $campaignTargetValues);
    $campaignTargetServiceSample->mutate($operation, 'REMOVE');

    // Campaign
    $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
    $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');

    // BiddingStrategy
    $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);
    $biddingStrategyServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
