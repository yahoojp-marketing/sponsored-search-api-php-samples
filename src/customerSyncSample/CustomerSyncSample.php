<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CustomerSyncService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// CustomerSyncService
//=================================================================
$customerSyncService = SoapUtils::getService('CustomerSyncService');

//-----------------------------------------------
// CustomerSyncService::get
//-----------------------------------------------
//request
$getCustomerSyncRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'sourceTypes' => array('API'),
        'dateRange' => array(
            'startDate' => '-4 day 00:00:00',
            'endDate' => '+0 day 00:00:00',
            'includeUnset' => 'INCLUDED',
        ),
    ),
);

//call API
$getCustomerSyncResponce = $customerSyncService->invoke('get', $getCustomerSyncRequest);

//response
if (isset($getCustomerSyncResponce->rval->values->auditlog->accountId)) {
    echo "accountId=" . $getCustomerSyncResponce->rval->values->auditlog->accountId . "\n";
    echo "updatedTime=" . $getCustomerSyncResponce->rval->values->auditlog->updatedTime . "\n";
    echo "entityType=" . $getCustomerSyncResponce->rval->values->auditlog->entityType . "\n";
} else if (isset($getCustomerSyncResponce->rval->values) && is_array($getCustomerSyncResponce->rval->values)) {
    foreach ($getCustomerSyncResponce->rval->values as $index => $value) {
        if (isset($value->auditlog->accountId)) {
            echo "accountId=" . $value->auditlog->accountId . "\n";
            echo "updatedTime=" . $value->auditlog->updatedTime . "\n";
            echo "entityType=" . $value->auditlog->entityType . "\n";
        }
    }
} else {
    echo 'Fail to get Auditlog.';
    exit();
}
