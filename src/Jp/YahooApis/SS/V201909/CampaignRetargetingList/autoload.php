<?php


 function autoload_bd60cf87680e55a73c1d990e763f3c49($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListService' => __DIR__ .'/CampaignRetargetingListService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList' => __DIR__ .'/CampaignRetargetingList.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CriterionTargetList' => __DIR__ .'/CriterionTargetList.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector' => __DIR__ .'/CampaignRetargetingListSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListPage' => __DIR__ .'/CampaignRetargetingListPage.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListValues' => __DIR__ .'/CampaignRetargetingListValues.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListOperation' => __DIR__ .'/CampaignRetargetingListOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListReturnValue' => __DIR__ .'/CampaignRetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignRetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_bd60cf87680e55a73c1d990e763f3c49');

// Do nothing. The rest is just leftovers from the code generation.
{
}
