<?php


 function autoload_3a111b9e7c0a422441318c4e2666c37d($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderService' => __DIR__ .'/FeedFolderService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolder' => __DIR__ .'/FeedFolder.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedAttribute' => __DIR__ .'/FeedAttribute.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderPlaceholderField' => __DIR__ .'/FeedFolderPlaceholderField.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderPlaceholderType' => __DIR__ .'/FeedFolderPlaceholderType.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderSelector' => __DIR__ .'/FeedFolderSelector.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderPage' => __DIR__ .'/FeedFolderPage.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderValues' => __DIR__ .'/FeedFolderValues.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderOperation' => __DIR__ .'/FeedFolderOperation.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderReturnValue' => __DIR__ .'/FeedFolderReturnValue.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\SS\V201901\FeedFolder\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_3a111b9e7c0a422441318c4e2666c37d');

// Do nothing. The rest is just leftovers from the code generation.
{
}
