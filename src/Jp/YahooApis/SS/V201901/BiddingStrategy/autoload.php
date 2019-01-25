<?php


 function autoload_4ef7d239244877c462e051dd8a2131c2($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyService' => __DIR__ .'/BiddingStrategyService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategySelector' => __DIR__ .'/BiddingStrategySelector.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyType' => __DIR__ .'/BiddingStrategyType.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyOperation' => __DIR__ .'/BiddingStrategyOperation.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyPage' => __DIR__ .'/BiddingStrategyPage.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyReturnValue' => __DIR__ .'/BiddingStrategyReturnValue.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyValues' => __DIR__ .'/BiddingStrategyValues.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategy' => __DIR__ .'/BiddingStrategy.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingScheme' => __DIR__ .'/BiddingScheme.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme' => __DIR__ .'/PageOnePromotedBiddingScheme.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\TargetPositionType' => __DIR__ .'/TargetPositionType.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\BidChangesForRaisesOnly' => __DIR__ .'/BidChangesForRaisesOnly.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\RaiseBidWhenBudgetConstrained' => __DIR__ .'/RaiseBidWhenBudgetConstrained.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\RaiseBidWhenLowQualityScore' => __DIR__ .'/RaiseBidWhenLowQualityScore.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\TargetCpaBiddingScheme' => __DIR__ .'/TargetCpaBiddingScheme.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\TargetSpendBiddingScheme' => __DIR__ .'/TargetSpendBiddingScheme.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\TargetRoasBiddingScheme' => __DIR__ .'/TargetRoasBiddingScheme.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\BiddingStrategy\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_4ef7d239244877c462e051dd8a2131c2');

// Do nothing. The rest is just leftovers from the code generation.
{
}
