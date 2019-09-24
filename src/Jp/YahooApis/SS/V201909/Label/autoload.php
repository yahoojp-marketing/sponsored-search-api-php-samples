<?php


 function autoload_3857e712d60c9c16caf0dee5a128c471($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\Label\LabelService' => __DIR__ .'/LabelService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\Label\LabelSelector' => __DIR__ .'/LabelSelector.php',
        'Jp\YahooApis\SS\V201909\Label\CountLabeledEntity' => __DIR__ .'/CountLabeledEntity.php',
        'Jp\YahooApis\SS\V201909\Label\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201909\Label\LabelPage' => __DIR__ .'/LabelPage.php',
        'Jp\YahooApis\SS\V201909\Label\LabelValues' => __DIR__ .'/LabelValues.php',
        'Jp\YahooApis\SS\V201909\Label\LabelOperation' => __DIR__ .'/LabelOperation.php',
        'Jp\YahooApis\SS\V201909\Label\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\Label\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\Label\LabelReturnValue' => __DIR__ .'/LabelReturnValue.php',
        'Jp\YahooApis\SS\V201909\Label\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\Label\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\Label\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\Label\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_3857e712d60c9c16caf0dee5a128c471');

// Do nothing. The rest is just leftovers from the code generation.
{
}
