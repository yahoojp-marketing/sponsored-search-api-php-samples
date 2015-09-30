<?php
/**
 * Sample Program for AdGroupCriterionServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');


/**
 * Sample Program for AdGroupCriterionService ADD.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @return array AdGroupCriterionValues entity
 * @throws Exception
 */
function addAdGroupCriterion($accountId, $campaignId, $adGroupId)
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
                'text' => 'sample text',
                'matchType' => 'PHRASE'
            ),
            'userStatus' => 'ACTIVE',
            'destinationUrl' => 'http://www.yahoo.co.jp/',
            'biddingStrategyConfiguration' => array(
                'bid' => array(
                    'maxCpc' => 100,
                ),
            ),
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
 * Sample Program for AdGroupCriterionService Set.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupCriterionValues AdGroupCriterionValues entity for set.
 * @return array AdGroupCriterionValues entity
 * @throws Exception
 */
function setAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupCriterionValues as $adGroupCriterionValue) {
        $adGroupCriterion = array(
            'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
            'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
            'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
            'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
            'criterion' => array(
                'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type,
            ),
            'userStatus' => 'PAUSED',
            'biddingStrategyConfiguration' => array(
                'bid' => array(
                    'maxCpc' => 150,
                ),
            ),
        );
        //xsi:type for criterion Keyword
        $adGroupCriterion['criterion'] =
            new SoapVar($adGroupCriterion['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
        //xsi:type for operand BiddableAdGroupCriterion
        $adGroupCriterion =
            new SoapVar($adGroupCriterion, SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

        $operand[] = $adGroupCriterion;
    }

    // Set Request
    $adGroupCriterionRequest = array(
        'operations' => array(
            'operator' => 'SET',
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
        throw new Exception("No response of set AdGroupCriterionService.");
    }

    // Error
    foreach ($adGroupCriterionReturnValues as $adGroupCriterionReturnValue) {
        if (!isset($adGroupCriterionReturnValue->adGroupCriterion)) {
            throw new Exception("Fail to set AdGroupCriterionService.");
        }
    }

    return $adGroupCriterionReturnValues;
}

/**
 * Sample Program for AdGroupCriterionService Remove.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupCriterionValues AdGroupCriterionValues entity for remove.
 * @return array AdGroupCriterionValues entity
 * @throws Exception
 */
function removeAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupCriterionValues as $adGroupCriterionValue) {
        $operand[] = array(
            'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
            'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
            'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
            'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
            'criterion' => array(
                'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type,
            ),
        );
    }

    //xsi:type for criterion Keyword
    $operand[0]['criterion'] =
        new SoapVar($operand[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
    //xsi:type for operand BiddableAdGroupCriterion
    $operand[0] =
        new SoapVar($operand[0], SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

    // Set Request
    $adGroupCriterionRequest = array(
        'operations' => array(
            'operator' => 'REMOVE',
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
        throw new Exception("No response of remove AdGroupCriterionService.");
    }

    // Error
    foreach ($adGroupCriterionReturnValues as $adGroupCriterionReturnValue) {
        if (!isset($adGroupCriterionReturnValue->adGroupCriterion)) {
            throw new Exception("Fail to remove AdGroupCriterionService.");
        }
    }

    return $adGroupCriterionReturnValues;
}

/**
 * Sample Program for AdGroupCriterionService Get.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupCriterionValues AdGroupCriterionValues entity for get.
 * @return array AdGroupCriterionValues entity
 * @throws Exception
 */
function getAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
{
    // Set criterionIds
    $criterionIds = array();
    foreach ($adGroupCriterionValues as $adGroupCriterionValue) {
        $criterionIds[] = $adGroupCriterionValue->adGroupCriterion->criterion->criterionId;
    }

    // Set Selector
    $adGroupCriterionRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => array($campaignId),
            'adGroupIds' => array($adGroupId),
            'criterionIds' => $criterionIds,
            'userStatuses' => array(
                'ACTIVE',
                'PAUSED',
            ),
            'criterionUse' => 'BIDDABLE',
            'approvalStatuses' => array(
                'APPROVED',
                'APPROVED_WITH_REVIEW',
                'REVIEW',
                'PRE_DISAPPROVED',
                'POST_DISAPPROVED'
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $adGroupCriterionService = SoapUtils::getService('AdGroupCriterionService');
    $adGroupCriterionResponse = $adGroupCriterionService->invoke('get', $adGroupCriterionRequest);

    // Response
    if (isset($adGroupCriterionResponse->rval->values)) {
        if (is_array($adGroupCriterionResponse->rval->values)) {
            $adGroupCriterionReturnValues = $adGroupCriterionResponse->rval->values;
        } else {
            $adGroupCriterionReturnValues = array($adGroupCriterionResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get AdGroupCriterionService.");
    }

    // Error
    foreach ($adGroupCriterionReturnValues as $adGroupCriterionReturnValue) {
        if (!isset($adGroupCriterionReturnValue->adGroupCriterion)) {
            throw new Exception("Fail to get AdGroupCriterionService.");
        }
    }

    return $adGroupCriterionReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// AdGroupCriterionServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // AdGroupCriterionServiceSample ADD
    $adGroupCriterionValues = addAdGroupCriterion($accountId, $campaignId, $adGroupId);

    // AdGroupCriterionServiceSample GET
    getAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // AdGroupCriterionServiceSample SET
    setAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // AdGroupCriterionServiceSample REMOVE
    removeAdGroupCriterion($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}

