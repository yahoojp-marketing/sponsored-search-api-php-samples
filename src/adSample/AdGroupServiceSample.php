<?php
/**
 * Sample Program for AdGroupServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupService ADD.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $biddingStrategyId Auto bidding ID
 * @return array AdGroupValues entity
 * @throws Exception
 */
function addAdGroup($accountId, $campaignId, $biddingStrategyId)
{
    // Set Operand
    $operand = array(
        // Set AutoBidding AdGroup
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupName' => 'SampleAutoBiddingAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'biddingStrategyConfiguration' => array(
                'biddingStrategyId' => $biddingStrategyId,
                'initialBid' => array(
                    'maxCpc' => 120,
                ),
            ),
        ),
        // Set ManualCpc AdGroup
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupName' => 'SampleManualCpcAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'biddingStrategyConfiguration' => array(
                'biddingStrategyType' => 'MANUAL_CPC',
                'initialBid' => array(
                    'maxCpc' => 120,
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
 * Sample Program for AdGroupService Set.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param array $adGroupValues AdGroupValues entity for set.
 * @param string $biddingStrategyId Auto bidding ID
 * @return array AdGroupValues entity
 * @throws Exception
 */
function setAdGroup($accountId, $campaignId, $adGroupValues, $biddingStrategyId)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupValues as $adGroupValue) {

        $operand[] = array(
            'accountId' => $adGroupValue->adGroup->accountId,
            'campaignId' => $adGroupValue->adGroup->campaignId,
            'adGroupId' => $adGroupValue->adGroup->adGroupId,
            'adGroupName' => 'Sample_UpdateOn_' . $adGroupValue->adGroup->adGroupId . '_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'PAUSED',
            // Change Auto Bidding Strategy
            'biddingStrategyConfiguration' => array(
                'biddingStrategyId' => $biddingStrategyId,
                'initialBid' => array(
                    'maxCpc' => 200,
                ),
            ),
        );
    }

    // Set Request
    $adGroupRequest = array(
        'operations' => array(
            'operator' => 'SET',
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
        throw new Exception("No response of set AdGroupService.");
    }

    // Error
    foreach ($adGroupReturnValues as $adGroupReturnValue) {
        if (!isset($adGroupReturnValue->adGroup)) {
            throw new Exception("Fail to set AdGroupService.");
        }
    }

    return $adGroupReturnValues;
}

/**
 * Sample Program for AdGroupService Remove.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param array $adGroupValues AdGroupValues entity for remove.
 * @return array AdGroupValues entity
 * @throws Exception
 */
function removeAdGroup($accountId, $campaignId, $adGroupValues)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupValues as $adGroupValue) {
        $operand[] = array(
            'accountId' => $adGroupValue->adGroup->accountId,
            'campaignId' => $adGroupValue->adGroup->campaignId,
            'adGroupId' => $adGroupValue->adGroup->adGroupId,
        );
    }

    // Set Request
    $adGroupRequest = array(
        'operations' => array(
            'operator' => 'REMOVE',
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
        throw new Exception("No response of remove AdGroupService.");
    }

    // Error
    foreach ($adGroupReturnValues as $adGroupReturnValue) {
        if (!isset($adGroupReturnValue->adGroup)) {
            throw new Exception("Fail to remove AdGroupService.");
        }
    }

    return $adGroupReturnValues;
}

/**
 * Sample Program for AdGroupService Get.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param array $adGroupValues AdGroupValues entity for get.
 * @return array AdGroupValues entity
 * @throws Exception
 */
function getAdGroup($accountId, $campaignId, $adGroupValues)
{
    // Set adGroupIds
    $adGroupIds = array();
    foreach ($adGroupValues as $adGroupValue) {
        $adGroupIds[] = $adGroupValue->adGroup->adGroupId;
    }

    // Set Selector
    $adGroupRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => array($campaignId),
            'adGroupIds' => $adGroupIds,
            'userStatuses' => array(
                'ACTIVE',
                'PAUSED',
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $adGroupService = SoapUtils::getService('AdGroupService');
    $adGroupResponse = $adGroupService->invoke('get', $adGroupRequest);

    // Response
    if (isset($adGroupResponse->rval->values)) {
        if (is_array($adGroupResponse->rval->values)) {
            $adGroupReturnValues = $adGroupResponse->rval->values;
        } else {
            $adGroupReturnValues = array($adGroupResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get AdGroupService.");
    }

    // Error
    foreach ($adGroupReturnValues as $adGroupReturnValue) {
        if (!isset($adGroupReturnValue->adGroup)) {
            throw new Exception("Fail to get AdGroupService.");
        }
    }

    return $adGroupReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// AdGroupServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();

    // AdGroupServiceSample ADD
    $adGroupValues = addAdGroup($accountId, $campaignId, $biddingStrategyId);

    // AdGroupServiceSample GET
    getAdGroup($accountId, $campaignId, $adGroupValues);

    // AdGroupServiceSample SET
    setAdGroup($accountId, $campaignId, $adGroupValues, $biddingStrategyId);

    // AdGroupServiceSample REMOVE
    removeAdGroup($accountId, $campaignId, $adGroupValues);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}

