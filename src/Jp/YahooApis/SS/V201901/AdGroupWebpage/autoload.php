<?php


 function autoload_1b705bd349dd24dba37c4022784a05b0($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageService' => __DIR__ .'/AdGroupWebpageService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageSelector' => __DIR__ .'/AdGroupWebpageSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpagePage' => __DIR__ .'/AdGroupWebpagePage.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageValues' => __DIR__ .'/AdGroupWebpageValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage' => __DIR__ .'/AdGroupWebpage.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\Webpage' => __DIR__ .'/Webpage.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\WebpageParameter' => __DIR__ .'/WebpageParameter.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\WebpageCondition' => __DIR__ .'/WebpageCondition.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\WebpageConditionType' => __DIR__ .'/WebpageConditionType.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\Bid' => __DIR__ .'/Bid.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\BidSource' => __DIR__ .'/BidSource.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageOperation' => __DIR__ .'/AdGroupWebpageOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageReturnValue' => __DIR__ .'/AdGroupWebpageReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupWebpage\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1b705bd349dd24dba37c4022784a05b0');

// Do nothing. The rest is just leftovers from the code generation.
{
}
