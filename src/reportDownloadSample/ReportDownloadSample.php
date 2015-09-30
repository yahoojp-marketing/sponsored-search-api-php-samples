<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for Report Download.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// ReportDefinitionService
//=================================================================
$reportDefinitionService = SoapUtils::getService('ReportDefinitionService');

//-----------------------------------------------
// call ReportDefinitionService::getReportFields
//-----------------------------------------------
// request
$getReportFieldsParam = array(
    'accountId' => SoapUtils::getAccountId(),
    'reportType' => 'ACCOUNT',
);

// call API
$getReportFieldsResponse = $reportDefinitionService->invoke('getReportFields', $getReportFieldsParam);

//response
$fields = array();
if (isset($getReportFieldsResponse->rval->operationSucceeded)) {
    foreach ($getReportFieldsResponse->rval->field as $index => $value) {
        if (isset($value->fieldName)) {
            array_push($fields, $value->fieldName);
        }
    }
} else {
    echo 'Fail to get Auditlog.';
    exit();
}

//-----------------------------------------------
// call ReportDefinitionService::mutate(ADD)
//-----------------------------------------------
// request
$addReportDefinitionParam = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportName' => 'ACCOUNT-REPORT',
            'reportType' => 'ACCOUNT',
            'dateRangeType' => 'YESTERDAY',
            'sort' => '+' . $fields[0],
            'fields' => $fields,
            'format' => 'CSV',
            'encode' => 'SJIS',
            'zip' => 'OFF',
            'lang' => 'EN',
            'addTemplate' => 'YES',
        ),
    ),
);

// call API
$addReportDefinitionResponse = $reportDefinitionService->invoke('mutate', $addReportDefinitionParam);

// reportId
if (isset($addReportDefinitionResponse->rval->values->reportDefinition->reportId)) {
    $reportId = $addReportDefinitionResponse->rval->values->reportDefinition->reportId;
} else {
    echo 'Fail to add report definition.';
    exit();
}

//-----------------------------------------------
// call ReportDefinitionService::get
//-----------------------------------------------
// request
$getReportDefinitionParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'reportIds' => array($reportId),
    ),
);

// call API
$getReportDefinitionResponse = $reportDefinitionService->invoke('get', $getReportDefinitionParam);

// reportId
if (isset($getReportDefinitionResponse->rval->values->reportDefinition->reportId)) {
    $reportId = $getReportDefinitionResponse->rval->values->reportDefinition->reportId;
} else {
    echo 'Fail to get report definition.';
    exit();
}

//-----------------------------------------------
// call ReportDefinitionService::mutate(SET)
//-----------------------------------------------
// request
$setReportDefinitionParam = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportId' => $reportId,
            'reportName' => 'ACCOUNT-REPORT-UPDATE',
            'frequency' => 'EVERYSUN',
        ),
    ),
);

// call API
$setReportDefinitionResponse = $reportDefinitionService->invoke('mutate', $setReportDefinitionParam);

// reportId
if (isset($setReportDefinitionResponse->rval->values->reportDefinition->reportId)) {
    $reportId = $setReportDefinitionResponse->rval->values->reportDefinition->reportId;
} else {
    echo 'Fail to set report definition.';
    exit();
}

//=================================================================
// ReportService
//=================================================================
$reportService = SoapUtils::getService('ReportService');

//-----------------------------------------------
// call ReportService::mutate(ADD)
//-----------------------------------------------
// request
$addReportParam = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportId' => $reportId,
        ),
    )
);

// call API
$addReportResponse = $reportService->invoke('mutate', $addReportParam);

// reportJobId
if (isset($addReportResponse->rval->values->reportRecord->reportJobId)) {
    $reportJobId = $addReportResponse->rval->values->reportRecord->reportJobId;
} else {
    echo 'Fail to add report job.';
    exit();
}

//-----------------------------------------------
// call ReportService::get
//-----------------------------------------------
// request
$getReportParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'reportJobIds' => array($reportJobId),
    ),
);

//call 30sec sleep * 30 = 15minute
for ($i = 0; $i < 30; $i++) {
    // sleep 30 second.
    echo "\n***** sleep 30 seconds for Report Download Job *****\n";
    sleep(30);

    // call API
    $getReportResponse = $reportService->invoke('get', $getReportParam);

    // status
    if (isset($getReportResponse->rval->values->reportRecord->status)) {
        $jobStatus = $getReportResponse->rval->values->reportRecord->status;
        if ($jobStatus === 'COMPLETED') {
            break;
        } else if ($jobStatus === 'ACCEPTED' || $jobStatus === 'IN_PROGRESS') {
            continue;
        } else {
            echo 'Report job status failed.';
            exit();
        }
    } else {
        echo 'Fail to get report job status';
        exit();
    }
}

if (!isset($jobStatus)) {
    echo 'Report job in process on long time. please wait.';
    exit();
}

//-----------------------------------------------
// call ReportService::getDownloadUrl
//-----------------------------------------------
// request
$getDownloadUrlParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'reportJobIds' => array($reportJobId),
    ),
);

// call API
$getDownloadUrlResponse = $reportService->invoke('getDownloadUrl', $getDownloadUrlParam);

if (isset($getDownloadUrlResponse->rval->values->reportDownloadUrl->downloadUrl)) {
    $download_url = $getDownloadUrlResponse->rval->values->reportDownloadUrl->downloadUrl;
} else {
    echo 'Fail to get Report download URL.';
    exit();
}

//-----------------------------------------------
// download report
//-----------------------------------------------
// file name
$reportType = $addReportDefinitionResponse->rval->values->reportDefinition->reportType;
$format = $addReportDefinitionResponse->rval->values->reportDefinition->format;
$fileext = strtolower($format);
$file_name = 'Report_' . $reportType . '_' . $reportJobId . '.' . $fileext;

// download
SoapUtils::download($download_url, $file_name);

//-----------------------------------------------
// call ReportService::mutate(REMOVE)
//-----------------------------------------------
// request
$removeReportParam = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportJobId' => $reportJobId,
        ),
    ),
);

// call API
$removeReportResponse = $reportService->invoke('mutate', $removeReportParam);

if (isset($removeReportResponse->rval->values->reportRecord->reportJobId)) {
    // OK
} else {
    echo 'Fail to remove Report Job.';
    exit();
}

//-----------------------------------------------
// call ReportDefinitionService::mutate(REMOVE)
//-----------------------------------------------
// request
$removeReportDefinitionParam = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportId' => $reportId,
        ),
    ),
);

// call API
$removeReportDefinitionResponse = $reportDefinitionService->invoke('mutate', $removeReportDefinitionParam);

// reportId
if (isset($removeReportDefinitionResponse->rval->values->reportDefinition->reportId)) {
    $reportId = $removeReportDefinitionResponse->rval->values->reportDefinition->reportId;
} else {
    echo 'Fail to remove report definition.';
    exit();
}
