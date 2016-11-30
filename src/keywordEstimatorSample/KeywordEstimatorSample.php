<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for KeywordEstimatorService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class KeywordEstimatorSample
{

    private $serviceName = 'KeywordEstimatorService';

    /**
     * Sample Program for KeywordEstimatorService GET.
     *
     * @param array $selector KeywordEstimatorSelector entity.
     * @return array KeywordEstimateValues entity.
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
     * @return KeywordEstimatorSelector entity.
     */
    public function createSampleGetRequest($accountId)
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignEstimateRequest' => array(
                    'adGroupEstimateRequests' => array(
                        0 => array(
                            'keywordEstimateRequests' => array(
                                0 => array(
                                    'keyword' => array(
                                        'text' => 'sample1',
                                        'matchType' => 'EXACT'
                                    ),
                                    'maxCpc' => 100,
                                    'isNegative' => 'FALSE'
                                )
                            ),
                            'maxCpc' => 500
                        ),
                        1 => array(
                            'keywordEstimateRequests' => array(
                                0 => array(
                                    'keyword' => array(
                                        'text' => 'sample2',
                                        'matchType' => 'PHRASE'
                                    ),
                                    'maxCpc' => 150
                                )
                            ),
                            'maxCpc' => 300
                        )
                    )
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
 * execute KeywordEstimatorSample.
 */
try {
    $keywordEstimatorSample = new KeywordEstimatorSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // KeywordEstimatorService GET
    // =================================================================
    // Create selector
    $selector = $keywordEstimatorSample->createSampleGetRequest($accountId);

    // Run
    $keywordEstimatorSample->get($selector);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
