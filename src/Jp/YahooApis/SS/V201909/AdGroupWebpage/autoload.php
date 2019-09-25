<?php


 function autoload_d43ec37a65339e479bd2a1abb3d639ca($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageService' => __DIR__ .'/AdGroupWebpageService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageSelector' => __DIR__ .'/AdGroupWebpageSelector.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpagePage' => __DIR__ .'/AdGroupWebpagePage.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageValues' => __DIR__ .'/AdGroupWebpageValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpage' => __DIR__ .'/AdGroupWebpage.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\Webpage' => __DIR__ .'/Webpage.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\WebpageParameter' => __DIR__ .'/WebpageParameter.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\WebpageCondition' => __DIR__ .'/WebpageCondition.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\WebpageConditionType' => __DIR__ .'/WebpageConditionType.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\Bid' => __DIR__ .'/Bid.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\BidSource' => __DIR__ .'/BidSource.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageOperation' => __DIR__ .'/AdGroupWebpageOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageReturnValue' => __DIR__ .'/AdGroupWebpageReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupWebpage\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d43ec37a65339e479bd2a1abb3d639ca');

// Do nothing. The rest is just leftovers from the code generation.
{
}
