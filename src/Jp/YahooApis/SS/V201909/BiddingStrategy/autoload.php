<?php


 function autoload_d0461851e4a1a83a5f81a2aeea94e624($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyService' => __DIR__ .'/BiddingStrategyService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategySelector' => __DIR__ .'/BiddingStrategySelector.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyType' => __DIR__ .'/BiddingStrategyType.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyOperation' => __DIR__ .'/BiddingStrategyOperation.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyPage' => __DIR__ .'/BiddingStrategyPage.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyReturnValue' => __DIR__ .'/BiddingStrategyReturnValue.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyValues' => __DIR__ .'/BiddingStrategyValues.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy' => __DIR__ .'/BiddingStrategy.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingScheme' => __DIR__ .'/BiddingScheme.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\TargetCpaBiddingScheme' => __DIR__ .'/TargetCpaBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\TargetSpendBiddingScheme' => __DIR__ .'/TargetSpendBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\TargetRoasBiddingScheme' => __DIR__ .'/TargetRoasBiddingScheme.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\BiddingStrategy\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d0461851e4a1a83a5f81a2aeea94e624');

// Do nothing. The rest is just leftovers from the code generation.
{
}
