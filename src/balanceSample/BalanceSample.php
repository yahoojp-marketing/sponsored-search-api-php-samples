<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BalanceService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// BalanceService
//=================================================================
$balanceService = SoapUtils::getService('BalanceService');

//-----------------------------------------------
// BalanceService::get
//-----------------------------------------------
//request
$getBalanceRequest = array(
    'selector' => array(
        'accountIds' => array(SoapUtils::getAccountId())
    ),
);

//call API
$getBalanceResponse = $balanceService->invoke('get', $getBalanceRequest);

//response
if (isset($getBalanceResponse->rval->values->balance->accountId) &&
    isset($getBalanceResponse->rval->values->balance->balance)
) {
    echo "accountId=" . $getBalanceResponse->rval->values->balance->accountId . "\n";
    echo "balance=" . $getBalanceResponse->rval->values->balance->balance . "\n";
} else if (isset($getBalanceResponse->rval->values) && is_array($getBalanceResponse->rval->values)) {
    foreach ($getBalanceResponse->rval->values as $index => $value) {
        if (isset($value->balance->accountId)
            && isset($value->balance->balance)
        ) {
            echo "accountId=" . $value->balance->accountId . "\n";
            echo "balance=" . $value->balance->balance . "\n";
        }
    }
} else {
    echo 'Fail to get Balance.';
    exit();
}
