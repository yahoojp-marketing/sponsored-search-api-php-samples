<?php


 function autoload_140fb5d86391050e3989717322a44738($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListService' => __DIR__ .'/AdGroupRetargetingListService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingList' => __DIR__ .'/AdGroupRetargetingList.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\CriterionTargetList' => __DIR__ .'/CriterionTargetList.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListSelector' => __DIR__ .'/AdGroupRetargetingListSelector.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListPage' => __DIR__ .'/AdGroupRetargetingListPage.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListValues' => __DIR__ .'/AdGroupRetargetingListValues.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListOperation' => __DIR__ .'/AdGroupRetargetingListOperation.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListReturnValue' => __DIR__ .'/AdGroupRetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\AdGroupRetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_140fb5d86391050e3989717322a44738');

// Do nothing. The rest is just leftovers from the code generation.
{
}
