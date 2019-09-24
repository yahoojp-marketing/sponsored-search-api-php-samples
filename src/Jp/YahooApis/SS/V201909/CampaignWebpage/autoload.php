<?php


 function autoload_1fb27535caa73708c590a22539e8f334($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageService' => __DIR__ .'/CampaignWebpageService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageSelector' => __DIR__ .'/CampaignWebpageSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpagePage' => __DIR__ .'/CampaignWebpagePage.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageValues' => __DIR__ .'/CampaignWebpageValues.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpage' => __DIR__ .'/CampaignWebpage.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\Webpage' => __DIR__ .'/Webpage.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\WebpageParameter' => __DIR__ .'/WebpageParameter.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\WebpageCondition' => __DIR__ .'/WebpageCondition.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\WebpageConditionType' => __DIR__ .'/WebpageConditionType.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageOperation' => __DIR__ .'/CampaignWebpageOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageReturnValue' => __DIR__ .'/CampaignWebpageReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignWebpage\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1fb27535caa73708c590a22539e8f334');

// Do nothing. The rest is just leftovers from the code generation.
{
}
