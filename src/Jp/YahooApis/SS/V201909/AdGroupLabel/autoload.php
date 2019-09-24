<?php


 function autoload_808e50da6884b0b72db15ab69c5435d3($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabelService' => __DIR__ .'/AdGroupLabelService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabel' => __DIR__ .'/AdGroupLabel.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabelValues' => __DIR__ .'/AdGroupLabelValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabelOperation' => __DIR__ .'/AdGroupLabelOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabelReturnValue' => __DIR__ .'/AdGroupLabelReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_808e50da6884b0b72db15ab69c5435d3');

// Do nothing. The rest is just leftovers from the code generation.
{
}
