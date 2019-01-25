<?php


 function autoload_8ccb9c6fd5a5792869ef8fed7b3ded44($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupService' => __DIR__ .'/AdGroupService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupSelector' => __DIR__ .'/AdGroupSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroup\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroup\ContainsLabelId' => __DIR__ .'/ContainsLabelId.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupPage' => __DIR__ .'/AdGroupPage.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupValues' => __DIR__ .'/AdGroupValues.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroup' => __DIR__ .'/AdGroup.php',
        'Jp\YahooApis\SS\V201901\AdGroup\Bid' => __DIR__ .'/Bid.php',
        'Jp\YahooApis\SS\V201901\AdGroup\BidSource' => __DIR__ .'/BidSource.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupOperation' => __DIR__ .'/AdGroupOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupSettings' => __DIR__ .'/AdGroupSettings.php',
        'Jp\YahooApis\SS\V201901\AdGroup\CriterionType' => __DIR__ .'/CriterionType.php',
        'Jp\YahooApis\SS\V201901\AdGroup\TargetingSetting' => __DIR__ .'/TargetingSetting.php',
        'Jp\YahooApis\SS\V201901\AdGroup\TargetAll' => __DIR__ .'/TargetAll.php',
        'Jp\YahooApis\SS\V201901\AdGroup\CustomParameters' => __DIR__ .'/CustomParameters.php',
        'Jp\YahooApis\SS\V201901\AdGroup\CustomParameter' => __DIR__ .'/CustomParameter.php',
        'Jp\YahooApis\SS\V201901\AdGroup\UrlReviewData' => __DIR__ .'/UrlReviewData.php',
        'Jp\YahooApis\SS\V201901\AdGroup\ReviewUrl' => __DIR__ .'/ReviewUrl.php',
        'Jp\YahooApis\SS\V201901\AdGroup\IsRemove' => __DIR__ .'/IsRemove.php',
        'Jp\YahooApis\SS\V201901\AdGroup\UrlApprovalStatus' => __DIR__ .'/UrlApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupAdRotationMode' => __DIR__ .'/AdGroupAdRotationMode.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdRotationMode' => __DIR__ .'/AdRotationMode.php',
        'Jp\YahooApis\SS\V201901\AdGroup\Label' => __DIR__ .'/Label.php',
        'Jp\YahooApis\SS\V201901\AdGroup\AdGroupReturnValue' => __DIR__ .'/AdGroupReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroup\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroup\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroup\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroup\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroup\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroup\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_8ccb9c6fd5a5792869ef8fed7b3ded44');

// Do nothing. The rest is just leftovers from the code generation.
{
}
