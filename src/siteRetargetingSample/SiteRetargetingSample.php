<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adSample/BiddingStrategyServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/RetargetingListServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignRetargetingListServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupRetargetingListServiceSample.php');

/**
 * Sample Program for SiteRetargetingSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute SiteRetargetingSample.
 */
try {
    $biddingStrategyServiceSample = new BiddingStrategyServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $retargetingListServiceSample = new RetargetingListServiceSample();

    $campaignRetargetingListServiceSample = new CampaignRetargetingListServiceSample();
    $adGroupRetargetingListServiceSample = new AdGroupRetargetingListServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = 0;
    $campaignId = 0;
    $appCampaignId = 0;
    $adGroupId = 0;
    $appAdGroupId = 0;
    $targetListId = 0;

    // =================================================================
    // BiddingStrategyService, CampaignService, AdGroupService
    // =================================================================
    // BiddingStrategyService ADD
    $operation = $biddingStrategyServiceSample->createSampleAddRequest($accountId);
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'ADD');

    // BiddingStrategyService GET
    $selector = $biddingStrategyServiceSample->createSampleGetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyValues = $biddingStrategyServiceSample->get($selector);

    // BiddingStrategyService SET
    $operation = $biddingStrategyServiceSample->createSampleSetRequest($accountId, $biddingStrategyValues);
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'SET');

    // Get BiddingStrategyType for PAGE_ONE_PROMOTED
    foreach ($biddingStrategyValues as $biddingStrategyValue) {
        if ($biddingStrategyId === 0) {
            switch ($biddingStrategyValue->biddingStrategy->biddingStrategyType) {
                default :
                    break;
                case 'PAGE_ONE_PROMOTED' :
                    $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
                    break 2;
            }
        }
    }

    // CampaignService ADD
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);
    $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');

    // CampaignService GET
    $selector = $campaignServiceSample->createSampleGetRequest($accountId, $campaignValues);
    $campaignValues = $campaignServiceSample->get($selector);

    // CampaignService SET
    $operation = $campaignServiceSample->createSampleSetRequest($accountId, $biddingStrategyId, $campaignValues);
    $campaignValues = $campaignServiceSample->mutate($operation, 'SET');
    foreach ($campaignValues as $campaignValue) {
        if (($campaignId === 0 || $appCampaignId === 0) && $campaignValue->campaign->biddingStrategyConfiguration->biddingStrategyType === 'PAGE_ONE_PROMOTED') {
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

    // AdGroupService ADD
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // AdGroupService GET
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);
    $adGroupValues = $adGroupServiceSample->get($selector);

    // AdGroupService SET
    $operation = $adGroupServiceSample->createSampleSetRequest($accountId, $adGroupValues);
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'SET');
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
    // RetargetingListService
    // =================================================================
    // ADD(DefaultTargetList)
    $operation = $retargetingListServiceSample->createSampleAddDefaultTargetListRequest($accountId);
    $retargetingListValues = $retargetingListServiceSample->mutate($operation, 'ADD');

    // ADD(RuleBaseTargetList)
    $operation = $retargetingListServiceSample->createSampleAddRuleBaseTargetListRequest($accountId);
    $retargetingListValues = array_merge($retargetingListValues, $retargetingListServiceSample->mutate($operation, 'ADD'));

    // ADD(logicalTargetList)
    $operation = $retargetingListServiceSample->createSampleAddLogicalTargetListRequest($accountId, $retargetingListValues);
    $retargetingListValues = array_merge($retargetingListValues, $retargetingListServiceSample->mutate($operation, 'ADD'));

    // GET
    $selector = $retargetingListServiceSample->createSampleGetRequest($accountId, $retargetingListValues);
    $retargetingListValues = $retargetingListServiceSample->get($selector);

    // SET
    $operation = $retargetingListServiceSample->createSampleSetRequest($accountId, $retargetingListValues);
    $retargetingListValues = $retargetingListServiceSample->mutate($operation, 'SET');
    foreach ($retargetingListValues as $retargetingListKey => $retargetingListValue) {
        if (isset($retargetingListValue->targetList) && $targetListId === 0) {
            $targetListId = $retargetingListValue->targetList->targetListId;
            break;
        }
    }

    // =================================================================
    // CampaignRetargetingListService
    // =================================================================
    // ADD
    $operation = $campaignRetargetingListServiceSample->createSampleAddRequest($accountId, $campaignId, $targetListId);
    $campaignRetargetingListServiceSample->mutate($operation, 'ADD');

    // GET
    $selector = $campaignRetargetingListServiceSample->createSampleGetRequest($accountId, $campaignId, $targetListId);
    $campaignRetargetingListValues = $campaignRetargetingListServiceSample->get($selector);

    // =================================================================
    // AdGroupRetargetingListService
    // =================================================================
    // ADD
    $operation = $adGroupRetargetingListServiceSample->createSampleAddRequest($accountId, $campaignId, $adGroupId, $targetListId);
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'ADD');

    // SET
    $operation = $adGroupRetargetingListServiceSample->createSampleSetRequest($accountId, $adGroupRetargetingListValues);
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'SET');

    // GET
    $selector = $adGroupRetargetingListServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId, $targetListId);
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->get($selector);

    // =================================================================
    // remove AdGroupService, CampaignService, BiddingStrategyService, CampaignRetargetingListService
    // =================================================================
    // AdGroupRetargetingListService
    $operation = $adGroupRetargetingListServiceSample->createSampleRemoveRequest($accountId, $adGroupRetargetingListValues);
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'REMOVE');

    // CampaignRetargetingListService
    $operation = $campaignRetargetingListServiceSample->createSampleRemoveRequest($accountId, $campaignId, $targetListId);
    $campaignRetargetingListServiceSample->mutate($operation, 'REMOVE');

    // AdGroup
    $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
    $adGroupServiceSample->mutate($operation, 'REMOVE');

    // Campaign
    $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
    $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');

    // BiddingStrategy
    $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);
    $biddingStrategyServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
