<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for Bulk Upload.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// BulkService
//=================================================================
$bulkService = SoapUtils::getService('BulkService');

//-----------------------------------------------
// BulkService::getUploadUrl
//-----------------------------------------------
//request
$getUploadUrlRequest = array(
    'accountId' => SoapUtils::getAccountId(),
);

//call API
$getUploadUrlResponse = $bulkService->invoke('getUploadUrl', $getUploadUrlRequest);

//response
if (isset($getUploadUrlResponse->rval)) {
    $bulkUploadInfo = $getUploadUrlResponse->rval;
} else {
    echo 'Fail to get BulkUploadUrl.';
    exit();
}

if ($bulkUploadInfo->acceptableUploadStatus !== true) {
    echo 'Bulk Upload is unacceptable now.';
    exit();
}

// Upload URL
$upload_url = $bulkUploadInfo->uploadUrl;


//-----------------------------------------------
// BulkService::upload(not SOAP)
//-----------------------------------------------
//upload
$uploadBulkResponse = SoapUtils::upload($upload_url, 'SampleBulkUpload.csv');
if ($uploadBulkResponse === false) {
    exit();
}

//parse response
$doc = new DOMDocument();
$doc->loadXML($uploadBulkResponse);
$nodeList = $doc->getElementsByTagName('uploadBulkJobId');
//get upload job ID
$uploadBulkJobId = $nodeList->item(0)->nodeValue;

//-----------------------------------------------
// BulkService::getBulkUploadStatus
//-----------------------------------------------
//request
$getBulkUploadStatusRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'uploadBulkJobIds' => array($uploadBulkJobId),
        'lang' => 'JA',
        'output' => 'CSV',
        'encoding' => 'SJIS',
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

$uploadCompleted = false;
//call 30sec sleep * 30 = 15minute
for ($i = 0; $i < 30; $i++) {
    // sleep 30 second.
    echo "\n***** sleep 30 seconds for Bulk Upload Job *****\n";
    sleep(30);

    //call API
    $getUploadStatusResponse = $bulkService->invoke('getBulkUploadStatus', $getBulkUploadStatusRequest);

    //response
    if (isset($getUploadStatusResponse->rval->values->uploadBulkJob)) {
        $uploadBulkJob = $getUploadStatusResponse->rval->values->uploadBulkJob;
    } else if (isset($getUploadStatusResponse->rval->values[0]->uploadBulkJob)) {
        $uploadBulkJob = $getUploadStatusResponse->rval->values[0]->uploadBulkJob;
    } else {
        echo 'Fail to get BulkUploadStatus.';
        exit();
    }

    if ($uploadBulkJob->uploadBulkJobStatus === 'IN_PROGRESS') {
        continue;
    } else if ($uploadBulkJob->uploadBulkJobStatus === 'COMPLETED') {
        $uploadCompleted = true;
        break;
    } else {
        break;
    }
}

if ($uploadCompleted === false) {
    echo 'BulkUpload job in process on long time. please wait.';
    exit();
} else {
    echo "Success to upload Bulk Sheet.\n";
}

//-----------------------------------------------
// BulkService::download for upload result.
//-----------------------------------------------
//download uploaded data.
echo "\nBulkService::downloadBulkUploadFile\n";
SoapUtils::download($uploadBulkJob->downloadBulkUploadFileUrl, 'SampleBulkUploadFile.csv');

//download result of upload.
echo "\nBulkService::downloadBulkUploadErrorFile\n";
SoapUtils::download($uploadBulkJob->downloadBulkUploadErrorFileUrl, 'SampleBulkUploadErrorFile.csv');


