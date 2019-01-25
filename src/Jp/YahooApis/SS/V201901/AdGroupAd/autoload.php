<?php


 function autoload_4710042ead7e9b44b78dad9dfb8b49ae($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdService' => __DIR__ .'/AdGroupAdService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector' => __DIR__ .'/AdGroupAdSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\ContainsLabelId' => __DIR__ .'/ContainsLabelId.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdPage' => __DIR__ .'/AdGroupAdPage.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdValues' => __DIR__ .'/AdGroupAdValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAd' => __DIR__ .'/AdGroupAd.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\Ad' => __DIR__ .'/Ad.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdAdditionalAdvancedUrls' => __DIR__ .'/AdGroupAdAdditionalAdvancedUrls.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdAdditionalAdvancedMobileUrls' => __DIR__ .'/AdGroupAdAdditionalAdvancedMobileUrls.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdType' => __DIR__ .'/AdType.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\TextAd2' => __DIR__ .'/TextAd2.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AppAd' => __DIR__ .'/AppAd.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\ExtendedTextAd' => __DIR__ .'/ExtendedTextAd.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\DynamicSearchLinkedAd' => __DIR__ .'/DynamicSearchLinkedAd.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\TrademarkStatus' => __DIR__ .'/TrademarkStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\DevicePreference' => __DIR__ .'/DevicePreference.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AppStore' => __DIR__ .'/AppStore.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdOperation' => __DIR__ .'/AdGroupAdOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdReturnValue' => __DIR__ .'/AdGroupAdReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupAd\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_4710042ead7e9b44b78dad9dfb8b49ae');

// Do nothing. The rest is just leftovers from the code generation.
{
}
