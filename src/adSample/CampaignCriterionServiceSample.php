<?php
/**
 * Sample Program for CampaignCriterionServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignCriterionService ADD.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @return array CampaignCriterionValues entity
 * @throws Exception
 */
function addCampaignCriterion($accountId, $campaignId)
{
    // Set Operand
    $operand = array(
        // Set ScheduleTarget
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'criterionUse' => 'NEGATIVE',
            'criterion' => array(
                'type' => 'KEYWORD',
                'text' => 'sample text',
                'matchType' => 'PHRASE'
            )
        ),
    );

    //xsi:type for criterion of Keyword
    $operand[0]['criterion'] =
        new SoapVar($operand[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
    //xsi:type for operand of NegativeCampaignCriterion
    $operand[0] =
        new SoapVar($operand[0], SOAP_ENC_OBJECT, 'NegativeCampaignCriterion', API_NS, 'operand', XMLSCHEMANS);

    // Set Request
    $campaignCriterionRequest= array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'criterionUse' => 'NEGATIVE',
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignCriterionService = SoapUtils::getService('CampaignCriterionService');
    $campaignCriterionResponse = $campaignCriterionService->invoke('mutate', $campaignCriterionRequest);

    // Response
    if (isset($campaignCriterionResponse->rval->values)) {
        if (is_array($campaignCriterionResponse->rval->values)) {
            $campaignCriterionReturnValues = $campaignCriterionResponse->rval->values;
        } else {
            $campaignCriterionReturnValues = array($campaignCriterionResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add CampaignCriterionService.");
    }

    // Error
    foreach ($campaignCriterionReturnValues as $campaignCriterionReturnValue) {
        if (!isset($campaignCriterionReturnValue->campaignCriterion)) {
            throw new Exception("Fail to add CampaignCriterionService.");
        }
    }

    return $campaignCriterionReturnValues;
}

/**
 * Sample Program for CampaignCriterionService Remove.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param array $campaignCriterionValues CampaignCriterionValues entity for remove.
 * @return array CampaignCriterionValues entity
 * @throws Exception
 */
function removeCampaignCriterion($accountId, $campaignId, $campaignCriterionValues)
{
    // Set Operand
    $operand = array();
    foreach ($campaignCriterionValues as $campaignCriterionValue) {
        $operand[] = array(
            'accountId' => $campaignCriterionValue->campaignCriterion->accountId,
            'campaignId' => $campaignCriterionValue->campaignCriterion->campaignId,
            'criterionUse' => $campaignCriterionValue->campaignCriterion->criterionUse,
            'criterion' => array(
                'criterionId' => $campaignCriterionValue->campaignCriterion->criterion->criterionId,
                'type' => $campaignCriterionValue->campaignCriterion->criterion->type,
            )
        );
    }

    // Set Request
    $campaignCriterionRequest= array(
        'operations' => array(
            'operator' => 'REMOVE',
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'criterionUse' => 'NEGATIVE',
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignCriterionService = SoapUtils::getService('CampaignCriterionService');
    $campaignCriterionResponse = $campaignCriterionService->invoke('mutate', $campaignCriterionRequest);

    // Response
    if (isset($campaignCriterionResponse->rval->values)) {
        if (is_array($campaignCriterionResponse->rval->values)) {
            $campaignCriterionReturnValues = $campaignCriterionResponse->rval->values;
        } else {
            $campaignCriterionReturnValues = array($campaignCriterionResponse->rval->values);
        }
    } else {
        throw new Exception("No response of remove CampaignCriterionService.");
    }

    // Error
    foreach ($campaignCriterionReturnValues as $campaignCriterionReturnValue) {
        if (!isset($campaignCriterionReturnValue->campaignCriterion)) {
            throw new Exception("Fail to remove CampaignCriterionService.");
        }
    }

    return $campaignCriterionValues;
}

/**
 * Sample Program for CampaignCriterionService Get.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param array $campaignCriterionValues CampaignCriterionValues entity for get.
 * @return array CampaignCriterionValues entity
 * @throws Exception
 */
function getCampaignCriterion($accountId, $campaignId, $campaignCriterionValues)
{
    // Set campaignCriterionIds
    $campaignCriterionIds = array();
    foreach ($campaignCriterionValues as $campaignCriterionValue) {
        $campaignCriterionIds[] = $campaignCriterionValue->campaignCriterion->criterion->criterionId;
    }

    // Set Selector
    $campaignCriterionRequest= array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => array($campaignId),
            'criterionIds' => $campaignCriterionIds,
            'criterionUse' => 'NEGATIVE',
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $campaignCriterionService = SoapUtils::getService('CampaignCriterionService');
    $campaignCriterionResponse = $campaignCriterionService->invoke('get', $campaignCriterionRequest);

    // Response
    if (isset($campaignCriterionResponse->rval->values)) {
        if (is_array($campaignCriterionResponse->rval->values)) {
            $campaignCriterionReturnValues = $campaignCriterionResponse->rval->values;
        } else {
            $campaignCriterionReturnValues = array($campaignCriterionResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get CampaignCriterionService.");
    }

    // Error
    foreach ($campaignCriterionReturnValues as $campaignCriterionReturnValue) {
        if (!isset($campaignCriterionReturnValue->campaignCriterion)) {
            throw new Exception("Fail to get CampaignCriterionService.");
        }
    }

    return $campaignCriterionReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// CampaignCriterionServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();

    // CampaignCriterionServiceSample ADD
    $campaignCriterionValues = addCampaignCriterion($accountId, $campaignId);

    // CampaignCriterionServiceSample GET
    getCampaignCriterion($accountId, $campaignId, $campaignCriterionValues);

    // CampaignCriterionServiceSample REMOVE
    removeCampaignCriterion($accountId, $campaignId, $campaignCriterionValues);

} catch (Exception $e) {
    printf($e->getMessage() ."\n");
}

