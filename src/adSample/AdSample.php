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
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $appAdGroupId = SoapUtils::getAppAdGroupId();

    // =================================================================
    // BiddingStrategy
    // =================================================================
    // ADD
    $biddingStrategyValues = array();
    if ($biddingStrategyId === 'xxxxxxxx') {
        $biddingStrategyAddRequest = $biddingStrategyServiceSample->createMutateRequest('ADD', $accountId);
        array_push($biddingStrategyAddRequest['operations']['operand'], $biddingStrategyServiceSample->createTargetSpendBidding($accountId));
        $biddingStrategyValues = $biddingStrategyServiceSample->mutate($biddingStrategyAddRequest, 'ADD');
        foreach ($biddingStrategyValues as $biddingStrategyValue) {
            $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
        }

        // sleep 30 second.
        sleep(30);
    }

    // GET
    $biddingStrategyGetRequest = $biddingStrategyServiceSample->createSampleGetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyServiceSample->get($biddingStrategyGetRequest);

    // =================================================================
    // CampaignService
    // =================================================================
    // ADD
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddAutoBiddingStandardCampaign($accountId,$biddingStrategyId));
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddAutoBiddingMobileAppCampaignForIOS($accountId,$biddingStrategyId));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
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

    // GET
    $selector = $campaignServiceSample->createSampleGetRequest($accountId, $campaignValues);
    $campaignServiceSample->get($selector);

    // =================================================================
    // CampaignTargetService
    // =================================================================
    // ADD
    $operation = $campaignTargetServiceSample->createSampleAddRequest($accountId, $campaignId);
    $campaignTargetValues = $campaignTargetServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignTargetServiceSample->createSampleGetRequest($accountId, $campaignTargetValues);
    $campaignTargetServiceSample->get($selector);

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
    $campaignCriterionServiceSample->get($selector);

    // =================================================================
    // AdGroupService
    // =================================================================
    // ADD
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);
    $adGroupServiceSample->get($selector);

    foreach ($adGroupValues as $adGroupValue) {
        if ($adGroupId === 'xxxxxxxx' || $appAdGroupId === 'xxxxxxxx') {
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
    $adGroupCriterionServiceSample->get($selector);

    // =================================================================
    // AdGroupBidMultiplierService
    // =================================================================
    // SET
    $operation = $adGroupBidMultiplierServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId);
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->mutate($operation, 'SET');

    // GET
    $selector = $adGroupBidMultiplierServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId);
    $adGroupBidMultiplierServiceSample->get($selector);

    // =================================================================
    // AdGroupAdService
    // =================================================================
    // ADD
    $adGroupAdAddRequest = $adGroupAdServiceSample->createMutateRequest('ADD',$accountId);
    array_push($adGroupAdAddRequest['operations']['operand'], $adGroupAdServiceSample->createAddExtendedTextAd($accountId,$campaignId,$adGroupId));
    array_push($adGroupAdAddRequest['operations']['operand'], $adGroupAdServiceSample->createAddAppAd($accountId,$appCampaignId,$appAdGroupId));
    $adGroupAdValues = $adGroupAdServiceSample->mutate($adGroupAdAddRequest, 'ADD');

    // GET
    $selector = $adGroupAdServiceSample->createSampleGetRequest($accountId, $adGroupAdValues);
    $adGroupAdServiceSample->get($selector);

    // =================================================================
    // remove AsGroupAdService, AsGroupCriterionService, AsGroupService,
    // CampaignCriterionService, CampaignTarget, BiddingStrategy, Campaign
    // =================================================================
    // AdGroupAdService
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);
    $adGroupAdServiceSample->mutate($operation, 'REMOVE');

    // AdGroupCriterion
    $operation = $adGroupCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);
    $adGroupCriterionServiceSample->mutate($operation, 'REMOVE');

    // AdGroup
    $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
    $adGroupServiceSample->mutate($operation, 'REMOVE');

    // CampaignCriterion
    $operation = $campaignCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $campaignCriterionValues);
    $campaignCriterionServiceSample->mutate($operation, 'REMOVE');

    // CampaignTarget
    $operation = $campaignTargetServiceSample->createSampleRemoveRequest($accountId, $campaignTargetValues);
    $campaignTargetServiceSample->mutate($operation, 'REMOVE');

    // Campaign
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignServiceSample->mutate($operation, 'REMOVE');
    }

    // BiddingStrategy
    if(count($biddingStrategyValues) > 0) {
        $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);
        $biddingStrategyServiceSample->mutate($operation, 'REMOVE');
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
