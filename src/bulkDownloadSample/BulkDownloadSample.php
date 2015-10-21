<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for Bulk Download.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// BulkService
//=================================================================
$bulkService = SoapUtils::getService('BulkService');

//-----------------------------------------------
// BulkService::getBulkDownload
//-----------------------------------------------
// request
$getBulkDownloadParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignUserStatuses' => 'ACTIVE',
        'adGroupUserStatuses' => 'ACTIVE',
        'adGroupAdUserStatuses' => 'ACTIVE',
        'adGroupAdApprovalStatuses' => 'APPROVED',
        'entityTypes' => 'ALL',
        'lang' => 'JA',
        'output' => 'CSV',
        'encoding' => 'SJIS',
    ),
);

// call API
$getBulkDownloadResponse = $bulkService->invoke('getBulkDownload', $getBulkDownloadParam);

// jobId
if (isset($getBulkDownloadResponse->rval->values->downloadBulkJob->downloadBulkJobId)) {
    $downloadBulkJobId = $getBulkDownloadResponse->rval->values->downloadBulkJob->downloadBulkJobId;
} else {
    echo 'Fail to get bulk download job Id.';
    exit();
}

//-----------------------------------------------
// BulkService::getBulkDownloadStatus
//-----------------------------------------------
// request
$getBulkDownloadStatusParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'downloadBulkJobIds' => array($downloadBulkJobId),
        'downloadBulkJobStatuses' => array('COMPLETED', 'IN_PROGRESS')
    ),
);

//call 30sec sleep * 30 = 15minute
for ($i = 0; $i < 30; $i++) {
    // sleep 30 second.
    echo "\n***** sleep 30 seconds for Bulk Download Job *****\n";
    sleep(30);

    // call API
    $getBulkDownloadStatusResponse = $bulkService->invoke('getBulkDownloadStatus', $getBulkDownloadStatusParam);

    // url
    if (isset($getBulkDownloadStatusResponse->rval->values->downloadBulkJob->downloadJobStatus)) {
        $jobStatus = $getBulkDownloadStatusResponse->rval->values->downloadBulkJob->downloadJobStatus;
        if ($jobStatus === 'COMPLETED') {
            $download_url = $getBulkDownloadStatusResponse->rval->values->downloadBulkJob->downloadBulkDownloadUrl;
            break;
        } else if ($jobStatus === 'IN_PROGRESS') {
            continue;
        } else {
            echo 'Error : Job Status failed.';
            exit();
        }
    } else {
        echo 'Fail to get BulkDownloadJob Status.';
        exit();
    }
}

if (!isset($download_url)) {
    echo 'BulkDownload job in process on long time. please wait.';
    exit();
}

//-----------------------------------------------
// download bulk
//-----------------------------------------------
// file name
$format = $getBulkDownloadParam['selector']['output'];
if ($format === 'CSV') {
    $fileext = 'csv';
} else {
    $fileext = 'zip';
}
$file_name = 'BulkDownload_' . $downloadBulkJobId . '.' . $fileext;

// download
SoapUtils::download($download_url, $file_name);
