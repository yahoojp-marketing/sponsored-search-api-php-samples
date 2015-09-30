<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AccountService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// AccountService
//=================================================================
$accountService = SoapUtils::getService('AccountService');

//-----------------------------------------------
// AccountService::get(without accountIds)
//-----------------------------------------------
//request
$getAccountRequest1 = array(
    'selector' => array(
        'accountTypes' => array('INVOICE'),
        'accountStatuses' => array('SERVING', 'ENDED'),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getAccountResponse1 = $accountService->invoke('get', $getAccountRequest1);

//account Id
if (isset($getAccountResponse1->rval->values->account)) {
    $firstAccount = $getAccountResponse1->rval->values->account;
} else if (isset($getAccountResponse1->rval->values[0]->account)) {
    $firstAccount = $getAccountResponse1->rval->values[0]->account;
} else {
    echo 'Fail to get Account.';
    exit();
}

//-----------------------------------------------
// AccountService::get(with accountIds)
//-----------------------------------------------
//request
$getAccountRequest2 = array(
    'selector' => array(
        'accountIds' => array(SoapUtils::getAccountId()),
    ),
);

//call API
$getAccountResponse2 = $accountService->invoke('get', $getAccountRequest2);

//account
if (isset($getAccountResponse2->rval->values->account)) {
    $account = $getAccountResponse2->rval->values->account;
} else if ($getAccountResponse2->rval->values[0]->account) {
    $account = $getAccountResponse2->rval->values[0]->account;
} else {
    echo 'Fail to get Account.';
    exit();
}
//-----------------------------------------------
// AccountService::mutate(SET)
//-----------------------------------------------
//request
$setAccountRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'operand' => array(
            0 => array(
                'accountId' => SoapUtils::getAccountId(),
                'accountName' => 'SampleAccount_UpdatedOn_' . SoapUtils::getCurrentTimestamp(),
                'deliveryStatus' => 'PAUSED',
            )
        ),
    ),
);

//call API
$setAccountResponse = $accountService->invoke('mutate', $setAccountRequest);

//response
if (isset($setAccountResponse->rval->values->account)) {
    $account = $getAccountResponse2->rval->values->account;
} else if (isset($setAccountResponse->rval->values[0]->account)) {
    $account = $getAccountResponse2->rval->values[0]->account;
} else {
    echo 'Fail to set Account.';
    exit();
}
