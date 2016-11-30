<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/AccountSharedServiceSample.php');

/**
 * Sample Program for SharedCriterionService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class SharedCriterionServiceSample
{

    /**
     * Service Name.
     */
    const SERVICE_NAME = 'SharedCriterionService';

    /**
     * Return Value Object Name.
     */
    const RETURN_VALUE_OBJECT_NAME = 'sharedCriterion';

    /**
     * Sample Program for SharedCriterionService Mutate.
     *
     * @param array $operation SharedCriterionOperation entity.
     * @param string $method Operator enum.
     * @return array SharedCriterionValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService(self::SERVICE_NAME);
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
            throw new Exception('No response of ' . $method . ' ' . self::SERVICE_NAME . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->{self::RETURN_VALUE_OBJECT_NAME})) {
                throw new Exception('Fail to ' . $method . ' ' . self::SERVICE_NAME . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for SharedCriterionService GET.
     *
     * @param array $selector SharedCriterionSelector entity.
     * @return array SharedCriterionValues entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $service = SoapUtils::getService(self::SERVICE_NAME);
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
            throw new Exception('No response of get ' . self::SERVICE_NAME . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->{self::RETURN_VALUE_OBJECT_NAME})) {
                throw new Exception('Fail to get ' . self::SERVICE_NAME . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param $accountId AccountID
     * @param $sharedListIds SharedListIds
     */
    public function createSampleAddRequest($accountId, $sharedListIds)
    {

        // Create operand
        $operands = array();
        foreach ($sharedListIds as $sharedListId) {
            $operand = array(
                'sharedListId' => $sharedListId,
                'text' => 'sample text ' . SoapUtils::getCurrentTimestamp() . ' ' . $sharedListId,
                'matchType' => 'EXACT'
            );
            array_push($operands, $operand);
        }

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
     * @param $accountId AccountID
     * @param $sharedCriterionValues SharedCriterionValues
     */
    public function createSampleRemoveRequest($accountId, $sharedCriterionValues)
    {

        // Create operand
        $operands = array();
        foreach ($sharedCriterionValues as $sharedCriterionValue) {
            if (isset($sharedCriterionValue->sharedCriterion)) {
                $operand = array(
                    'sharedListId' => $sharedCriterionValue->sharedCriterion->sharedListId,
                    'criterionId' => $sharedCriterionValue->sharedCriterion->criterionId,
                );
                array_push($operands, $operand);
            }
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
     * @param $accountId AccountID
     * @param $sharedCriterionValues SharedCriterionValues
     */
    public function createSampleGetRequest($accountId, $sharedCriterionValues = null)
    {

        // Get SharedListId
        $sharedListIds = array();
        if (!is_null($sharedCriterionValues)) {
            foreach ($sharedCriterionValues as $sharedCriterionValue) {
                if (isset($sharedCriterionValue->sharedCriterion)) {
                    $sharedListIds[] = $sharedCriterionValue->sharedCriterion->criterionId;
                }
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'criterionIds' => $sharedListIds,
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
 * execute SharedCriterionServiceSample.
 */
try {
    $accountSharedServiceSample = new AccountSharedServiceSample();
    $sharedCriterionServiceSample = new SharedCriterionServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // AccountSharedService ADD
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleAddRequest($accountId);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'ADD');

    // Get SharedListId
    $sharedListIds = array();
    foreach ($accountSharedValues as $accountSharedValue) {
        if (isset($accountSharedValue->accountShared)) {
            $sharedListIds[] = $accountSharedValue->accountShared->sharedListId;
        }
    }

    // =================================================================
    // SharedCriterionService ADD
    // =================================================================
    // Create operands
    $operation = $sharedCriterionServiceSample->createSampleAddRequest($accountId, $sharedListIds);

    // Run
    $sharedCriterionValues = $sharedCriterionServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // SharedCriterionService GET
    // =================================================================
    // Create selector
    $selector = $sharedCriterionServiceSample->createSampleGetRequest($accountId, $sharedCriterionValues);

    // Run
    $sharedCriterionValues = $sharedCriterionServiceSample->get($selector);

    // =================================================================
    // SharedCriterionService REMOVE
    // =================================================================
    // Create operands
    $operation = $sharedCriterionServiceSample->createSampleRemoveRequest($accountId, $sharedCriterionValues);

    // Run
    $sharedCriterionValues = $sharedCriterionServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // AccountSharedService REMOVE
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleRemoveRequest($accountId, $accountSharedValues);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'REMOVE');
} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
