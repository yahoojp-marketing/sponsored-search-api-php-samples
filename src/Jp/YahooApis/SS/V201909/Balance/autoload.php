<?php


 function autoload_61b5fcbceae7d83cd1d6d70cd23b5a7e($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\Balance\BalanceService' => __DIR__ .'/BalanceService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\Balance\BalanceSelector' => __DIR__ .'/BalanceSelector.php',
        'Jp\YahooApis\SS\V201909\Balance\BalancePage' => __DIR__ .'/BalancePage.php',
        'Jp\YahooApis\SS\V201909\Balance\BalanceValues' => __DIR__ .'/BalanceValues.php',
        'Jp\YahooApis\SS\V201909\Balance\Balance' => __DIR__ .'/Balance.php',
        'Jp\YahooApis\SS\V201909\Balance\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\Balance\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_61b5fcbceae7d83cd1d6d70cd23b5a7e');

// Do nothing. The rest is just leftovers from the code generation.
{
}
