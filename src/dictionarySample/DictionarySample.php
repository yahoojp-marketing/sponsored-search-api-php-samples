<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for DictionaryService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// DictionaryService
//=================================================================
$dictionaryService = SoapUtils::getService('DictionaryService');

//-----------------------------------------------
// DictionaryService::getDisapprovalReason
//-----------------------------------------------
//request
$getDisapprovalReasonRequest = array(
    'selector' => array(
        'lang' => 'EN'
    )
);

//call API
$getDisapprovalReasonResponse = $dictionaryService->invoke('getDisapprovalReason', $getDisapprovalReasonRequest);

if (!isset($getDisapprovalReasonResponse->rval->values)) {
    echo 'Fail to getDisapprovalReason.';
    exit();
}

//-----------------------------------------------
// DictionaryService::getGeographicLocation
//-----------------------------------------------
//request
$getGeographicLocationRequest = array(
    'selector' => array(
        'lang' => 'EN'
    )
);

//call API
$getGeographicLocationResponse = $dictionaryService->invoke('getGeographicLocation', $getGeographicLocationRequest);

if (!isset($getGeographicLocationResponse->rval->values)) {
    echo 'Fail to getGeographicLocation.';
    exit();
}
