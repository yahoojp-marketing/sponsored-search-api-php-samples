<?php


 function autoload_5a94d3eb722218b8f733bf47df38150e($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogService' => __DIR__ .'/AuditLogService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogPage' => __DIR__ .'/AuditLogPage.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogReturnValue' => __DIR__ .'/AuditLogReturnValue.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogValues' => __DIR__ .'/AuditLogValues.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob' => __DIR__ .'/AuditLogJob.php',
        'Jp\YahooApis\SS\V201901\AuditLog\EventSelector' => __DIR__ .'/EventSelector.php',
        'Jp\YahooApis\SS\V201901\AuditLog\DateRange' => __DIR__ .'/DateRange.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogSelector' => __DIR__ .'/AuditLogSelector.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogJobStatus' => __DIR__ .'/AuditLogJobStatus.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogSourceType' => __DIR__ .'/AuditLogSourceType.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogOutput' => __DIR__ .'/AuditLogOutput.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogEncoding' => __DIR__ .'/AuditLogEncoding.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogLang' => __DIR__ .'/AuditLogLang.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogEventType' => __DIR__ .'/AuditLogEventType.php',
        'Jp\YahooApis\SS\V201901\AuditLog\AuditLogOperation' => __DIR__ .'/AuditLogOperation.php',
        'Jp\YahooApis\SS\V201901\AuditLog\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AuditLog\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AuditLog\addJob' => __DIR__ .'/addJob.php',
        'Jp\YahooApis\SS\V201901\AuditLog\addJobResponse' => __DIR__ .'/addJobResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_5a94d3eb722218b8f733bf47df38150e');

// Do nothing. The rest is just leftovers from the code generation.
{
}
