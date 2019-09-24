<?php


 function autoload_629bc1ef80067019908bf9aec09a6745($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionService' => __DIR__ .'/SharedCriterionService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion' => __DIR__ .'/SharedCriterion.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionUse' => __DIR__ .'/SharedCriterionUse.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector' => __DIR__ .'/SharedCriterionSelector.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionValues' => __DIR__ .'/SharedCriterionValues.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionPage' => __DIR__ .'/SharedCriterionPage.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionOperation' => __DIR__ .'/SharedCriterionOperation.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionReturnValue' => __DIR__ .'/SharedCriterionReturnValue.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\SharedCriterion\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_629bc1ef80067019908bf9aec09a6745');

// Do nothing. The rest is just leftovers from the code generation.
{
}
