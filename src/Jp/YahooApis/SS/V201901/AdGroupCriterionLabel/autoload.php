<?php


 function autoload_9077af2c318ed47899c78e5777867f7a($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabelService' => __DIR__ .'/AdGroupCriterionLabelService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabel' => __DIR__ .'/AdGroupCriterionLabel.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabelValues' => __DIR__ .'/AdGroupCriterionLabelValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabelOperation' => __DIR__ .'/AdGroupCriterionLabelOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabelReturnValue' => __DIR__ .'/AdGroupCriterionLabelReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_9077af2c318ed47899c78e5777867f7a');

// Do nothing. The rest is just leftovers from the code generation.
{
}
