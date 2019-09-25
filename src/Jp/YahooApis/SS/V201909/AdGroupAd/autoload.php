<?php


 function autoload_75adad92dbdee855824df2b288273264($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdService' => __DIR__ .'/AdGroupAdService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSelector' => __DIR__ .'/AdGroupAdSelector.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\ContainsLabelId' => __DIR__ .'/ContainsLabelId.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdPage' => __DIR__ .'/AdGroupAdPage.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdValues' => __DIR__ .'/AdGroupAdValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd' => __DIR__ .'/AdGroupAd.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\Ad' => __DIR__ .'/Ad.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedUrls' => __DIR__ .'/AdGroupAdAdditionalAdvancedUrls.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedMobileUrls' => __DIR__ .'/AdGroupAdAdditionalAdvancedMobileUrls.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdType' => __DIR__ .'/AdType.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\TextAd2' => __DIR__ .'/TextAd2.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AppAd' => __DIR__ .'/AppAd.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\ExtendedTextAd' => __DIR__ .'/ExtendedTextAd.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\DynamicSearchLinkedAd' => __DIR__ .'/DynamicSearchLinkedAd.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\TrademarkStatus' => __DIR__ .'/TrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\DevicePreference' => __DIR__ .'/DevicePreference.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AppStore' => __DIR__ .'/AppStore.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdOperation' => __DIR__ .'/AdGroupAdOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdReturnValue' => __DIR__ .'/AdGroupAdReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatusOperation' => __DIR__ .'/AdGroupAdSetTrademarkStatusOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatus' => __DIR__ .'/AdGroupAdSetTrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\mutateResponse' => __DIR__ .'/mutateResponse.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\setTrademarkStatus' => __DIR__ .'/setTrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\AdGroupAd\setTrademarkStatusResponse' => __DIR__ .'/setTrademarkStatusResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_75adad92dbdee855824df2b288273264');

// Do nothing. The rest is just leftovers from the code generation.
{
}
