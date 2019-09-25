<?php


 function autoload_14edc69bfb3a58ad7fe99e86003dd9bf($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignLabel\CampaignLabelService' => __DIR__ .'/CampaignLabelService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\CampaignLabel' => __DIR__ .'/CampaignLabel.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\CampaignLabelValues' => __DIR__ .'/CampaignLabelValues.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\CampaignLabelOperation' => __DIR__ .'/CampaignLabelOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\CampaignLabelReturnValue' => __DIR__ .'/CampaignLabelReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_14edc69bfb3a58ad7fe99e86003dd9bf');

// Do nothing. The rest is just leftovers from the code generation.
{
}
