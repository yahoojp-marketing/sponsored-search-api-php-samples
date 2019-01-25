<?php


 function autoload_ac0d3e5d269643ec32dc0ba290b5740a($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionService' => __DIR__ .'/CampaignCriterionService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector' => __DIR__ .'/CampaignCriterionSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionPage' => __DIR__ .'/CampaignCriterionPage.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterion' => __DIR__ .'/CampaignCriterion.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\NegativeCampaignCriterion' => __DIR__ .'/NegativeCampaignCriterion.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionUse' => __DIR__ .'/CampaignCriterionUse.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\Criterion' => __DIR__ .'/Criterion.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CriterionType' => __DIR__ .'/CriterionType.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\Keyword' => __DIR__ .'/Keyword.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionOperation' => __DIR__ .'/CampaignCriterionOperation.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionReturnValue' => __DIR__ .'/CampaignCriterionReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionValues' => __DIR__ .'/CampaignCriterionValues.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\CampaignCriterion\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_ac0d3e5d269643ec32dc0ba290b5740a');

// Do nothing. The rest is just leftovers from the code generation.
{
}
