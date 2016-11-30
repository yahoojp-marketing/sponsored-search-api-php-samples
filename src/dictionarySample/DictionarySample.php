<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for DictionaryService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class DictionarySample
{

    private $serviceName = 'DictionaryService';

    /**
     * Sample Program for DictionaryService GET.
     *
     * @param array $selector DisapprovalReasonSelector entity.
     * @return array DisapprovalReasonValues entity.
     * @throws Exception
     */
    public function get($selector, $method)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke($method, $selector);

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
     * create sample request.
     *
     * @return DisapprovalReasonSelector entity.
     */
    public function createSampleGetRequest()
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'lang' => 'EN'
            )
        );

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute DictionarySample.
 */
try {
    $dictionarySample = new DictionarySample();

    // =================================================================
    // DictionaryService getDisapprovalReason
    // =================================================================
    // Create selector
    $selector = $dictionarySample->createSampleGetRequest();

    // Run
    $dictionarySample->get($selector, 'getDisapprovalReason');

    // =================================================================
    // DictionaryService getGeographicLocation
    // =================================================================
    // Create selector
    $selector = $dictionarySample->createSampleGetRequest();

    // Run
    $dictionarySample->get($selector, 'getGeographicLocation');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
