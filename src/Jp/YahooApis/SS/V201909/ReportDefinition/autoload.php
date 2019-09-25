<?php


 function autoload_ee068cd6596ec406dd77026a153a26ef($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionService' => __DIR__ .'/ReportDefinitionService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionSelector' => __DIR__ .'/ReportDefinitionSelector.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportFieldAttribute' => __DIR__ .'/ReportFieldAttribute.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinition' => __DIR__ .'/ReportDefinition.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDateRange' => __DIR__ .'/ReportDateRange.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportSortField' => __DIR__ .'/ReportSortField.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportFilter' => __DIR__ .'/ReportFilter.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportType' => __DIR__ .'/ReportType.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportJobStatus' => __DIR__ .'/ReportJobStatus.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDateRangeType' => __DIR__ .'/ReportDateRangeType.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportSortType' => __DIR__ .'/ReportSortType.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportOperator' => __DIR__ .'/ReportOperator.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDownloadFormat' => __DIR__ .'/ReportDownloadFormat.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDownloadEncode' => __DIR__ .'/ReportDownloadEncode.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportLanguage' => __DIR__ .'/ReportLanguage.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportCompressType' => __DIR__ .'/ReportCompressType.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportIncludeZeroImpressions' => __DIR__ .'/ReportIncludeZeroImpressions.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportIncludeDeleted' => __DIR__ .'/ReportIncludeDeleted.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionFieldValue' => __DIR__ .'/ReportDefinitionFieldValue.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionPage' => __DIR__ .'/ReportDefinitionPage.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionValues' => __DIR__ .'/ReportDefinitionValues.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionOperation' => __DIR__ .'/ReportDefinitionOperation.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionReturnValue' => __DIR__ .'/ReportDefinitionReturnValue.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\getReportFields' => __DIR__ .'/getReportFields.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\getReportFieldsResponse' => __DIR__ .'/getReportFieldsResponse.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\ReportDefinition\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_ee068cd6596ec406dd77026a153a26ef');

// Do nothing. The rest is just leftovers from the code generation.
{
}
