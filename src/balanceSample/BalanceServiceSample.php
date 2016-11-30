<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BalanceService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class BalanceServiceSample
{

    private $serviceName = 'BalanceService';

    /**
     * Sample Program for BalanceService GET.
     *
     * @param array $selector BalanceSelector entity.
     * @return array BalanceValues entity.
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
     * @return BalanceSelector entity.
     */
    public function createSampleGetRequest($accountId)
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'accountIds' => array(
                    $accountId
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
 * execute BalanceServiceSample.
 */
try {
    $balanceServiceSample = new BalanceServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // BalanceService GET
    // =================================================================
    // Create selector
    $selector = $balanceServiceSample->createSampleGetRequest($accountId);

    // Run
    $balanceServiceSample->get($selector);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
