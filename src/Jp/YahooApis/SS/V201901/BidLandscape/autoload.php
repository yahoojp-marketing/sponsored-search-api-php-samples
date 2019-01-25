<?php


 function autoload_0233338cd36421ee1decd9703fa283ba($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeService' => __DIR__ .'/BidLandscapeService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector' => __DIR__ .'/BidLandscapeSelector.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\SimType' => __DIR__ .'/SimType.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapePage' => __DIR__ .'/BidLandscapePage.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeValues' => __DIR__ .'/BidLandscapeValues.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\BidLandscape' => __DIR__ .'/BidLandscape.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\AdGroupBidLandscape' => __DIR__ .'/AdGroupBidLandscape.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\CriterionBidLandscape' => __DIR__ .'/CriterionBidLandscape.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\AdGroupBidLandscapeType' => __DIR__ .'/AdGroupBidLandscapeType.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\LandscapePoints' => __DIR__ .'/LandscapePoints.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\BidLandscape\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_0233338cd36421ee1decd9703fa283ba');

// Do nothing. The rest is just leftovers from the code generation.
{
}
