<?php


 function autoload_a6a844dd9d66eb889e123277763c0da3($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\Balance\BalanceService' => __DIR__ .'/BalanceService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\Balance\BalanceSelector' => __DIR__ .'/BalanceSelector.php',
        'Jp\YahooApis\SS\V201901\Balance\BalancePage' => __DIR__ .'/BalancePage.php',
        'Jp\YahooApis\SS\V201901\Balance\BalanceValues' => __DIR__ .'/BalanceValues.php',
        'Jp\YahooApis\SS\V201901\Balance\Balance' => __DIR__ .'/Balance.php',
        'Jp\YahooApis\SS\V201901\Balance\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\Balance\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a6a844dd9d66eb889e123277763c0da3');

// Do nothing. The rest is just leftovers from the code generation.
{
}
