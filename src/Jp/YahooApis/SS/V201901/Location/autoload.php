<?php


 function autoload_b4a5d6e325e29145bb00b6b3d8c3a6b1($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\Location\LocationService' => __DIR__ .'/LocationService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\Location\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\Location\LocationReturnValue' => __DIR__ .'/LocationReturnValue.php',
        'Jp\YahooApis\SS\V201901\Location\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_b4a5d6e325e29145bb00b6b3d8c3a6b1');

// Do nothing. The rest is just leftovers from the code generation.
{
}
