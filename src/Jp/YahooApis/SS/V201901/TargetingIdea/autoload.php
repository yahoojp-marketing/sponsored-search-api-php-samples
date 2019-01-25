<?php


 function autoload_e362be51a0d3acc59d854d9459c9bffd($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaService' => __DIR__ .'/TargetingIdeaService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaSelector' => __DIR__ .'/TargetingIdeaSelector.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\SearchParameter' => __DIR__ .'/SearchParameter.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\SearchParameterUse' => __DIR__ .'/SearchParameterUse.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\RelatedToKeywordSearchParameter' => __DIR__ .'/RelatedToKeywordSearchParameter.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\RelatedToUrlSearchParameter' => __DIR__ .'/RelatedToUrlSearchParameter.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\CriterionType' => __DIR__ .'/CriterionType.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\ProposalKeyword' => __DIR__ .'/ProposalKeyword.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\KeywordMatchType' => __DIR__ .'/KeywordMatchType.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaPage' => __DIR__ .'/TargetingIdeaPage.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaValues' => __DIR__ .'/TargetingIdeaValues.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\TypeAttributeMapEntry' => __DIR__ .'/TypeAttributeMapEntry.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\AttributeType' => __DIR__ .'/AttributeType.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\Attribute' => __DIR__ .'/Attribute.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\KeywordAttribute' => __DIR__ .'/KeywordAttribute.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\TargetingIdea\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e362be51a0d3acc59d854d9459c9bffd');

// Do nothing. The rest is just leftovers from the code generation.
{
}
