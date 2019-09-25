<?php


 function autoload_7a67d8376504e1e83f0169dadeba52a7($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderService' => __DIR__ .'/FeedFolderService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder' => __DIR__ .'/FeedFolder.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedAttribute' => __DIR__ .'/FeedAttribute.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderPlaceholderField' => __DIR__ .'/FeedFolderPlaceholderField.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderPlaceholderType' => __DIR__ .'/FeedFolderPlaceholderType.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderSelector' => __DIR__ .'/FeedFolderSelector.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderPage' => __DIR__ .'/FeedFolderPage.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderValues' => __DIR__ .'/FeedFolderValues.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderOperation' => __DIR__ .'/FeedFolderOperation.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderReturnValue' => __DIR__ .'/FeedFolderReturnValue.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201909\FeedFolder\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_7a67d8376504e1e83f0169dadeba52a7');

// Do nothing. The rest is just leftovers from the code generation.
{
}
