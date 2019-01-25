<?php


 function autoload_77fae4a2db15884314c0794c72e47c62($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetService' => __DIR__ .'/CampaignSharedSetService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSet' => __DIR__ .'/CampaignSharedSet.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetSelector' => __DIR__ .'/CampaignSharedSetSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetPage' => __DIR__ .'/CampaignSharedSetPage.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetValues' => __DIR__ .'/CampaignSharedSetValues.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetOperation' => __DIR__ .'/CampaignSharedSetOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetReturnValue' => __DIR__ .'/CampaignSharedSetReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignSharedSet\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_77fae4a2db15884314c0794c72e47c62');

// Do nothing. The rest is just leftovers from the code generation.
{
}
