<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CustomerSyncService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CustomerSyncSample
{

    private $serviceName = 'CustomerSyncService';

    /**
     * Sample Program for CustomerSyncService GET.
     *
     * @param array $selector CustomerSyncSelector entity.
     * @return array ChangeDataValues entity.
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
     * @return CustomerSyncSelector entity.
     */
    public function createSampleGetRequest($accountId)
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'sourceTypes' => array(
                    'API'
                ),
                'dateRange' => array(
                    'startDate' => '-4 day 00:00:00',
                    'endDate' => '+0 day 00:00:00',
                    'includeUnset' => 'INCLUDED'
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
 * execute CustomerSyncSample.
 */
try {
    $customerSyncSample = new CustomerSyncSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // CustomerSyncService GET
    // =================================================================
    // Create selector
    $selector = $customerSyncSample->createSampleGetRequest($accountId);

    // Run
    $customerSyncSample->get($selector);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
