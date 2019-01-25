<?php


 function autoload_c3dc0fd1c586188d0de28602cfb64fb5($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelService' => __DIR__ .'/CampaignLabelService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabel' => __DIR__ .'/CampaignLabel.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelValues' => __DIR__ .'/CampaignLabelValues.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelOperation' => __DIR__ .'/CampaignLabelOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelReturnValue' => __DIR__ .'/CampaignLabelReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignLabel\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_c3dc0fd1c586188d0de28602cfb64fb5');

// Do nothing. The rest is just leftovers from the code generation.
{
}
