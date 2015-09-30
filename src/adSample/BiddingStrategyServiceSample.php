<?php
/**
 * Sample Program for BiddingStrategyService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BiddingStrategyService ADD.
 *
 * @param string $accountId Account ID
 * @return array BiddingStrategyValues entity
 * @throws Exception
 */
function addBiddingStrategy($accountId)
{
    // Set Operand
    $operand = array(
        // Set EnhancedCpcBidding
        array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleEnhancedCpc_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'ENHANCED_CPC',
            ),
        ),
        // Set PageOnePromotedBidding
        array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SamplePageOnePromoted_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'PAGE_ONE_PROMOTED',
                'bidCeiling' => 500,
                'bidMultiplier' => 1.00,
                'bidChangesForRaisesOnly' => 'ACTIVE',
                'raiseBidWhenBudgetConstrained' => 'ACTIVE',
                'raiseBidWhenLowQualityScore' => 'ACTIVE',
            ),
        ),
        // Set TargetCpaBidding
        array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetCpa_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_CPA',
                'targetCpa' => 500,
                'bidCeiling' => 700,
            ),
        ),
        // Set TargetSpendBidding
        array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetSpend_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_SPEND',
                'bidCeiling' => 700,
            ),
        ),
        // Set TargetRoasBidding
        array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetRoas_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_ROAS',
                'targetRoas' => 10.00,
                'bidCeiling' => 700,
                'bidFloor' => 600,
            ),
        ),
    );

    //xsi:type for biddingStrategy
    $operand[0]['biddingScheme'] =
        new SoapVar($operand[0]['biddingScheme'], SOAP_ENC_OBJECT, 'EnhancedCpcBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
    $operand[1]['biddingScheme'] =
        new SoapVar($operand[1]['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
    $operand[2]['biddingScheme'] =
        new SoapVar($operand[2]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetCpaBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
    $operand[3]['biddingScheme'] =
        new SoapVar($operand[3]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetSpendBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
    $operand[4]['biddingScheme'] =
        new SoapVar($operand[4]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetRoasBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);


    // Set Request
    $biddingStrategyRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $biddingStrategyService = SoapUtils::getService('BiddingStrategyService');
    $biddingStrategyResponse = $biddingStrategyService->invoke('mutate', $biddingStrategyRequest);

    // Response
    if (isset($biddingStrategyResponse->rval->values)) {
        if (is_array($biddingStrategyResponse->rval->values)) {
            $biddingStrategyReturnValues = $biddingStrategyResponse->rval->values;
        } else {
            $biddingStrategyReturnValues = array($biddingStrategyResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add BiddingStrategyService.");
    }

    // Error
    foreach ($biddingStrategyReturnValues as $biddingStrategyReturnValue) {
        if (!isset($biddingStrategyReturnValue->biddingStrategy)) {
            throw new Exception("Fail to add BiddingStrategyService.");
        }
    }

    return $biddingStrategyReturnValues;
}

/**
 * Sample Program for BiddingStrategyService Set.
 *
 * @param string $accountId Account ID
 * @param array $biddingStrategyValues BiddingStrategyValues entity for set.
 * @return array BiddingStrategyValues entity
 * @throws Exception
 */
function setBiddingStrategy($accountId, $biddingStrategyValues)
{
    // Set Operand
    $operand = array();
    foreach ($biddingStrategyValues as $biddingStrategyValue) {

        $biddingStrategy = array();

        // Set BiddingScheme
        if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'ENHANCED_CPC') {
            // Set EnhancedCpcBidding
            $biddingStrategy = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
                'biddingStrategyName' => 'SampleEnhancedCpc_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'ENHANCED_CPC',
                ),
            );
            //xsi:type for biddingStrategy
            $biddingStrategy['biddingScheme'] =
                new SoapVar($biddingStrategy['biddingScheme'], SOAP_ENC_OBJECT, 'EnhancedCpcBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);

        } else if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'PAGE_ONE_PROMOTED') {
            // Set PageOnePromotedBidding
            $biddingStrategy = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
                'biddingStrategyName' => 'SamplePageOnePromoted_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'PAGE_ONE_PROMOTED',
                    'bidCeiling' => 550,
                    'bidMultiplier' => 5.00,
                    'bidChangesForRaisesOnly' => 'DEACTIVE',
                    'raiseBidWhenBudgetConstrained' => 'DEACTIVE',
                    'raiseBidWhenLowQualityScore' => 'DEACTIVE',
                ),
            );
            //xsi:type for biddingStrategy
            $biddingStrategy['biddingScheme'] =
                new SoapVar($biddingStrategy['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);

        } else if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'TARGET_CPA') {
            // Set TargetCpaBidding
            $biddingStrategy = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
                'biddingStrategyName' => 'SampleTargetCpa_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_CPA',
                    'targetCpa' => 550,
                    'bidCeiling' => 750,
                ),
            );
            //xsi:type for biddingStrategy
            $biddingStrategy['biddingScheme'] =
                new SoapVar($biddingStrategy['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);

        } else if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'TARGET_SPEND') {
            // Set TargetSpendBidding
            $biddingStrategy = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
                'biddingStrategyName' => 'SampleTargetSpend_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_SPEND',
                    'bidCeiling' => 750,
                ),
            );
            //xsi:type for biddingStrategy
            $biddingStrategy['biddingScheme'] =
                new SoapVar($biddingStrategy['biddingScheme'], SOAP_ENC_OBJECT, 'TargetSpendBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);

        } else if ($biddingStrategyValue->biddingStrategy->biddingStrategyType === 'TARGET_ROAS') {
            // Set TargetRoasBidding
            $biddingStrategy = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
                'biddingStrategyName' => 'SampleTargetRoas_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_ROAS',
                    'targetRoas' => 15.00,
                    'bidCeiling' => 750,
                    'bidFloor' => 650,),
            );
            //xsi:type for biddingStrategy
            $biddingStrategy['biddingScheme'] =
                new SoapVar($biddingStrategy['biddingScheme'], SOAP_ENC_OBJECT, 'TargetRoasBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
        }

        $operand[] = $biddingStrategy;
    }

    // Set Request
    $biddingStrategyRequest = array(
        'operations' => array(
            'operator' => 'SET',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $biddingStrategyService = SoapUtils::getService('BiddingStrategyService');
    $biddingStrategyResponse = $biddingStrategyService->invoke('mutate', $biddingStrategyRequest);

    // Response
    if (isset($biddingStrategyResponse->rval->values)) {
        if (is_array($biddingStrategyResponse->rval->values)) {
            $biddingStrategyReturnValues = $biddingStrategyResponse->rval->values;
        } else {
            $biddingStrategyReturnValues = array($biddingStrategyResponse->rval->values);
        }
    } else {
        throw new Exception("No response of set BiddingStrategyService.");
    }

    // Error
    foreach ($biddingStrategyReturnValues as $biddingStrategyReturnValue) {
        if (!isset($biddingStrategyReturnValue->biddingStrategy)) {
            throw new Exception("Fail to set BiddingStrategyService.");
        }
    }

    return $biddingStrategyReturnValues;
}

/**
 * Sample Program for BiddingStrategyService Remove.
 *
 * @param string $accountId Account ID
 * @param array $biddingStrategyValues BiddingStrategyValues entity for remove.
 * @return array BiddingStrategyValues entity
 * @throws Exception
 */
function removeBiddingStrategy($accountId, $biddingStrategyValues)
{
    // Set Operand
    $operand = array();
    foreach ($biddingStrategyValues as $biddingStrategyValue) {
        $operand[] = array(
            'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
            'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId,
        );
    }

    // Set Request
    $biddingStrategyRequest = array(
        'operations' => array(
            'operator' => 'REMOVE',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $biddingStrategyService = SoapUtils::getService('BiddingStrategyService');
    $biddingStrategyResponse = $biddingStrategyService->invoke('mutate', $biddingStrategyRequest);

    // Response
    if (isset($biddingStrategyResponse->rval->values)) {
        if (is_array($biddingStrategyResponse->rval->values)) {
            $biddingStrategyReturnValues = $biddingStrategyResponse->rval->values;
        } else {
            $biddingStrategyReturnValues = array($biddingStrategyResponse->rval->values);
        }
    } else {
        throw new Exception("No response of remove BiddingStrategyService.");
    }

    // Error
    foreach ($biddingStrategyReturnValues as $biddingStrategyReturnValue) {
        if (!isset($biddingStrategyReturnValue->biddingStrategy)) {
            throw new Exception("Fail to remove BiddingStrategyService.");
        }
    }

    return $biddingStrategyReturnValues;
}

/**
 * Sample Program for BiddingStrategyService Get.
 *
 * @param string $accountId Account ID
 * @param array $biddingStrategyValues BiddingStrategyValues entity for get.
 * @return array BiddingStrategyValues entity
 * @throws Exception
 */
function getBiddingStrategy($accountId, $biddingStrategyValues)
{
    // Set biddingStrategyIds
    $biddingStrategyIds = array();
    foreach ($biddingStrategyValues as $biddingStrategyValue) {
        $biddingStrategyIds[] = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
    }

    // Set Selector
    $biddingStrategyRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'biddingStrategyIds' => $biddingStrategyIds,
            'biddingStrategyTypes' => array(
                'ENHANCED_CPC',
                'PAGE_ONE_PROMOTED',
                'TARGET_CPA',
                'TARGET_SPEND',
                'TARGET_ROAS',
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $biddingStrategyService = SoapUtils::getService('BiddingStrategyService');
    $biddingStrategyResponse = $biddingStrategyService->invoke('get', $biddingStrategyRequest);

    // Response
    if (isset($biddingStrategyResponse->rval->values)) {
        if (is_array($biddingStrategyResponse->rval->values)) {
            $biddingStrategyReturnValues = $biddingStrategyResponse->rval->values;
        } else {
            $biddingStrategyReturnValues = array($biddingStrategyResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get BiddingStrategyService.");
    }

    // Error
    foreach ($biddingStrategyReturnValues as $biddingStrategyReturnValue) {
        if (!isset($biddingStrategyReturnValue->biddingStrategy)) {
            throw new Exception("Fail to get BiddingStrategyService.");
        }
    }

    return $biddingStrategyReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// BiddingStrategyServiceSample
try {
    $accountId = SoapUtils::getAccountId();

    // BiddingStrategyService ADD
    $biddingStrategyValues = addBiddingStrategy($accountId);

    // BiddingStrategyService GET
    getBiddingStrategy($accountId, $biddingStrategyValues);

    // BiddingStrategyService SET
    setBiddingStrategy($accountId, $biddingStrategyValues);

    // BiddingStrategyService REMOVE
    removeBiddingStrategy($accountId, $biddingStrategyValues);

} catch (Exception $e) {
    printf($e->getMessage() ."\n");
}

