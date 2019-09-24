<?php


 function autoload_0d4ad742f6b0bd67fcadd05af9076b9b($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\BidLandscape\BidLandscapeService' => __DIR__ .'/BidLandscapeService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\BidLandscapeSelector' => __DIR__ .'/BidLandscapeSelector.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\SimType' => __DIR__ .'/SimType.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\BidLandscapePage' => __DIR__ .'/BidLandscapePage.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\BidLandscapeValues' => __DIR__ .'/BidLandscapeValues.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape' => __DIR__ .'/BidLandscape.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\AdGroupBidLandscape' => __DIR__ .'/AdGroupBidLandscape.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\CriterionBidLandscape' => __DIR__ .'/CriterionBidLandscape.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\AdGroupBidLandscapeType' => __DIR__ .'/AdGroupBidLandscapeType.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints' => __DIR__ .'/LandscapePoints.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\BidLandscape\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_0d4ad742f6b0bd67fcadd05af9076b9b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
