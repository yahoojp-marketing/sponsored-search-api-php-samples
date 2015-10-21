<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once (dirname(__FILE__) . '/BiddingStrategyServiceSample.php');
require_once (dirname(__FILE__) . '/CampaignServiceSample.php');
require_once (dirname(__FILE__) . '/CampaignTargetServiceSample.php');
require_once (dirname(__FILE__) . '/CampaignCriterionServiceSample.php');
require_once (dirname(__FILE__) . '/AdGroupServiceSample.php');
require_once (dirname(__FILE__) . '/AdGroupCriterionServiceSample.php');
require_once (dirname(__FILE__) . '/AdGroupBidMultiplierServiceSample.php');
require_once (dirname(__FILE__) . '/AdGroupAdServiceSample.php');

/**
 * Sample Program for AdSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
try{
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

    // GET
    $selector = $biddingStrategyServiceSample->createSampleGetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyValues = $biddingStrategyServiceSample->get($selector);

    // SET
    $operation = $biddingStrategyServiceSample->createSampleSetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'SET');

    // Get BiddingStrategyType for PAGE_ONE_PROMOTED
    foreach($biddingStrategyValues as $biddingStrategyValue){
        if($biddingStrategyId === 0){
            switch($biddingStrategyValue->biddingStrategy->biddingStrategyType){
                default :
                    break;
                case 'PAGE_ONE_PROMOTED' :
                    $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
                    break 2;
            }
        }
    }

    // =================================================================
    // CampaignService
    // =================================================================
    // ADD
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);
    $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignServiceSample->createSampleGetRequest($accountId, $campaignValues);
    $campaignValues = $campaignServiceSample->get($selector);

    // SET
    $operation = $campaignServiceSample->createSampleSetRequest($accountId, $biddingStrategyId, $campaignValues);
    $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    foreach($campaignValues as $campaignValue){
        if(($campaignId === 0 || $appCampaignId === 0) && $campaignValue->campaign->biddingStrategyConfiguration->biddingStrategyType === 'PAGE_ONE_PROMOTED'){
            switch($campaignValue->campaign->campaignType){
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

    // SET
    $operation = $campaignTargetServiceSample->createSampleSetRequest($accountId, $campaignTargetValues);
    $campaignTargetValues = $campaignTargetServiceSample->mutate($operation, 'SET');

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
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $biddingStrategyId, $campaignId, $appCampaignId);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);
    $adGroupValues = $adGroupServiceSample->get($selector);

    // SET
    $operation = $adGroupServiceSample->createSampleSetRequest($accountId, $biddingStrategyId, $adGroupValues);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'SET');
    foreach($adGroupValues as $adGroupValue){
        if($adGroupId === 0 || $appAdGroupId === 0){
            if($adGroupValue->adGroup->campaignId === $campaignId){
                $adGroupId = $adGroupValue->adGroup->adGroupId;
            }elseif($adGroupValue->adGroup->campaignId === $appCampaignId){
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

    // SET
    $operation = $adGroupCriterionServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'SET');

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

    // SET
    $operation = $adGroupAdServiceSample->createSampleSetRequest($accountId, $adGroupAdValues);
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'SET');

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

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
