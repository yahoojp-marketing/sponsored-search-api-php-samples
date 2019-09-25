<?php


 function autoload_d4dca68b251b45b1a951ebca7eb9f7bd($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListService' => __DIR__ .'/AdGroupRetargetingListService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingList' => __DIR__ .'/AdGroupRetargetingList.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\CriterionTargetList' => __DIR__ .'/CriterionTargetList.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListSelector' => __DIR__ .'/AdGroupRetargetingListSelector.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListPage' => __DIR__ .'/AdGroupRetargetingListPage.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListValues' => __DIR__ .'/AdGroupRetargetingListValues.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListOperation' => __DIR__ .'/AdGroupRetargetingListOperation.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListReturnValue' => __DIR__ .'/AdGroupRetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\AdGroupRetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d4dca68b251b45b1a951ebca7eb9f7bd');

// Do nothing. The rest is just leftovers from the code generation.
{
}
