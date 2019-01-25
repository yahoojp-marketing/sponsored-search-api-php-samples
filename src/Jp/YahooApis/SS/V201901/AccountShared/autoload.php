<?php


 function autoload_a47862f9577a9dd8f403a2fd4a8a6780($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedService' => __DIR__ .'/AccountSharedService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountShared' => __DIR__ .'/AccountShared.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedSelector' => __DIR__ .'/AccountSharedSelector.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedPage' => __DIR__ .'/AccountSharedPage.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedValues' => __DIR__ .'/AccountSharedValues.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedOperation' => __DIR__ .'/AccountSharedOperation.php',
        'Jp\YahooApis\SS\V201901\AccountShared\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AccountShared\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AccountShared\AccountSharedReturnValue' => __DIR__ .'/AccountSharedReturnValue.php',
        'Jp\YahooApis\SS\V201901\AccountShared\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AccountShared\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AccountShared\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AccountShared\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a47862f9577a9dd8f403a2fd4a8a6780');

// Do nothing. The rest is just leftovers from the code generation.
{
}
