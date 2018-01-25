<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BiddingStrategyService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class BiddingStrategyServiceSample
{

    private $serviceName = 'BiddingStrategyService';

    /**
     * Sample Program for BiddingStrategyService MUTATE.
     *
     * @param array $operation BiddingStrategyOperation entity.
     * @param string $method Operator enum.
     * @return array BiddingStrategyReturnValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if ($returnValue->operationSucceeded != true) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for BiddingStrategyService GET.
     *
     * @param array $selector BiddingStrategySelector entity.
     * @return array BiddingStrategyReturnValue entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of get ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if ($returnValue->operationSucceeded != true) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @return BiddingStrategyOperation entity.
     */
    public function createSampleAddRequest($accountId)
    {

        // Create operands
        $operands = array(

            // Create EnhancedCpcBidding
            array(
                'accountId' => $accountId,
                'biddingStrategyName' => 'SampleEnhancedCpc_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'ENHANCED_CPC'
                )
            ),

            // Create PageOnePromotedBidding
            array(
                'accountId' => $accountId,
                'biddingStrategyName' => 'SamplePageOnePromoted_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'PAGE_ONE_PROMOTED',
                    'bidCeiling' => 500,
                    'bidMultiplier' => 1.00,
                    'bidChangesForRaisesOnly' => 'ACTIVE',
                    'raiseBidWhenBudgetConstrained' => 'ACTIVE',
                    'raiseBidWhenLowQualityScore' => 'ACTIVE'
                )
            ),

            // Create TargetCpaBidding
            array(
                'accountId' => $accountId,
                'biddingStrategyName' => 'SampleTargetCpa_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_CPA',
                    'targetCpa' => 500,
                    'bidCeiling' => 700
                )
            ),

            // Create TargetSpendBidding
            array(
                'accountId' => $accountId,
                'biddingStrategyName' => 'SampleTargetSpend_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_SPEND',
                    'bidCeiling' => 700,
                    'spendTarget' => 10
                )
            ),

            // Create TargetRoasBidding
            array(
                'accountId' => $accountId,
                'biddingStrategyName' => 'SampleTargetRoas_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'biddingScheme' => array(
                    'biddingStrategyType' => 'TARGET_ROAS',
                    'targetRoas' => 10.00,
                    'bidCeiling' => 700,
                    'bidFloor' => 600
                )
            )
        );

        // Set xsi:type
        $operands[0]['biddingScheme'] = new SoapVar($operands[0]['biddingScheme'], SOAP_ENC_OBJECT, 'EnhancedCpcBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
        $operands[1]['biddingScheme'] = new SoapVar($operands[1]['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
        $operands[2]['biddingScheme'] = new SoapVar($operands[2]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetCpaBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
        $operands[3]['biddingScheme'] = new SoapVar($operands[3]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetSpendBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
        $operands[4]['biddingScheme'] = new SoapVar($operands[4]['biddingScheme'], SOAP_ENC_OBJECT, 'TargetRoasBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return BiddingStrategyOperation entity.
     */
    public function createSampleSetRequest($accountId, $biddingStrategyValues)
    {

        // Create operands
        $operands = array();
        foreach ($biddingStrategyValues as $biddingStrategyValue) {

            // Set operand
            $operand = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId
            );

            // Set BiddingScheme
            switch ($biddingStrategyValue->biddingStrategy->biddingStrategyType) {

                // EnhancedCpcBiddingScheme
                case 'ENHANCED_CPC' :
                    $operand['biddingStrategyName'] = 'SampleEnhancedCpc_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'ENHANCED_CPC'
                    );

                    $operand['biddingScheme'] = new SoapVar($operand['biddingScheme'], SOAP_ENC_OBJECT, 'EnhancedCpcBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
                    break;

                // PageOnePromotedBiddingScheme
                case 'PAGE_ONE_PROMOTED' :
                    $operand['biddingStrategyName'] = 'SamplePageOnePromoted_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'PAGE_ONE_PROMOTED',
                        'bidCeiling' => 550,
                        'bidMultiplier' => 5.00,
                        'bidChangesForRaisesOnly' => 'DEACTIVE',
                        'raiseBidWhenBudgetConstrained' => 'DEACTIVE',
                        'raiseBidWhenLowQualityScore' => 'DEACTIVE'
                    );

                    $operand['biddingScheme'] = new SoapVar($operand['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
                    break;

                // TargetCpaBiddingScheme
                case 'TARGET_CPA' :
                    $operand['biddingStrategyName'] = 'SampleTargetCpa_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'TARGET_CPA',
                        'targetCpa' => 550,
                        'bidCeiling' => 750
                    );

                    $operand['biddingScheme'] = new SoapVar($operand['biddingScheme'], SOAP_ENC_OBJECT, 'PageOnePromotedBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
                    break;

                // TargetSpendBiddingScheme
                case 'TARGET_SPEND' :
                    $operand['biddingStrategyName'] = 'SampleTargetSpend_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'TARGET_SPEND',
                        'bidCeiling' => 750
                    );

                    $operand['biddingScheme'] = new SoapVar($operand['biddingScheme'], SOAP_ENC_OBJECT, 'TargetSpendBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
                    break;

                // TargetRoasBiddingScheme
                case 'TARGET_ROAS' :
                    $operand['biddingStrategyName'] = 'SampleTargetRoas_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'TARGET_ROAS',
                        'targetRoas' => 15.00,
                        'bidCeiling' => 750,
                        'bidFloor' => 650
                    );

                    $operand['biddingScheme'] = new SoapVar($operand['biddingScheme'], SOAP_ENC_OBJECT, 'TargetRoasBiddingScheme', API_NS, 'biddingScheme', XMLSCHEMANS);
                    break;
            }

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return BiddingStrategyOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $biddingStrategyValues)
    {

        // Create operands
        $operands = array();
        foreach ($biddingStrategyValues as $biddingStrategyValue) {

            // Create operand
            $operand = array(
                'accountId' => $biddingStrategyValue->biddingStrategy->accountId,
                'biddingStrategyId' => $biddingStrategyValue->biddingStrategy->biddingStrategyId
            );

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return BiddingStrategySelector entity.
     */
    public function createSampleGetRequest($accountId, $biddingStrategyValues)
    {

        // Get biddingStrategyIds
        $biddingStrategyIds = array();
        foreach ($biddingStrategyValues as $biddingStrategyValue) {
            if (isset($biddingStrategyValue->biddingStrategy)) {
                $biddingStrategyIds[] = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'biddingStrategyIds' => $biddingStrategyIds,
                'biddingStrategyTypes' => array(
                    'ENHANCED_CPC',
                    'PAGE_ONE_PROMOTED',
                    'TARGET_CPA',
                    'TARGET_SPEND',
                    'TARGET_ROAS'
                ),
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute BiddingStrategyServiceSample.
 */
try {
    $biddingStrategyServiceSample = new BiddingStrategyServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // BiddingStrategyService ADD
    // =================================================================
    // Create operands
    $operation = $biddingStrategyServiceSample->createSampleAddRequest($accountId);

    // Run
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // BiddingStrategyService SET
    // =================================================================
    // Create operands
    $operation = $biddingStrategyServiceSample->createSampleSetRequest($accountId, $biddingStrategyValues);

    // Run
    $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'SET');

    // =================================================================
    // BiddingStrategyService GET
    // =================================================================
    // Create selector
    $selector = $biddingStrategyServiceSample->createSampleGetRequest($accountId, $biddingStrategyValues);

    // Run
    $biddingStrategyValues = $biddingStrategyServiceSample->get($selector);

    // =================================================================
    // BiddingStrategyService REMOVE
    // =================================================================
    // Create operands
    $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);

    // Run
    $biddingStrategyServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
