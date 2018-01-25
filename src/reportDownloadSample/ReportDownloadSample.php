<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for Report Download.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
// =================================================================
// ReportDefinitionService
// =================================================================
$reportDefinitionService = SoapUtils::getService('ReportDefinitionService');

// -----------------------------------------------
// call ReportDefinitionService::getReportFields
// -----------------------------------------------
// request
$getReportFieldsParam = array(
    'accountId' => SoapUtils::getAccountId(),
    'reportType' => 'CAMPAIGN'
);

// call API
$getReportFieldsResponse = $reportDefinitionService->invoke('getReportFields', $getReportFieldsParam);

$fields = array(
    "CAMPAIGN_ID",
    "CAMPAIGN_NAME",
    "CAMPAIGN_DISTRIBUTION_SETTINGS",
    "CAMPAIGN_DISTRIBUTION_STATUS",
    "DAILY_SPENDING_LIMIT",
    "CAMPAIGN_START_DATE",
    "CAMPAIGN_END_DATE",
    "TRACKING_URL",
    "CUSTOM_PARAMETERS",
    "CAMPAIGN_TRACKING_ID",
    "CONVERSIONS",
    "CONV_VALUE",
    "VALUE_PER_CONV",
    "CAMPAIGN_MOBILE_BID_MODIFIER",
    "NETWORK",
    "CLICK_TYPE",
    "DEVICE",
    "DAY",
    "DAY_OF_WEEK",
    "QUARTER",
    "YEAR",
    "MONTH",
    "MONTH_OF_YEAR",
    "WEEK",
    "HOUR_OF_DAY",
    "OBJECT_OF_CONVERSION_TRACKING",
    "CONVERSION_NAME",
    "CAMPAIGN_TYPE",
);

// -----------------------------------------------
// call ReportDefinitionService::mutate(ADD)
// -----------------------------------------------
// request
$addReportDefinitionParam = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'accountId' => SoapUtils::getAccountId(),
            'reportName' => 'CAMPAIGN-REPORT',
            'reportType' => 'CAMPAIGN',
            'dateRangeType' => 'YESTERDAY',
            'sort' => '+' . $fields[0],
            'fields' => $fields,
            'compress' => 'NONE',
            'isTemplate' => 'TRUE',
            'intervalType' => 'ONETIME',
            'format' => 'CSV',
            'encode' => 'SJIS',
            'language' => 'EN',
            'includeZeroImpressions' => 'FALSE',
            'includeDeleted' => 'TRUE'
        )
    )
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

// =================================================================
// ReportService
// =================================================================
$reportService = SoapUtils::getService('ReportService');

// -----------------------------------------------
// call ReportService::mutate(ADD)
// -----------------------------------------------
// request
$addReportParam = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportId' => $reportId
        )
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

// -----------------------------------------------
// call ReportService::get
// -----------------------------------------------
// request
$getReportParam = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'reportJobIds' => array(
            $reportJobId
        )
    )
);

// call 30sec sleep * 30 = 15minute
for ($i = 0; $i < 30; $i++) {
    // sleep 30 second.
    echo "\n***** sleep 30 seconds for Report Download Job *****\n";
    sleep(30);

    // call API
    $getReportResponse = $reportService->invoke('get', $getReportParam);

    // status
    if (isset($getReportResponse->rval->values->reportRecord->reportJobStatus)) {
        $jobStatus = $getReportResponse->rval->values->reportRecord->reportJobStatus;
        if ($jobStatus === 'COMPLETED') {
            // -----------------------------------------------
            // download report
            // -----------------------------------------------
            // file name
            $reportType = $addReportDefinitionResponse->rval->values->reportDefinition->reportType;
            $format = $addReportDefinitionResponse->rval->values->reportDefinition->format;
            $fileext = strtolower($format);
            $file_name = 'Report_' . $reportType . '_' . $reportJobId . '.' . $fileext;

            // download
            SoapUtils::download($getReportResponse->rval->values->reportRecord->reportDownloadURL, $file_name);
            break;
        } else {
            if ($jobStatus === 'IN_PROGRESS' || $jobStatus === 'WAIT') {
                continue;
            } else {
                echo 'Report job status failed.';
                exit();
            }
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

// -----------------------------------------------
// call ReportService::mutate(REMOVE)
// -----------------------------------------------
// request
$removeReportParam = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportJobId' => $reportJobId
        )
    )
);

// call API
$removeReportResponse = $reportService->invoke('mutate', $removeReportParam);

if (isset($removeReportResponse->rval->values->reportRecord->reportJobId)) {
    // OK
} else {
    echo 'Fail to remove Report Job.';
    exit();
}

// -----------------------------------------------
// call ReportDefinitionService::mutate(REMOVE)
// -----------------------------------------------
// request
$removeReportDefinitionParam = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            'reportId' => $reportId
        )
    )
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
