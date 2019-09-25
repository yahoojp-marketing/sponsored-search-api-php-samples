<?php


 function autoload_b6ac2122254a3e28e59bee20e2ccc5e0($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedService' => __DIR__ .'/CampaignFeedService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeed' => __DIR__ .'/CampaignFeed.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedList' => __DIR__ .'/CampaignFeedList.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedSelector' => __DIR__ .'/CampaignFeedSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedPlaceholderType' => __DIR__ .'/CampaignFeedPlaceholderType.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedPage' => __DIR__ .'/CampaignFeedPage.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedValues' => __DIR__ .'/CampaignFeedValues.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedOperation' => __DIR__ .'/CampaignFeedOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeedReturnValue' => __DIR__ .'/CampaignFeedReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignFeed\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_b6ac2122254a3e28e59bee20e2ccc5e0');

// Do nothing. The rest is just leftovers from the code generation.
{
}
