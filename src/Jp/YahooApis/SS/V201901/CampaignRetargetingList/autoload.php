<?php


 function autoload_ac3141d9382f73dd749a9029479d632d($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListService' => __DIR__ .'/CampaignRetargetingListService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingList' => __DIR__ .'/CampaignRetargetingList.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CriterionTargetList' => __DIR__ .'/CriterionTargetList.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListSelector' => __DIR__ .'/CampaignRetargetingListSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListPage' => __DIR__ .'/CampaignRetargetingListPage.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListValues' => __DIR__ .'/CampaignRetargetingListValues.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListOperation' => __DIR__ .'/CampaignRetargetingListOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListReturnValue' => __DIR__ .'/CampaignRetargetingListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\ExcludedType' => __DIR__ .'/ExcludedType.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignRetargetingList\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_ac3141d9382f73dd749a9029479d632d');

// Do nothing. The rest is just leftovers from the code generation.
{
}
