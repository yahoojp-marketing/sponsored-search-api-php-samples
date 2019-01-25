<?php


 function autoload_f04835b3b91f49ad87720d0d510dfd24($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelService' => __DIR__ .'/AdGroupLabelService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabel' => __DIR__ .'/AdGroupLabel.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelValues' => __DIR__ .'/AdGroupLabelValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelOperation' => __DIR__ .'/AdGroupLabelOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelReturnValue' => __DIR__ .'/AdGroupLabelReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_f04835b3b91f49ad87720d0d510dfd24');

// Do nothing. The rest is just leftovers from the code generation.
{
}
