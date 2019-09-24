<?php


 function autoload_66acf10f53c252bfcf0b4544577018e6($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedService' => __DIR__ .'/AccountSharedService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountShared' => __DIR__ .'/AccountShared.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedSelector' => __DIR__ .'/AccountSharedSelector.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedPage' => __DIR__ .'/AccountSharedPage.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedValues' => __DIR__ .'/AccountSharedValues.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedOperation' => __DIR__ .'/AccountSharedOperation.php',
        'Jp\YahooApis\SS\V201909\AccountShared\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AccountShared\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AccountShared\AccountSharedReturnValue' => __DIR__ .'/AccountSharedReturnValue.php',
        'Jp\YahooApis\SS\V201909\AccountShared\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AccountShared\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AccountShared\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AccountShared\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_66acf10f53c252bfcf0b4544577018e6');

// Do nothing. The rest is just leftovers from the code generation.
{
}
