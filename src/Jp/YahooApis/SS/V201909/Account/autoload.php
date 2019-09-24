<?php


 function autoload_3c2d25b884c9620ea99867d482f59db2($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\Account\AccountService' => __DIR__ .'/AccountService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\Account\AccountSelector' => __DIR__ .'/AccountSelector.php',
        'Jp\YahooApis\SS\V201909\Account\AccountPage' => __DIR__ .'/AccountPage.php',
        'Jp\YahooApis\SS\V201909\Account\AccountValues' => __DIR__ .'/AccountValues.php',
        'Jp\YahooApis\SS\V201909\Account\Account' => __DIR__ .'/Account.php',
        'Jp\YahooApis\SS\V201909\Account\AccountBudget' => __DIR__ .'/AccountBudget.php',
        'Jp\YahooApis\SS\V201909\Account\LimitChargeType' => __DIR__ .'/LimitChargeType.php',
        'Jp\YahooApis\SS\V201909\Account\AccountType' => __DIR__ .'/AccountType.php',
        'Jp\YahooApis\SS\V201909\Account\DeliveryStatus' => __DIR__ .'/DeliveryStatus.php',
        'Jp\YahooApis\SS\V201909\Account\AccountStatus' => __DIR__ .'/AccountStatus.php',
        'Jp\YahooApis\SS\V201909\Account\AutoTaggingEnabled' => __DIR__ .'/AutoTaggingEnabled.php',
        'Jp\YahooApis\SS\V201909\Account\AccountOperation' => __DIR__ .'/AccountOperation.php',
        'Jp\YahooApis\SS\V201909\Account\AccountReturnValue' => __DIR__ .'/AccountReturnValue.php',
        'Jp\YahooApis\SS\V201909\Account\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\Account\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\Account\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\Account\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\Account\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\Account\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_3c2d25b884c9620ea99867d482f59db2');

// Do nothing. The rest is just leftovers from the code generation.
{
}
