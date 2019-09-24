<?php


 function autoload_456005ac98416ebfa9b141ee6ba9267f($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogService' => __DIR__ .'/AuditLogService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogPage' => __DIR__ .'/AuditLogPage.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogReturnValue' => __DIR__ .'/AuditLogReturnValue.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogValues' => __DIR__ .'/AuditLogValues.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogJob' => __DIR__ .'/AuditLogJob.php',
        'Jp\YahooApis\SS\V201909\AuditLog\EventSelector' => __DIR__ .'/EventSelector.php',
        'Jp\YahooApis\SS\V201909\AuditLog\DateRange' => __DIR__ .'/DateRange.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogSelector' => __DIR__ .'/AuditLogSelector.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogJobStatus' => __DIR__ .'/AuditLogJobStatus.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogSourceType' => __DIR__ .'/AuditLogSourceType.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogOutput' => __DIR__ .'/AuditLogOutput.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogEncoding' => __DIR__ .'/AuditLogEncoding.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogLang' => __DIR__ .'/AuditLogLang.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogEventType' => __DIR__ .'/AuditLogEventType.php',
        'Jp\YahooApis\SS\V201909\AuditLog\AuditLogOperation' => __DIR__ .'/AuditLogOperation.php',
        'Jp\YahooApis\SS\V201909\AuditLog\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AuditLog\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AuditLog\addJob' => __DIR__ .'/addJob.php',
        'Jp\YahooApis\SS\V201909\AuditLog\addJobResponse' => __DIR__ .'/addJobResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_456005ac98416ebfa9b141ee6ba9267f');

// Do nothing. The rest is just leftovers from the code generation.
{
}
