<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class TargetingIdeaService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'SoapHeader' => 'Jp\\YahooApis\\SS\\V201909\\SoapHeader',
      'SoapResponseHeader' => 'Jp\\YahooApis\\SS\\V201909\\SoapResponseHeader',
      'Paging' => 'Jp\\YahooApis\\SS\\V201909\\Paging',
      'Error' => 'Jp\\YahooApis\\SS\\V201909\\Error',
      'ErrorDetail' => 'Jp\\YahooApis\\SS\\V201909\\ErrorDetail',
      'Page' => 'Jp\\YahooApis\\SS\\V201909\\Page',
      'ReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\ReturnValue',
      'ListReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\ListReturnValue',
      'TargetingIdeaSelector' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\TargetingIdeaSelector',
      'SearchParameter' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\SearchParameter',
      'RelatedToKeywordSearchParameter' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\RelatedToKeywordSearchParameter',
      'RelatedToUrlSearchParameter' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\RelatedToUrlSearchParameter',
      'ProposalKeyword' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\ProposalKeyword',
      'TargetingIdeaPage' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\TargetingIdeaPage',
      'TargetingIdeaValues' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\TargetingIdeaValues',
      'TypeAttributeMapEntry' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\TypeAttributeMapEntry',
      'Attribute' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\Attribute',
      'KeywordAttribute' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\KeywordAttribute',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\TargetingIdea\\getResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/TargetingIdeaService?wsdl';
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
