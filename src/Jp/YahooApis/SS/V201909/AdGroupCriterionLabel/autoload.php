<?php


 function autoload_327559a5f3852a7b0586ec6cad42ae9c($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\AdGroupCriterionLabelService' => __DIR__ .'/AdGroupCriterionLabelService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\AdGroupCriterionLabel' => __DIR__ .'/AdGroupCriterionLabel.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\AdGroupCriterionLabelValues' => __DIR__ .'/AdGroupCriterionLabelValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\AdGroupCriterionLabelOperation' => __DIR__ .'/AdGroupCriterionLabelOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\AdGroupCriterionLabelReturnValue' => __DIR__ .'/AdGroupCriterionLabelReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_327559a5f3852a7b0586ec6cad42ae9c');

// Do nothing. The rest is just leftovers from the code generation.
{
}
