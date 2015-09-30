<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for TrafficEstimatorService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// TrafficEstimatorService
//=================================================================
$trafficEstimatorService = SoapUtils::getService("TrafficEstimatorService");

//-----------------------------------------------
// TrafficEstimatorService::get
//-----------------------------------------------
//request
$getTrafficEstimatorRequest = array(
    'selector' => array(
        'estimateRequest' => array(
            0 => array(
                'target' => array(
                    'network' => 'ALL',
                ),
                'keyword' => array(
                    'type' => 'KEYWORD',
                    'text' => 'sample',
                    'matchType' => 'PHRASE'
                ),
                'bid' => 100,
                'platform' => array(
                    'platformName' => 'SMART_PHONE ',
                    'bidMultiplier' => '1.00',
                ),
                'wap' => 'WAP_INCLUDED',
            )
        ),
        'month' => 1
    )
);

//call API
$getTrafficEstimatorResponse = $trafficEstimatorService->invoke('get', $getTrafficEstimatorRequest);

if (!isset($getTrafficEstimatorResponse->rval->values)) {
    echo 'Fail to get TrafficEstimator.';
    exit();
}

