<?php


 function autoload_a6420274e382bde6df9b662dfefcc541($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlService' => __DIR__ .'/AccountTrackingUrlService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlSelector' => __DIR__ .'/AccountTrackingUrlSelector.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlPage' => __DIR__ .'/AccountTrackingUrlPage.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlValues' => __DIR__ .'/AccountTrackingUrlValues.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrl' => __DIR__ .'/AccountTrackingUrl.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\UrlApprovalStatus' => __DIR__ .'/UrlApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlOperation' => __DIR__ .'/AccountTrackingUrlOperation.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlReturnValue' => __DIR__ .'/AccountTrackingUrlReturnValue.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AccountTrackingUrl\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a6420274e382bde6df9b662dfefcc541');

// Do nothing. The rest is just leftovers from the code generation.
{
}
