<?php


 function autoload_1611de4e9adb8657b1bc1bf0f7d8e515($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedService' => __DIR__ .'/CampaignFeedService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeed' => __DIR__ .'/CampaignFeed.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList' => __DIR__ .'/CampaignFeedList.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedSelector' => __DIR__ .'/CampaignFeedSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedPlaceholderType' => __DIR__ .'/CampaignFeedPlaceholderType.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\DevicePlatform' => __DIR__ .'/DevicePlatform.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedPage' => __DIR__ .'/CampaignFeedPage.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedValues' => __DIR__ .'/CampaignFeedValues.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedOperation' => __DIR__ .'/CampaignFeedOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedReturnValue' => __DIR__ .'/CampaignFeedReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignFeed\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1611de4e9adb8657b1bc1bf0f7d8e515');

// Do nothing. The rest is just leftovers from the code generation.
{
}
