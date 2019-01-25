<?php


 function autoload_0d8ce98176aa4e12019474078d3d51cd($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\Report\ReportService' => __DIR__ .'/ReportService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\Report\ReportSelector' => __DIR__ .'/ReportSelector.php',
        'Jp\YahooApis\SS\V201901\Report\ReportType' => __DIR__ .'/ReportType.php',
        'Jp\YahooApis\SS\V201901\Report\ReportJobStatus' => __DIR__ .'/ReportJobStatus.php',
        'Jp\YahooApis\SS\V201901\Report\ReportRecord' => __DIR__ .'/ReportRecord.php',
        'Jp\YahooApis\SS\V201901\Report\ReportPage' => __DIR__ .'/ReportPage.php',
        'Jp\YahooApis\SS\V201901\Report\ReportValues' => __DIR__ .'/ReportValues.php',
        'Jp\YahooApis\SS\V201901\Report\ReportOperation' => __DIR__ .'/ReportOperation.php',
        'Jp\YahooApis\SS\V201901\Report\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\Report\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\Report\ReportReturnValue' => __DIR__ .'/ReportReturnValue.php',
        'Jp\YahooApis\SS\V201901\Report\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\Report\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\Report\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\Report\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_0d8ce98176aa4e12019474078d3d51cd');

// Do nothing. The rest is just leftovers from the code generation.
{
}
