<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AccountSharedService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AccountSharedServiceSample
{

    /**
     * Service Name.
     */
    const SERVICE_NAME = 'AccountSharedService';

    /**
     * Return Value Object Name.
     */
    const RETURN_VALUE_OBJECT_NAME = 'accountShared';

    /**
     * Sample Program for AccountSharedService Mutate.
     *
     * @param array $operation AccountSharedOperation entity.
     * @param string $method Operator enum.
     * @return array AccountSharedValue entity.
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
     * Sample Program for AccountSharedService GET.
     *
     * @param array $selector AccountSharedSelector entity.
     * @return array AccountSharedValues entity.
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
     */
    public function createSampleAddRequest($accountId)
    {

        // Create operand
        $operands = array(
            'name' => 'SampleSharedAccount_' . SoapUtils::getCurrentTimestamp()
        );

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
     * @param $accountSharedValues AccountSharedValues
     */
    public function createSampleSetRequest($accountId, $accountSharedValues)
    {

        // Create operand
        $operands = array();
        foreach ($accountSharedValues as $accountSharedValue) {
            if (isset($accountSharedValue->accountShared)) {
                $operand = array(
                    'sharedListId' => $accountSharedValue->accountShared->sharedListId,
                    'name' => 'SampleSharedAccount_UpdateOn_' . SoapUtils::getCurrentTimestamp() . '_' . rand(1, 99999)
                );
                array_push($operands, $operand);
            }
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
     * @param $accountId AccountID
     * @param $accountSharedValues AccountSharedValues
     */
    public function createSampleRemoveRequest($accountId, $accountSharedValues)
    {

        // Create operand
        $operands = array();
        foreach ($accountSharedValues as $accountSharedValue) {
            if (isset($accountSharedValue->accountShared)) {
                $operand = array(
                    'sharedListId' => $accountSharedValue->accountShared->sharedListId,
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
     * @param $accountSharedValues AccountSharedValues
     */
    public function createSampleGetRequest($accountId, $accountSharedValues = null)
    {

        // Get SharedListId
        $sharedListIds = array();
        if (!is_null($accountSharedValues)) {
            foreach ($accountSharedValues as $accountSharedValue) {
                if (isset($accountSharedValue->accountShared)) {
                    $sharedListIds[] = $accountSharedValue->accountShared->sharedListId;
                }
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'sharedListIds' => $sharedListIds,
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
 * execute AccountSharedServiceSample.
 */
try {
    $accountSharedServiceSample = new AccountSharedServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // AccountSharedService ADD
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleAddRequest($accountId);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AccountSharedService GET
    // =================================================================
    // Create selector
    $selector = $accountSharedServiceSample->createSampleGetRequest($accountId, $accountSharedValues);

    // Run
    $accountSharedValues = $accountSharedServiceSample->get($selector);

    // =================================================================
    // AccountSharedService SET
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleSetRequest($accountId, $accountSharedValues);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'SET');

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
