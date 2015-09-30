<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for KeywordEstimatorService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// KeywordEstimatorService
//=================================================================
$keywordEstimatorService = SoapUtils::getService("KeywordEstimatorService");

//-----------------------------------------------
// KeywordEstimatorService::get
//-----------------------------------------------
//request
$getKeywordEstimatorRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
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
                        )),
                    'maxCpc' => 500
                ),
                1 => array(
                    'keywordEstimateRequests' => array(
                        0 => array(
                            'keyword' => array(
                                'text' => 'sample2',
                                'matchType' => 'PHRASE'
                            ),
                            'maxCpc' => 150,
                        )),
                    'maxCpc' => 300
                )
            ))
    )
);

//call API
$getKeywordEstimatorResponse = $keywordEstimatorService->invoke('get', $getKeywordEstimatorRequest);

if (!isset($getKeywordEstimatorResponse->rval->values)) {
    echo 'Fail to get KeywordEstimator.';
    exit();
}
