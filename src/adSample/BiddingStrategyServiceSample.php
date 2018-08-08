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
     * Example Mutate Request Base.
     *
     * @param string $operator Operator
     * @param string $accountId Account ID
     * @return array Mutate entity.
     */
    public function createMutateRequest($operator, $accountId)
    {
        return array(
            'operations' => array(
                'operator' => $operator,
                'accountId' => $accountId,
                'operand' => array()
            )
        );
    }

    /**
     * Example EnhancedCpcBiddingScheme entity.
     *
     * @param string $accountId Account ID
     * @return  array BiddingScheme entity.
     */
    public function createEnhancedCpcBidding($accountId) {
        $biddingStrategy = array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleEnhancedCpc_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'ENHANCED_CPC'
            )
        );
        $biddingStrategy['biddingScheme'] = SoapUtils::encodingSoapVar($biddingStrategy['biddingScheme'], 'EnhancedCpcBiddingScheme','BiddingStrategy' , 'biddingScheme');
        return $biddingStrategy;
    }

    /**
     * Example PageOnePromotedBiddingScheme entity.
     *
     * @param string $accountId Account ID
     * @return  array BiddingScheme entity.
     */
    public function createPageOnePromotedBidding($accountId) {
        $biddingStrategy = array(
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
        );
        $biddingStrategy['biddingScheme'] = SoapUtils::encodingSoapVar($biddingStrategy['biddingScheme'], 'PageOnePromotedBiddingScheme','BiddingStrategy' , 'biddingScheme');
        return $biddingStrategy;
    }

    /**
     * Example TargetCpaBiddingScheme entity.
     *
     * @param string $accountId Account ID
     * @return  array BiddingScheme entity.
     */
    public function createTargetCpaBidding($accountId) {
        $biddingStrategy = array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetCpa_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_CPA',
                'targetCpa' => 500,
                'bidCeiling' => 700
            )
        );
        $biddingStrategy['biddingScheme'] = SoapUtils::encodingSoapVar($biddingStrategy['biddingScheme'], 'TargetCpaBiddingScheme','BiddingStrategy' , 'biddingScheme');
        return $biddingStrategy;
    }

    /**
     * Example TargetSpendBiddingScheme entity.
     *
     * @param string $accountId Account ID
     * @return  array BiddingScheme entity.
     */
    public function createTargetSpendBidding($accountId) {
        $biddingStrategy = array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetSpend_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_SPEND',
                'bidCeiling' => 700,
                'spendTarget' => 10
            )
        );
        $biddingStrategy['biddingScheme'] = SoapUtils::encodingSoapVar($biddingStrategy['biddingScheme'], 'TargetSpendBiddingScheme','BiddingStrategy' , 'biddingScheme');
        return $biddingStrategy;
    }

    /**
     * Example TargetRoasBiddingScheme entity.
     *
     * @param string $accountId Account ID
     * @return  array BiddingScheme entity.
     */
    public function createTargetRoasBidding($accountId) {
        $biddingStrategy = array(
            'accountId' => $accountId,
            'biddingStrategyName' => 'SampleTargetRoas_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'biddingScheme' => array(
                'biddingStrategyType' => 'TARGET_ROAS',
                'targetRoas' => 10.00,
                'bidCeiling' => 700,
                'bidFloor' => 600
            )
        );
        $biddingStrategy['biddingScheme'] = SoapUtils::encodingSoapVar($biddingStrategy['biddingScheme'], 'TargetRoasBiddingScheme','BiddingStrategy' , 'biddingScheme');
        return $biddingStrategy;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @return array BiddingStrategyOperation entity.
     */
    public function createSampleAddRequest($accountId)
    {
        // Create operation
        $operation = $this->createMutateRequest('ADD', $accountId);
        array_push($operation['operations']['operand'], $this->createEnhancedCpcBidding($accountId));
        array_push($operation['operations']['operand'], $this->createPageOnePromotedBidding($accountId));
        array_push($operation['operations']['operand'], $this->createTargetCpaBidding($accountId));
        array_push($operation['operations']['operand'], $this->createTargetSpendBidding($accountId));
        array_push($operation['operations']['operand'], $this->createTargetRoasBidding($accountId));
        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return array BiddingStrategyOperation entity.
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

                    $operand['biddingScheme'] = SoapUtils::encodingSoapVar($operand['biddingScheme'], 'EnhancedCpcBiddingScheme','BiddingStrategy' , 'biddingScheme');
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

                    $operand['biddingScheme'] = SoapUtils::encodingSoapVar($operand['biddingScheme'], 'PageOnePromotedBiddingScheme','BiddingStrategy' , 'biddingScheme');
                    break;

                // TargetCpaBiddingScheme
                case 'TARGET_CPA' :
                    $operand['biddingStrategyName'] = 'SampleTargetCpa_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'TARGET_CPA',
                        'targetCpa' => 550,
                        'bidCeiling' => 750
                    );

                    $operand['biddingScheme'] = SoapUtils::encodingSoapVar($operand['biddingScheme'], 'TargetCpaBiddingScheme','BiddingStrategy' , 'biddingScheme');
                    break;

                // TargetSpendBiddingScheme
                case 'TARGET_SPEND' :
                    $operand['biddingStrategyName'] = 'SampleTargetSpend_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['biddingScheme'] = array(
                        'biddingStrategyType' => 'TARGET_SPEND',
                        'bidCeiling' => 750
                    );

                    $operand['biddingScheme'] = SoapUtils::encodingSoapVar($operand['biddingScheme'], 'TargetSpendBiddingScheme','BiddingStrategy' , 'biddingScheme');
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

                    $operand['biddingScheme'] = SoapUtils::encodingSoapVar($operand['biddingScheme'], 'TargetRoasBiddingScheme','BiddingStrategy' , 'biddingScheme');
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
     * @param string $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return array BiddingStrategyOperation entity.
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
     * @param string $accountId AccountID
     * @param array $biddingStrategyValues BiddingStrategyReturnValue entity.
     * @return array BiddingStrategySelector entity.
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
