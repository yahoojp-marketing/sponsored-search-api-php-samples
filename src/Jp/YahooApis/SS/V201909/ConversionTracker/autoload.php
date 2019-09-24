<?php


 function autoload_9616d2f22d4cf8d4ae5390a75d064bbf($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerService' => __DIR__ .'/ConversionTrackerService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerSelector' => __DIR__ .'/ConversionTrackerSelector.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionDateRange' => __DIR__ .'/ConversionDateRange.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker' => __DIR__ .'/ConversionTracker.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\WebConversion' => __DIR__ .'/WebConversion.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\AppConversion' => __DIR__ .'/AppConversion.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\AppPostbackUrl' => __DIR__ .'/AppPostbackUrl.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerStatus' => __DIR__ .'/ConversionTrackerStatus.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerType' => __DIR__ .'/ConversionTrackerType.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\TrackingCodeType' => __DIR__ .'/TrackingCodeType.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerCategory' => __DIR__ .'/ConversionTrackerCategory.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\MarkupLanguage' => __DIR__ .'/MarkupLanguage.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\AppPlatform' => __DIR__ .'/AppPlatform.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\AppConversionType' => __DIR__ .'/AppConversionType.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\AppPostbackUrlClearFlag' => __DIR__ .'/AppPostbackUrlClearFlag.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionCountingType' => __DIR__ .'/ConversionCountingType.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ExcludeFromBidding' => __DIR__ .'/ExcludeFromBidding.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage' => __DIR__ .'/ConversionTrackerPage.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerValues' => __DIR__ .'/ConversionTrackerValues.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerOperation' => __DIR__ .'/ConversionTrackerOperation.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerReturnValue' => __DIR__ .'/ConversionTrackerReturnValue.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\ConversionTracker\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_9616d2f22d4cf8d4ae5390a75d064bbf');

// Do nothing. The rest is just leftovers from the code generation.
{
}
