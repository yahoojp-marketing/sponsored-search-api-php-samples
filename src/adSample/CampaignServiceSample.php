<?php
/**
 * Sample Program for CampaignServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignService ADD.
 *
 * @param string $accountId Account ID
 * @param string $biddingStrategyId Auto bidding ID
 * @return array CampaignValues entity
 * @throws Exception
 */
function addCampaign($accountId, $biddingStrategyId)
{
    // Set Operand
    $operand = array(
        // Set AutoBidding Campaign
        array(
            'accountId' => $accountId,
            'campaignName' => 'SampleAutoBiddingCampaign_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'startDate' => '20300101',
            'endDate' => '20301231',
            'budget' => array(
                'period' => 'DAILY',
                'amount' => 1000,
                'deliveryMethod' => 'STANDARD',
            ),
            'biddingStrategyConfiguration' => array(
                'biddingStrategyId' => $biddingStrategyId,
            ),
            'adServingOptimizationStatus' => 'ROTATE_INDEFINITELY',
            'settings' => array(
                array(
                    'type' => 'GEO_TARGET_TYPE_SETTING',
                    'positiveGeoTargetType' => 'AREA_OF_INTENT'
                ),
            ),
        ),
        // Set ManualCpc Campaign
        array(
            'accountId' => $accountId,
            'campaignName' => 'SampleManualCpcCampaign_CreateOn_' . SoapUtils::getCurrentTimestamp(),
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
                    'positiveGeoTargetType' => 'AREA_OF_INTENT'
                ),
            ),
        ),
    );

    //xsi:type for settings
    $operand[0]['settings'][0] =
        new SoapVar($operand[0]['settings'][0],
            SOAP_ENC_OBJECT, 'GeoTargetTypeSetting', API_NS, 'settings', XMLSCHEMANS);
    $operand[1]['settings'][0] =
        new SoapVar($operand[1]['settings'][0],
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
 * Sample Program for CampaignService Set.
 *
 * @param string $accountId Account ID
 * @param array $campaignValues CampaignValues entity for set.
 * @param string $biddingStrategyId Auto bidding ID
 * @return array CampaignValues entity
 * @throws Exception
 */
function setCampaign($accountId, $campaignValues, $biddingStrategyId)
{
    // Set Operand
    $operand = array();
    foreach ($campaignValues as $campaignValue) {
        $operand[] = array(
            'accountId' => $campaignValue->campaign->accountId,
            'campaignId' => $campaignValue->campaign->campaignId,
            'campaignName' => 'Sample_UpdateOn_' . $campaignValue->campaign->campaignId . '_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'PAUSED',
            'startDate' => '20300101',
            'endDate' => '20301231',
            'budget' => array(
                'amount' => 2000,
                'deliveryMethod' => 'STANDARD',
            ),
            // Change Auto Bidding Strategy
            'biddingStrategyConfiguration' => array(
                'biddingStrategyId' => $biddingStrategyId,
            ),
        );
    }

    // Set Request
    $campaignRequest = array(
        'operations' => array(
            'operator' => 'SET',
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
        throw new Exception("No response of set CampaignService.");
    }

    // Error
    foreach ($campaignReturnValues as $campaignReturnValue) {
        if (!isset($campaignReturnValue->campaign)) {
            throw new Exception("Fail to set CampaignService.");
        }
    }

    return $campaignReturnValues;
}

/**
 * Sample Program for CampaignService Remove.
 *
 * @param string $accountId Account ID
 * @param array $campaignValues CampaignValues entity for remove.
 * @return array CampaignValues entity
 * @throws Exception
 */
function removeCampaign($accountId, $campaignValues)
{
    // Set Operand
    $operand = array();
    foreach ($campaignValues as $campaignValue) {
        $operand[] = array(
            'accountId' => $campaignValue->campaign->accountId,
            'campaignId' => $campaignValue->campaign->campaignId,
        );
    }

    // Set Request
    $campaignRequest = array(
        'operations' => array(
            'operator' => 'REMOVE',
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
        throw new Exception("No response of remove CampaignService.");
    }

    // Error
    foreach ($campaignReturnValues as $campaignReturnValue) {
        if (!isset($campaignReturnValue->campaign)) {
            throw new Exception("Fail to remove CampaignService.");
        }
    }

    return $campaignReturnValues;
}

/**
 * Sample Program for CampaignService Get.
 *
 * @param string $accountId Account ID
 * @param array $campaignValues CampaignValues entity for get.
 * @return array CampaignValues entity
 * @throws Exception
 */
function getCampaign($accountId, $campaignValues)
{
    // Set campaignIds
    $campaignIds = array();
    foreach ($campaignValues as $campaignValue) {
        $campaignIds[] = $campaignValue->campaign->campaignId;
    }

    // Set Selector
    $campaignRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => $campaignIds,
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
    $campaignService = SoapUtils::getService('CampaignService');
    $campaignResponse = $campaignService->invoke('get', $campaignRequest);

    // Response
    if (isset($campaignResponse->rval->values)) {
        if (is_array($campaignResponse->rval->values)) {
            $campaignReturnValues = $campaignResponse->rval->values;
        } else {
            $campaignReturnValues = array($campaignResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get CampaignService.");
    }

    // Error
    foreach ($campaignReturnValues as $campaignReturnValue) {
        if (!isset($campaignReturnValue->campaign)) {
            throw new Exception("Fail to get CampaignService.");
        }
    }

    return $campaignReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// CampaignServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();

    // CampaignServiceSample ADD
    $campaignValues = addCampaign($accountId, $biddingStrategyId);

    // CampaignServiceSample GET
    getCampaign($accountId, $campaignValues);

    // CampaignServiceSample SET
    setCampaign($accountId, $campaignValues, $biddingStrategyId);

    // CampaignServiceSample REMOVE
    removeCampaign($accountId, $campaignValues);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}

