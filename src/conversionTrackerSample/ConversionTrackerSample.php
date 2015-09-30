<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for ConversionTrackerService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// ConversionTrackerService
//=================================================================
$conversionTrackerService = SoapUtils::getService('ConversionTrackerService');

//-----------------------------------------------
// ConversionTrackerService::mutate(ADD)
//-----------------------------------------------
//request
$addConversionTrackerRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'conversionTrackerName' => 'SampleWebConversionTracker_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DEFAULT',
                'markupLanguage' => 'HTML',
                'httpProtocol' => 'HTTP',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'WEB_CONVERSION',
                'trackingCodeType' => 'CLICK_TO_CALL'
            ),
            array(
                'accountId' => SoapUtils::getAccountId(),
                'conversionTrackerName' => 'SampleAppConversionTracker_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DOWNLOAD',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'APP_CONVERSION',
                'appId' => 'sample123',
                'appPlatform' => 'ANDROID_MARKET',
                'appConversionType' => 'DOWNLOAD'
            ),
        )
    )
);

//call API
$addConversionTrackerRequest['operations']['operand'][0] = new SoapVar($addConversionTrackerRequest['operations']['operand'][0], SOAP_ENC_OBJECT, 'WebConversion', API_NS, 'operand', XMLSCHEMANS);
$addConversionTrackerRequest['operations']['operand'][1] = new SoapVar($addConversionTrackerRequest['operations']['operand'][1], SOAP_ENC_OBJECT, 'AppConversion', API_NS, 'operand', XMLSCHEMANS);
$addConversionTrackerResponse = $conversionTrackerService->invoke('mutate', $addConversionTrackerRequest);

//response
if (isset($addConversionTrackerResponse->rval->values->conversionTracker)) {
    $conversionTracker = $addConversionTrackerResponse->rval->values->conversionTracker;
} else if (isset($addConversionTrackerResponse->rval->values)
    && is_array($addConversionTrackerResponse->rval->values)
    && isset($addConversionTrackerResponse->rval->values[0]->conversionTracker)
) {
    $conversionTracker = $addConversionTrackerResponse->rval->values[0]->conversionTracker;
} else {
    echo 'Fail to add ConversionTracker.';
    exit();
}

//-----------------------------------------------
// ConversionTrackerService::get
//-----------------------------------------------
//request
$getConversionTrackerRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'conversionTrackerIds' => array($conversionTracker->conversionTrackerId),
        'dateRange' => array(
            'startDate' => date("Ymd"),
            'endDate' => date("Ymd", strtotime('+10 day'))
        ),
        'conversionTrackerTypes' => array(
            'WEB_CONVERSION',
        ),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20
        )
    )
);

//call API
$getConversionTrackerResponse = $conversionTrackerService->invoke('get', $getConversionTrackerRequest);

if (isset($getConversionTrackerResponse->rval->values->conversionTracker)) {
    $conversionTracker = $getConversionTrackerResponse->rval->values->conversionTracker;
} else if (isset($getConversionTrackerResponse->rval->values) &&
    is_array($getConversionTrackerResponse->rval->values) &&
    isset($getConversionTrackerResponse->rval->values[0]->conversionTracker)
) {
    $conversionTracker = $getConversionTrackerResponse->rval->values[0]->conversionTracker;
} else {
    echo 'Fail to get ConversionTracker.';
    exit();
}

//-----------------------------------------------
// ConversionTrackerService::mutate(SET)
//-----------------------------------------------
//request
$setConversionTrackerRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'conversionTrackerId' => $conversionTracker->conversionTrackerId,
            'conversionTrackerName' => 'SampleWebConversionTracker_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
            'status' => 'DISABLED',
            'category' => 'DEFAULT',
            'conversionTrackerType' => 'WEB_CONVERSION'
        )
    )
);

//call API
$addConversionTrackerRequest['operations']['operand'][0] = new SoapVar($addConversionTrackerRequest['operations']['operand'][0], SOAP_ENC_OBJECT, 'WebConversion', API_NS, 'operand', XMLSCHEMANS);
$setConversionTrackerResponse = $conversionTrackerService->invoke('mutate', $setConversionTrackerRequest);

if (isset($setConversionTrackerResponse->rval->values->conversionTracker)) {
    $conversionTracker = $setConversionTrackerResponse->rval->values->conversionTracker;
} else if (isset($setConversionTrackerResponse->rval->values)
    && is_array($setConversionTrackerResponse->rval->values)
    && isset($setConversionTrackerResponse->rval->values[0]->conversionTracker)
) {
    $conversionTracker = $setConversionTrackerResponse->rval->values[0]->conversionTracker;
} else {
    echo 'Fail to set ConversionTracker.';
    exit();
}
