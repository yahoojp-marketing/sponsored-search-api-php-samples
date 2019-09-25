<?php


 function autoload_6b2b6a63120edef3601ce8acc3cfc3bf($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelService' => __DIR__ .'/AdGroupAdLabelService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabel' => __DIR__ .'/AdGroupAdLabel.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelValues' => __DIR__ .'/AdGroupAdLabelValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelOperation' => __DIR__ .'/AdGroupAdLabelOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelReturnValue' => __DIR__ .'/AdGroupAdLabelReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupAdLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_6b2b6a63120edef3601ce8acc3cfc3bf');

// Do nothing. The rest is just leftovers from the code generation.
{
}
