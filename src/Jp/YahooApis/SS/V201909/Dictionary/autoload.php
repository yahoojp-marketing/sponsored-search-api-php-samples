<?php


 function autoload_004d9a678d92a92873527b978029a24b($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\Dictionary\DictionaryService' => __DIR__ .'/DictionaryService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReasonSelector' => __DIR__ .'/DisapprovalReasonSelector.php',
        'Jp\YahooApis\SS\V201909\Dictionary\GeographicLocationSelector' => __DIR__ .'/GeographicLocationSelector.php',
        'Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReasonPage' => __DIR__ .'/DisapprovalReasonPage.php',
        'Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReasonValues' => __DIR__ .'/DisapprovalReasonValues.php',
        'Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason' => __DIR__ .'/DisapprovalReason.php',
        'Jp\YahooApis\SS\V201909\Dictionary\GeographicLocationPage' => __DIR__ .'/GeographicLocationPage.php',
        'Jp\YahooApis\SS\V201909\Dictionary\GeographicLocationValues' => __DIR__ .'/GeographicLocationValues.php',
        'Jp\YahooApis\SS\V201909\Dictionary\GeographicLocation' => __DIR__ .'/GeographicLocation.php',
        'Jp\YahooApis\SS\V201909\Dictionary\DictionaryLang' => __DIR__ .'/DictionaryLang.php',
        'Jp\YahooApis\SS\V201909\Dictionary\GeographicLocationStatus' => __DIR__ .'/GeographicLocationStatus.php',
        'Jp\YahooApis\SS\V201909\Dictionary\getDisapprovalReason' => __DIR__ .'/getDisapprovalReason.php',
        'Jp\YahooApis\SS\V201909\Dictionary\getDisapprovalReasonResponse' => __DIR__ .'/getDisapprovalReasonResponse.php',
        'Jp\YahooApis\SS\V201909\Dictionary\getGeographicLocation' => __DIR__ .'/getGeographicLocation.php',
        'Jp\YahooApis\SS\V201909\Dictionary\getGeographicLocationResponse' => __DIR__ .'/getGeographicLocationResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_004d9a678d92a92873527b978029a24b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
