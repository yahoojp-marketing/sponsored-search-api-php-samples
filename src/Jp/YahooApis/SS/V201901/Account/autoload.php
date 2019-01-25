<?php


 function autoload_6915853a9426e137d81a8f95c160601b($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\Account\AccountService' => __DIR__ .'/AccountService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\Account\AccountSelector' => __DIR__ .'/AccountSelector.php',
        'Jp\YahooApis\SS\V201901\Account\AccountPage' => __DIR__ .'/AccountPage.php',
        'Jp\YahooApis\SS\V201901\Account\AccountValues' => __DIR__ .'/AccountValues.php',
        'Jp\YahooApis\SS\V201901\Account\Account' => __DIR__ .'/Account.php',
        'Jp\YahooApis\SS\V201901\Account\AccountBudget' => __DIR__ .'/AccountBudget.php',
        'Jp\YahooApis\SS\V201901\Account\LimitChargeType' => __DIR__ .'/LimitChargeType.php',
        'Jp\YahooApis\SS\V201901\Account\AccountType' => __DIR__ .'/AccountType.php',
        'Jp\YahooApis\SS\V201901\Account\DeliveryStatus' => __DIR__ .'/DeliveryStatus.php',
        'Jp\YahooApis\SS\V201901\Account\AccountStatus' => __DIR__ .'/AccountStatus.php',
        'Jp\YahooApis\SS\V201901\Account\AutoTaggingEnabled' => __DIR__ .'/AutoTaggingEnabled.php',
        'Jp\YahooApis\SS\V201901\Account\AccountOperation' => __DIR__ .'/AccountOperation.php',
        'Jp\YahooApis\SS\V201901\Account\AccountReturnValue' => __DIR__ .'/AccountReturnValue.php',
        'Jp\YahooApis\SS\V201901\Account\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\Account\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\Account\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\Account\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\Account\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\Account\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_6915853a9426e137d81a8f95c160601b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
