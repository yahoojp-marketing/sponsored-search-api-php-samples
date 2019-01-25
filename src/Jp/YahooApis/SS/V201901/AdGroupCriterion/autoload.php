<?php


 function autoload_7bba8c2e08f04699a370f1359e936df5($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionService' => __DIR__ .'/AdGroupCriterionService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector' => __DIR__ .'/AdGroupCriterionSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionUse' => __DIR__ .'/AdGroupCriterionUse.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\ContainsLabelId' => __DIR__ .'/ContainsLabelId.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionPage' => __DIR__ .'/AdGroupCriterionPage.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionValues' => __DIR__ .'/AdGroupCriterionValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterion' => __DIR__ .'/AdGroupCriterion.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\NegativeAdGroupCriterion' => __DIR__ .'/NegativeAdGroupCriterion.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Criterion' => __DIR__ .'/Criterion.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\CriterionType' => __DIR__ .'/CriterionType.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Keyword' => __DIR__ .'/Keyword.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\BiddableAdGroupCriterion' => __DIR__ .'/BiddableAdGroupCriterion.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedUrls' => __DIR__ .'/AdGroupCriterionAdditionalAdvancedUrls.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedMobileUrls' => __DIR__ .'/AdGroupCriterionAdditionalAdvancedMobileUrls.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalUrl' => __DIR__ .'/AdGroupCriterionAdditionalUrl.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Bid' => __DIR__ .'/Bid.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\BidSource' => __DIR__ .'/BidSource.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionOperation' => __DIR__ .'/AdGroupCriterionOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionReturnValue' => __DIR__ .'/AdGroupCriterionReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupCriterion\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_7bba8c2e08f04699a370f1359e936df5');

// Do nothing. The rest is just leftovers from the code generation.
{
}
