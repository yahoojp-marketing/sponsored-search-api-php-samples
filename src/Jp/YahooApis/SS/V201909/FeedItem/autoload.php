<?php


 function autoload_bf8bb5a6698f9b270a0136d592655343($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemService' => __DIR__ .'/FeedItemService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItem' => __DIR__ .'/FeedItem.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector' => __DIR__ .'/FeedItemSelector.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemPlaceholderType' => __DIR__ .'/FeedItemPlaceholderType.php',
        'Jp\YahooApis\SS\V201909\FeedItem\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\FeedItem\TrademarkStatus' => __DIR__ .'/TrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemPlaceholderField' => __DIR__ .'/FeedItemPlaceholderField.php',
        'Jp\YahooApis\SS\V201909\FeedItem\DevicePreference' => __DIR__ .'/DevicePreference.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemAttribute' => __DIR__ .'/FeedItemAttribute.php',
        'Jp\YahooApis\SS\V201909\FeedItem\SimpleFeedItemAttribute' => __DIR__ .'/SimpleFeedItemAttribute.php',
        'Jp\YahooApis\SS\V201909\FeedItem\MultipleFeedItemAttribute' => __DIR__ .'/MultipleFeedItemAttribute.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedAttributeValue' => __DIR__ .'/FeedAttributeValue.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemScheduling' => __DIR__ .'/FeedItemScheduling.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemSchedule' => __DIR__ .'/FeedItemSchedule.php',
        'Jp\YahooApis\SS\V201909\FeedItem\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201909\FeedItem\DayOfWeek' => __DIR__ .'/DayOfWeek.php',
        'Jp\YahooApis\SS\V201909\FeedItem\MinuteOfHour' => __DIR__ .'/MinuteOfHour.php',
        'Jp\YahooApis\SS\V201909\FeedItem\TargetingCampaign' => __DIR__ .'/TargetingCampaign.php',
        'Jp\YahooApis\SS\V201909\FeedItem\TargetingAdGroup' => __DIR__ .'/TargetingAdGroup.php',
        'Jp\YahooApis\SS\V201909\FeedItem\TargetingKeyword' => __DIR__ .'/TargetingKeyword.php',
        'Jp\YahooApis\SS\V201909\FeedItem\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201909\FeedItem\Location' => __DIR__ .'/Location.php',
        'Jp\YahooApis\SS\V201909\FeedItem\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201909\FeedItem\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201909\FeedItem\CriterionTypeFeedItem' => __DIR__ .'/CriterionTypeFeedItem.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemGeoRestriction' => __DIR__ .'/FeedItemGeoRestriction.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemPage' => __DIR__ .'/FeedItemPage.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemValues' => __DIR__ .'/FeedItemValues.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemOperation' => __DIR__ .'/FeedItemOperation.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemReturnValue' => __DIR__ .'/FeedItemReturnValue.php',
        'Jp\YahooApis\SS\V201909\FeedItem\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\FeedItem\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatusOperation' => __DIR__ .'/FeedItemSetTrademarkStatusOperation.php',
        'Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatus' => __DIR__ .'/FeedItemSetTrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\FeedItem\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\FeedItem\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\FeedItem\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\FeedItem\mutateResponse' => __DIR__ .'/mutateResponse.php',
        'Jp\YahooApis\SS\V201909\FeedItem\setTrademarkStatus' => __DIR__ .'/setTrademarkStatus.php',
        'Jp\YahooApis\SS\V201909\FeedItem\setTrademarkStatusResponse' => __DIR__ .'/setTrademarkStatusResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_bf8bb5a6698f9b270a0136d592655343');

// Do nothing. The rest is just leftovers from the code generation.
{
}
