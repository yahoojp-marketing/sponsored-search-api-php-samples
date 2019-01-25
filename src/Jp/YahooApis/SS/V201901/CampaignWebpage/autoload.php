<?php


 function autoload_ce08175db152a5956ee4e644f7fe69e4($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageService' => __DIR__ .'/CampaignWebpageService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageSelector' => __DIR__ .'/CampaignWebpageSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpagePage' => __DIR__ .'/CampaignWebpagePage.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageValues' => __DIR__ .'/CampaignWebpageValues.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpage' => __DIR__ .'/CampaignWebpage.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\Webpage' => __DIR__ .'/Webpage.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\WebpageParameter' => __DIR__ .'/WebpageParameter.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\WebpageCondition' => __DIR__ .'/WebpageCondition.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\WebpageConditionType' => __DIR__ .'/WebpageConditionType.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageOperation' => __DIR__ .'/CampaignWebpageOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageReturnValue' => __DIR__ .'/CampaignWebpageReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignWebpage\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_ce08175db152a5956ee4e644f7fe69e4');

// Do nothing. The rest is just leftovers from the code generation.
{
}
