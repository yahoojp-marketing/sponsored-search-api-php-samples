<?php


 function autoload_012c21077c631ae66fdfcb8476fd7a22($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionService' => __DIR__ .'/ReportDefinitionService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionSelector' => __DIR__ .'/ReportDefinitionSelector.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinition' => __DIR__ .'/ReportDefinition.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportFieldAttribute' => __DIR__ .'/ReportFieldAttribute.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDateRange' => __DIR__ .'/ReportDateRange.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportSortField' => __DIR__ .'/ReportSortField.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportFilter' => __DIR__ .'/ReportFilter.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportType' => __DIR__ .'/ReportType.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDateRangeType' => __DIR__ .'/ReportDateRangeType.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportSortType' => __DIR__ .'/ReportSortType.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportOperator' => __DIR__ .'/ReportOperator.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportIsTemplate' => __DIR__ .'/ReportIsTemplate.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportIntervalType' => __DIR__ .'/ReportIntervalType.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDownloadFormat' => __DIR__ .'/ReportDownloadFormat.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDownloadEncode' => __DIR__ .'/ReportDownloadEncode.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportLanguage' => __DIR__ .'/ReportLanguage.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportCompressType' => __DIR__ .'/ReportCompressType.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportIncludeZeroImpressions' => __DIR__ .'/ReportIncludeZeroImpressions.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportIncludeDeleted' => __DIR__ .'/ReportIncludeDeleted.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionPage' => __DIR__ .'/ReportDefinitionPage.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionValues' => __DIR__ .'/ReportDefinitionValues.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionOperation' => __DIR__ .'/ReportDefinitionOperation.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionReturnValue' => __DIR__ .'/ReportDefinitionReturnValue.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionFieldValue' => __DIR__ .'/ReportDefinitionFieldValue.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\mutateResponse' => __DIR__ .'/mutateResponse.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\getReportFields' => __DIR__ .'/getReportFields.php',
        'Jp\YahooApis\SS\V201901\ReportDefinition\getReportFieldsResponse' => __DIR__ .'/getReportFieldsResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_012c21077c631ae66fdfcb8476fd7a22');

// Do nothing. The rest is just leftovers from the code generation.
{
}
