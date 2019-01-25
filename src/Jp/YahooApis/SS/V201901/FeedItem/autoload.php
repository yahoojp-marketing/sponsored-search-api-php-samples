<?php


 function autoload_d53659476c13871231567b2b3391b8f7($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemService' => __DIR__ .'/FeedItemService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItem' => __DIR__ .'/FeedItem.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemSelector' => __DIR__ .'/FeedItemSelector.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemPlaceholderType' => __DIR__ .'/FeedItemPlaceholderType.php',
        'Jp\YahooApis\SS\V201901\FeedItem\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\FeedItem\TrademarkStatus' => __DIR__ .'/TrademarkStatus.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemPlaceholderField' => __DIR__ .'/FeedItemPlaceholderField.php',
        'Jp\YahooApis\SS\V201901\FeedItem\DevicePreference' => __DIR__ .'/DevicePreference.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemAttribute' => __DIR__ .'/FeedItemAttribute.php',
        'Jp\YahooApis\SS\V201901\FeedItem\SimpleFeedItemAttribute' => __DIR__ .'/SimpleFeedItemAttribute.php',
        'Jp\YahooApis\SS\V201901\FeedItem\MultipleFeedItemAttribute' => __DIR__ .'/MultipleFeedItemAttribute.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedAttributeValue' => __DIR__ .'/FeedAttributeValue.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemScheduling' => __DIR__ .'/FeedItemScheduling.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule' => __DIR__ .'/FeedItemSchedule.php',
        'Jp\YahooApis\SS\V201901\FeedItem\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201901\FeedItem\DayOfWeek' => __DIR__ .'/DayOfWeek.php',
        'Jp\YahooApis\SS\V201901\FeedItem\MinuteOfHour' => __DIR__ .'/MinuteOfHour.php',
        'Jp\YahooApis\SS\V201901\FeedItem\TargetingCampaign' => __DIR__ .'/TargetingCampaign.php',
        'Jp\YahooApis\SS\V201901\FeedItem\TargetingAdGroup' => __DIR__ .'/TargetingAdGroup.php',
        'Jp\YahooApis\SS\V201901\FeedItem\TargetingKeyword' => __DIR__ .'/TargetingKeyword.php',
        'Jp\YahooApis\SS\V201901\FeedItem\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201901\FeedItem\Location' => __DIR__ .'/Location.php',
        'Jp\YahooApis\SS\V201901\FeedItem\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201901\FeedItem\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201901\FeedItem\CriterionTypeFeedItem' => __DIR__ .'/CriterionTypeFeedItem.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemGeoRestriction' => __DIR__ .'/FeedItemGeoRestriction.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemPage' => __DIR__ .'/FeedItemPage.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemValues' => __DIR__ .'/FeedItemValues.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemOperation' => __DIR__ .'/FeedItemOperation.php',
        'Jp\YahooApis\SS\V201901\FeedItem\FeedItemReturnValue' => __DIR__ .'/FeedItemReturnValue.php',
        'Jp\YahooApis\SS\V201901\FeedItem\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\FeedItem\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\FeedItem\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\FeedItem\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\FeedItem\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\FeedItem\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d53659476c13871231567b2b3391b8f7');

// Do nothing. The rest is just leftovers from the code generation.
{
}
