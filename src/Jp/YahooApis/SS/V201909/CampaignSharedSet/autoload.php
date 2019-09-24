<?php


 function autoload_e4ccc3cac579b8f26e50f0fb4f48fc09($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetService' => __DIR__ .'/CampaignSharedSetService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet' => __DIR__ .'/CampaignSharedSet.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetSelector' => __DIR__ .'/CampaignSharedSetSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetPage' => __DIR__ .'/CampaignSharedSetPage.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetValues' => __DIR__ .'/CampaignSharedSetValues.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetOperation' => __DIR__ .'/CampaignSharedSetOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetReturnValue' => __DIR__ .'/CampaignSharedSetReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignSharedSet\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e4ccc3cac579b8f26e50f0fb4f48fc09');

// Do nothing. The rest is just leftovers from the code generation.
{
}
