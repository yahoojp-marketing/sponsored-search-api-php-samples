<?php


 function autoload_1c9d12e7f33eeb3b335dd0ebbbfc3c84($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierService' => __DIR__ .'/AdGroupBidMultiplierService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector' => __DIR__ .'/AdGroupBidMultiplierSelector.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierPage' => __DIR__ .'/AdGroupBidMultiplierPage.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierValues' => __DIR__ .'/AdGroupBidMultiplierValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplier' => __DIR__ .'/AdGroupBidMultiplier.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierOperation' => __DIR__ .'/AdGroupBidMultiplierOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierReturnValue' => __DIR__ .'/AdGroupBidMultiplierReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\PlatformType' => __DIR__ .'/PlatformType.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\BidMultiplierType' => __DIR__ .'/BidMultiplierType.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1c9d12e7f33eeb3b335dd0ebbbfc3c84');

// Do nothing. The rest is just leftovers from the code generation.
{
}
