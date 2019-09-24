<?php


 function autoload_1d41a63876df74cbb36105d095939ea4($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListService' => __DIR__ .'/RetargetingListService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\TargetingList' => __DIR__ .'/TargetingList.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingAccountStatus' => __DIR__ .'/RetargetingAccountStatus.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\DefaultTargetList' => __DIR__ .'/DefaultTargetList.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\Tag' => __DIR__ .'/Tag.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList' => __DIR__ .'/RuleBaseTargetList.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RuleGroup' => __DIR__ .'/RuleGroup.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RuleItem' => __DIR__ .'/RuleItem.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\UrlRuleItem' => __DIR__ .'/UrlRuleItem.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\CustomKeyRuleItem' => __DIR__ .'/CustomKeyRuleItem.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\LogicalTargetList' => __DIR__ .'/LogicalTargetList.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\LogicalGroup' => __DIR__ .'/LogicalGroup.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\LogicalRuleOperand' => __DIR__ .'/LogicalRuleOperand.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\TargetListType' => __DIR__ .'/TargetListType.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\ReviewStatus' => __DIR__ .'/ReviewStatus.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\ReachStorageStatus' => __DIR__ .'/ReachStorageStatus.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\IsAllVisitorRule' => __DIR__ .'/IsAllVisitorRule.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\IsDateSpecificRule' => __DIR__ .'/IsDateSpecificRule.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RuleType' => __DIR__ .'/RuleType.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RuleOperator' => __DIR__ .'/RuleOperator.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\UrlRuleKey' => __DIR__ .'/UrlRuleKey.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\LogicalCondition' => __DIR__ .'/LogicalCondition.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\TargetListOwner' => __DIR__ .'/TargetListOwner.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\ClosingReason' => __DIR__ .'/ClosingReason.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector' => __DIR__ .'/RetargetingListSelector.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\GetCustomKeySelector' => __DIR__ .'/GetCustomKeySelector.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\CustomKey' => __DIR__ .'/CustomKey.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListPage' => __DIR__ .'/RetargetingListPage.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListValues' => __DIR__ .'/RetargetingListValues.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListOperation' => __DIR__ .'/RetargetingListOperation.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListReturnValue' => __DIR__ .'/RetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListCustomKeyPage' => __DIR__ .'/RetargetingListCustomKeyPage.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\getCustomKey' => __DIR__ .'/getCustomKey.php',
        'Jp\YahooApis\SS\V201909\RetargetingList\getCustomKeyResponse' => __DIR__ .'/getCustomKeyResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1d41a63876df74cbb36105d095939ea4');

// Do nothing. The rest is just leftovers from the code generation.
{
}
