<?php


 function autoload_42e38b2219c75419a86ec0e60bc03ca5($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerService' => __DIR__ .'/ConversionTrackerService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector' => __DIR__ .'/ConversionTrackerSelector.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionDateRange' => __DIR__ .'/ConversionDateRange.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTracker' => __DIR__ .'/ConversionTracker.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\WebConversion' => __DIR__ .'/WebConversion.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion' => __DIR__ .'/AppConversion.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\AppPostbackUrl' => __DIR__ .'/AppPostbackUrl.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerStatus' => __DIR__ .'/ConversionTrackerStatus.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerType' => __DIR__ .'/ConversionTrackerType.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\TrackingCodeType' => __DIR__ .'/TrackingCodeType.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerCategory' => __DIR__ .'/ConversionTrackerCategory.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\MarkupLanguage' => __DIR__ .'/MarkupLanguage.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\AppPlatform' => __DIR__ .'/AppPlatform.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\AppConversionType' => __DIR__ .'/AppConversionType.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\AppPostbackUrlClearFlag' => __DIR__ .'/AppPostbackUrlClearFlag.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionCountingType' => __DIR__ .'/ConversionCountingType.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ExcludeFromBidding' => __DIR__ .'/ExcludeFromBidding.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerPage' => __DIR__ .'/ConversionTrackerPage.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerValues' => __DIR__ .'/ConversionTrackerValues.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerOperation' => __DIR__ .'/ConversionTrackerOperation.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerReturnValue' => __DIR__ .'/ConversionTrackerReturnValue.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\ConversionTracker\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_42e38b2219c75419a86ec0e60bc03ca5');

// Do nothing. The rest is just leftovers from the code generation.
{
}
