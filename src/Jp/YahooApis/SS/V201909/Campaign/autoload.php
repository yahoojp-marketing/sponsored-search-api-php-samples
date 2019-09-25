<?php


 function autoload_5945e4917c210787c144eff694c8de28($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\Campaign\CampaignService' => __DIR__ .'/CampaignService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignSelector' => __DIR__ .'/CampaignSelector.php',
        'Jp\YahooApis\SS\V201909\Campaign\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201909\Campaign\ContainsLabelId' => __DIR__ .'/ContainsLabelId.php',
        'Jp\YahooApis\SS\V201909\Campaign\Campaign' => __DIR__ .'/Campaign.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignServingStatus' => __DIR__ .'/CampaignServingStatus.php',
        'Jp\YahooApis\SS\V201909\Campaign\Budget' => __DIR__ .'/Budget.php',
        'Jp\YahooApis\SS\V201909\Campaign\BudgetPeriod' => __DIR__ .'/BudgetPeriod.php',
        'Jp\YahooApis\SS\V201909\Campaign\BudgetDeliveryMethod' => __DIR__ .'/BudgetDeliveryMethod.php',
        'Jp\YahooApis\SS\V201909\Campaign\BiddingStrategyFailedReason' => __DIR__ .'/BiddingStrategyFailedReason.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignSettings' => __DIR__ .'/CampaignSettings.php',
        'Jp\YahooApis\SS\V201909\Campaign\SettingType' => __DIR__ .'/SettingType.php',
        'Jp\YahooApis\SS\V201909\Campaign\GeoTargetTypeSetting' => __DIR__ .'/GeoTargetTypeSetting.php',
        'Jp\YahooApis\SS\V201909\Campaign\DynamicAdsForSearchSetting' => __DIR__ .'/DynamicAdsForSearchSetting.php',
        'Jp\YahooApis\SS\V201909\Campaign\GeoTargetType' => __DIR__ .'/GeoTargetType.php',
        'Jp\YahooApis\SS\V201909\Campaign\TargetingSetting' => __DIR__ .'/TargetingSetting.php',
        'Jp\YahooApis\SS\V201909\Campaign\TargetAll' => __DIR__ .'/TargetAll.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy' => __DIR__ .'/CampaignBiddingStrategy.php',
        'Jp\YahooApis\SS\V201909\Campaign\BiddingStrategyType' => __DIR__ .'/BiddingStrategyType.php',
        'Jp\YahooApis\SS\V201909\Campaign\BiddingStrategySource' => __DIR__ .'/BiddingStrategySource.php',
        'Jp\YahooApis\SS\V201909\Campaign\BiddingScheme' => __DIR__ .'/BiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\ManualCpcBiddingScheme' => __DIR__ .'/ManualCpcBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\TargetCpaBiddingScheme' => __DIR__ .'/TargetCpaBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\TargetSpendBiddingScheme' => __DIR__ .'/TargetSpendBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\TargetRoasBiddingScheme' => __DIR__ .'/TargetRoasBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\MaximizeConversionsBiddingScheme' => __DIR__ .'/MaximizeConversionsBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\Campaign\ConversionOptimizerEligibility' => __DIR__ .'/ConversionOptimizerEligibility.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignType' => __DIR__ .'/CampaignType.php',
        'Jp\YahooApis\SS\V201909\Campaign\AppStore' => __DIR__ .'/AppStore.php',
        'Jp\YahooApis\SS\V201909\Campaign\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201909\Campaign\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201909\Campaign\UrlReviewData' => __DIR__ .'/UrlReviewData.php',
        'Jp\YahooApis\SS\V201909\Campaign\ReviewUrl' => __DIR__ .'/ReviewUrl.php',
        'Jp\YahooApis\SS\V201909\Campaign\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201909\Campaign\UrlApprovalStatus' => __DIR__ .'/UrlApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\Campaign\EnhancedCpcEnabled' => __DIR__ .'/EnhancedCpcEnabled.php',
        'Jp\YahooApis\SS\V201909\Campaign\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignPage' => __DIR__ .'/CampaignPage.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignValues' => __DIR__ .'/CampaignValues.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignOperation' => __DIR__ .'/CampaignOperation.php',
        'Jp\YahooApis\SS\V201909\Campaign\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\Campaign\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\Campaign\CampaignReturnValue' => __DIR__ .'/CampaignReturnValue.php',
        'Jp\YahooApis\SS\V201909\Campaign\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\Campaign\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\Campaign\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\Campaign\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_5945e4917c210787c144eff694c8de28');

// Do nothing. The rest is just leftovers from the code generation.
{
}
