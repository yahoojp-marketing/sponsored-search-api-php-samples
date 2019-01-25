<?php


 function autoload_f6619fd77dfdde5707746028f8fe0e27($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\Dictionary\DictionaryService' => __DIR__ .'/DictionaryService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\Dictionary\DisapprovalReasonSelector' => __DIR__ .'/DisapprovalReasonSelector.php',
        'Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationSelector' => __DIR__ .'/GeographicLocationSelector.php',
        'Jp\YahooApis\SS\V201901\Dictionary\DisapprovalReasonPage' => __DIR__ .'/DisapprovalReasonPage.php',
        'Jp\YahooApis\SS\V201901\Dictionary\DisapprovalReasonValues' => __DIR__ .'/DisapprovalReasonValues.php',
        'Jp\YahooApis\SS\V201901\Dictionary\DisapprovalReason' => __DIR__ .'/DisapprovalReason.php',
        'Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationPage' => __DIR__ .'/GeographicLocationPage.php',
        'Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationValues' => __DIR__ .'/GeographicLocationValues.php',
        'Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation' => __DIR__ .'/GeographicLocation.php',
        'Jp\YahooApis\SS\V201901\Dictionary\DictionaryLang' => __DIR__ .'/DictionaryLang.php',
        'Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationStatus' => __DIR__ .'/GeographicLocationStatus.php',
        'Jp\YahooApis\SS\V201901\Dictionary\getDisapprovalReason' => __DIR__ .'/getDisapprovalReason.php',
        'Jp\YahooApis\SS\V201901\Dictionary\getDisapprovalReasonResponse' => __DIR__ .'/getDisapprovalReasonResponse.php',
        'Jp\YahooApis\SS\V201901\Dictionary\getGeographicLocation' => __DIR__ .'/getGeographicLocation.php',
        'Jp\YahooApis\SS\V201901\Dictionary\getGeographicLocationResponse' => __DIR__ .'/getGeographicLocationResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_f6619fd77dfdde5707746028f8fe0e27');

// Do nothing. The rest is just leftovers from the code generation.
{
}
