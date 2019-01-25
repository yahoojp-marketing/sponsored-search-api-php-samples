<?php


 function autoload_716138283b2656ccdb306bc7b39dfcaf($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetService' => __DIR__ .'/CampaignTargetService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector' => __DIR__ .'/CampaignTargetSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetPage' => __DIR__ .'/CampaignTargetPage.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget' => __DIR__ .'/CampaignTarget.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\Target' => __DIR__ .'/Target.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\TargetType' => __DIR__ .'/TargetType.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\DayOfWeek' => __DIR__ .'/DayOfWeek.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\MinuteOfHour' => __DIR__ .'/MinuteOfHour.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\ScheduleTarget' => __DIR__ .'/ScheduleTarget.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\NetworkTarget' => __DIR__ .'/NetworkTarget.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\NetworkCoverageType' => __DIR__ .'/NetworkCoverageType.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget' => __DIR__ .'/LocationTarget.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\TargetingStatus' => __DIR__ .'/TargetingStatus.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\PlatformTarget' => __DIR__ .'/PlatformTarget.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\PlatformType' => __DIR__ .'/PlatformType.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetOperation' => __DIR__ .'/CampaignTargetOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetReturnValue' => __DIR__ .'/CampaignTargetReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetValues' => __DIR__ .'/CampaignTargetValues.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignTarget\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_716138283b2656ccdb306bc7b39dfcaf');

// Do nothing. The rest is just leftovers from the code generation.
{
}
