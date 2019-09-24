<?php


 function autoload_aa4f2f44b5d60c02a97f68792ab3ce80($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimatorService' => __DIR__ .'/KeywordEstimatorService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimatorSelector' => __DIR__ .'/KeywordEstimatorSelector.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\CampaignEstimateRequest' => __DIR__ .'/CampaignEstimateRequest.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\adGroupEstimateRequest' => __DIR__ .'/adGroupEstimateRequest.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\keywordEstimateRequest' => __DIR__ .'/keywordEstimateRequest.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\EstimateKeyword' => __DIR__ .'/EstimateKeyword.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\IsNegativeBool' => __DIR__ .'/IsNegativeBool.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimatorPage' => __DIR__ .'/KeywordEstimatorPage.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult' => __DIR__ .'/KeywordEstimateResult.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\EstimateResult' => __DIR__ .'/EstimateResult.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateValues' => __DIR__ .'/KeywordEstimateValues.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\KeywordEstimator\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_aa4f2f44b5d60c02a97f68792ab3ce80');

// Do nothing. The rest is just leftovers from the code generation.
{
}
