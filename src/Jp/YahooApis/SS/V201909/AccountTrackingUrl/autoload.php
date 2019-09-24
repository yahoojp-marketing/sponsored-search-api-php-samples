<?php


 function autoload_b172664078d62e84022b4c8a1ab23289($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlService' => __DIR__ .'/AccountTrackingUrlService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlSelector' => __DIR__ .'/AccountTrackingUrlSelector.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlPage' => __DIR__ .'/AccountTrackingUrlPage.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlValues' => __DIR__ .'/AccountTrackingUrlValues.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl' => __DIR__ .'/AccountTrackingUrl.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\UrlApprovalStatus' => __DIR__ .'/UrlApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlOperation' => __DIR__ .'/AccountTrackingUrlOperation.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlReturnValue' => __DIR__ .'/AccountTrackingUrlReturnValue.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AccountTrackingUrl\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_b172664078d62e84022b4c8a1ab23289');

// Do nothing. The rest is just leftovers from the code generation.
{
}
