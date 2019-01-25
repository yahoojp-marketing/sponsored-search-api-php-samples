<?php


 function autoload_e700b8324e648785586400edf881fce7($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedService' => __DIR__ .'/AdGroupFeedService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeed' => __DIR__ .'/AdGroupFeed.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList' => __DIR__ .'/AdGroupFeedList.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedSelector' => __DIR__ .'/AdGroupFeedSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedPlaceholderType' => __DIR__ .'/AdGroupFeedPlaceholderType.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\DevicePlatform' => __DIR__ .'/DevicePlatform.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedPage' => __DIR__ .'/AdGroupFeedPage.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedValues' => __DIR__ .'/AdGroupFeedValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedOperation' => __DIR__ .'/AdGroupFeedOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedReturnValue' => __DIR__ .'/AdGroupFeedReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupFeed\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e700b8324e648785586400edf881fce7');

// Do nothing. The rest is just leftovers from the code generation.
{
}
