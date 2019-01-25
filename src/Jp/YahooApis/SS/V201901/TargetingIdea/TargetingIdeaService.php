<?php

namespace Jp\YahooApis\SS\V201901\TargetingIdea;

class TargetingIdeaService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'SoapHeader' => 'Jp\\YahooApis\\SS\\V201901\\SoapHeader',
      'SoapResponseHeader' => 'Jp\\YahooApis\\SS\\V201901\\SoapResponseHeader',
      'Paging' => 'Jp\\YahooApis\\SS\\V201901\\Paging',
      'Error' => 'Jp\\YahooApis\\SS\\V201901\\Error',
      'ErrorDetail' => 'Jp\\YahooApis\\SS\\V201901\\ErrorDetail',
      'Page' => 'Jp\\YahooApis\\SS\\V201901\\Page',
      'ReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\ReturnValue',
      'ListReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\ListReturnValue',
      'TargetingIdeaSelector' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\TargetingIdeaSelector',
      'SearchParameter' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\SearchParameter',
      'RelatedToKeywordSearchParameter' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\RelatedToKeywordSearchParameter',
      'RelatedToUrlSearchParameter' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\RelatedToUrlSearchParameter',
      'ProposalKeyword' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\ProposalKeyword',
      'TargetingIdeaPage' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\TargetingIdeaPage',
      'TargetingIdeaValues' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\TargetingIdeaValues',
      'TypeAttributeMapEntry' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\TypeAttributeMapEntry',
      'Attribute' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\Attribute',
      'KeywordAttribute' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\KeywordAttribute',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\TargetingIdea\\getResponse',
    );

    /**
     * @param array $options A array of config values
     * @param string $endpoint Service Endpont URL
     * @param string $wsdl The wsdl file to use
     */
    public function __construct($wsdl = null, $endpoint = null, array $options = array())
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/TargetingIdeaService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
    }

    /**
     * @param get $parameters
     * @return getResponse
     */
    public function get(get $parameters)
    {
      return parent::invoke('get', $parameters);
    }

}
