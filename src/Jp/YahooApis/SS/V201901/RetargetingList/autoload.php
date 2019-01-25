<?php


 function autoload_3d86da6011871bb48940ff67dda33b3d($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListService' => __DIR__ .'/RetargetingListService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\TargetingList' => __DIR__ .'/TargetingList.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingAccountStatus' => __DIR__ .'/RetargetingAccountStatus.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\DefaultTargetList' => __DIR__ .'/DefaultTargetList.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\Tag' => __DIR__ .'/Tag.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RuleBaseTargetList' => __DIR__ .'/RuleBaseTargetList.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RuleGroup' => __DIR__ .'/RuleGroup.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RuleItem' => __DIR__ .'/RuleItem.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\UrlRuleItem' => __DIR__ .'/UrlRuleItem.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\CustomKeyRuleItem' => __DIR__ .'/CustomKeyRuleItem.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\LogicalTargetList' => __DIR__ .'/LogicalTargetList.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\LogicalGroup' => __DIR__ .'/LogicalGroup.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\LogicalRuleOperand' => __DIR__ .'/LogicalRuleOperand.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\TargetListType' => __DIR__ .'/TargetListType.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\ReviewStatus' => __DIR__ .'/ReviewStatus.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\ReachStorageStatus' => __DIR__ .'/ReachStorageStatus.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\IsAllVisitorRule' => __DIR__ .'/IsAllVisitorRule.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\IsDateSpecificRule' => __DIR__ .'/IsDateSpecificRule.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RuleType' => __DIR__ .'/RuleType.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RuleOperator' => __DIR__ .'/RuleOperator.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\UrlRuleKey' => __DIR__ .'/UrlRuleKey.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\LogicalCondition' => __DIR__ .'/LogicalCondition.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\TargetListOwner' => __DIR__ .'/TargetListOwner.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\ClosingReason' => __DIR__ .'/ClosingReason.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListSelector' => __DIR__ .'/RetargetingListSelector.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\GetCustomKeySelector' => __DIR__ .'/GetCustomKeySelector.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\CustomKey' => __DIR__ .'/CustomKey.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListPage' => __DIR__ .'/RetargetingListPage.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListValues' => __DIR__ .'/RetargetingListValues.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListOperation' => __DIR__ .'/RetargetingListOperation.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListReturnValue' => __DIR__ .'/RetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListCustomKeyPage' => __DIR__ .'/RetargetingListCustomKeyPage.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\getCustomKey' => __DIR__ .'/getCustomKey.php',
        'Jp\YahooApis\SS\V201901\RetargetingList\getCustomKeyResponse' => __DIR__ .'/getCustomKeyResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_3d86da6011871bb48940ff67dda33b3d');

// Do nothing. The rest is just leftovers from the code generation.
{
}
