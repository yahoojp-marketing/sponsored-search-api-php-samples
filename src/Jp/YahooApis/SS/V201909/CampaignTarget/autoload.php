<?php


 function autoload_16bc145a92a3e1df580e9e6f15f11b2b($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetService' => __DIR__ .'/CampaignTargetService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetSelector' => __DIR__ .'/CampaignTargetSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetPage' => __DIR__ .'/CampaignTargetPage.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTarget' => __DIR__ .'/CampaignTarget.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\Target' => __DIR__ .'/Target.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\TargetType' => __DIR__ .'/TargetType.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\DayOfWeek' => __DIR__ .'/DayOfWeek.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\MinuteOfHour' => __DIR__ .'/MinuteOfHour.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\ScheduleTarget' => __DIR__ .'/ScheduleTarget.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\NetworkTarget' => __DIR__ .'/NetworkTarget.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\NetworkCoverageType' => __DIR__ .'/NetworkCoverageType.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\LocationTarget' => __DIR__ .'/LocationTarget.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\TargetingStatus' => __DIR__ .'/TargetingStatus.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\PlatformTarget' => __DIR__ .'/PlatformTarget.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\PlatformType' => __DIR__ .'/PlatformType.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetOperation' => __DIR__ .'/CampaignTargetOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetReturnValue' => __DIR__ .'/CampaignTargetReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetValues' => __DIR__ .'/CampaignTargetValues.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignTarget\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_16bc145a92a3e1df580e9e6f15f11b2b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
