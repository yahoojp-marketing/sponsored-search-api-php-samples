<?php

namespace Jp\YahooApis\SS\V201909\KeywordEstimator;

class KeywordEstimatorService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'KeywordEstimatorSelector' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\KeywordEstimatorSelector',
      'CampaignEstimateRequest' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\CampaignEstimateRequest',
      'adGroupEstimateRequest' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\adGroupEstimateRequest',
      'keywordEstimateRequest' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\keywordEstimateRequest',
      'EstimateKeyword' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\EstimateKeyword',
      'KeywordEstimatorPage' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\KeywordEstimatorPage',
      'KeywordEstimateResult' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\KeywordEstimateResult',
      'EstimateResult' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\EstimateResult',
      'KeywordEstimateValues' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\KeywordEstimateValues',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\KeywordEstimator\\getResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/KeywordEstimatorService?wsdl';
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
