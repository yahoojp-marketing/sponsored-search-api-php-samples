<?php


 function autoload_fc2976a87987cbf80b91be041bf720a7($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\AdGroupAdLabelService' => __DIR__ .'/AdGroupAdLabelService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\AdGroupAdLabel' => __DIR__ .'/AdGroupAdLabel.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\AdGroupAdLabelValues' => __DIR__ .'/AdGroupAdLabelValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\AdGroupAdLabelOperation' => __DIR__ .'/AdGroupAdLabelOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\AdGroupAdLabelReturnValue' => __DIR__ .'/AdGroupAdLabelReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupAdLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_fc2976a87987cbf80b91be041bf720a7');

// Do nothing. The rest is just leftovers from the code generation.
{
}
