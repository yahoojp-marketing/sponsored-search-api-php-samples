<?php


 function autoload_405ea511fef563e3fee6fb87d9a5de47($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionService' => __DIR__ .'/CampaignCriterionService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionSelector' => __DIR__ .'/CampaignCriterionSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionPage' => __DIR__ .'/CampaignCriterionPage.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion' => __DIR__ .'/CampaignCriterion.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\NegativeCampaignCriterion' => __DIR__ .'/NegativeCampaignCriterion.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionUse' => __DIR__ .'/CampaignCriterionUse.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\Criterion' => __DIR__ .'/Criterion.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CriterionType' => __DIR__ .'/CriterionType.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\Keyword' => __DIR__ .'/Keyword.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionOperation' => __DIR__ .'/CampaignCriterionOperation.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionReturnValue' => __DIR__ .'/CampaignCriterionReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionValues' => __DIR__ .'/CampaignCriterionValues.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\CampaignCriterion\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_405ea511fef563e3fee6fb87d9a5de47');

// Do nothing. The rest is just leftovers from the code generation.
{
}
