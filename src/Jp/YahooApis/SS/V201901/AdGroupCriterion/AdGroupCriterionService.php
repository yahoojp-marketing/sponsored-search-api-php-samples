<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupCriterionSelector' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionSelector',
      'AdGroupCriterionPage' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionPage',
      'AdGroupCriterionValues' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionValues',
      'AdGroupCriterion' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterion',
      'NegativeAdGroupCriterion' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\NegativeAdGroupCriterion',
      'Criterion' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\Criterion',
      'Keyword' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\Keyword',
      'BiddableAdGroupCriterion' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\BiddableAdGroupCriterion',
      'AdGroupCriterionAdditionalAdvancedUrls' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionAdditionalAdvancedUrls',
      'AdGroupCriterionAdditionalAdvancedMobileUrls' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionAdditionalAdvancedMobileUrls',
      'AdGroupCriterionAdditionalUrl' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionAdditionalUrl',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\CustomParameter',
      'Bid' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\Bid',
      'Label' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\Label',
      'AdGroupCriterionOperation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionOperation',
      'AdGroupCriterionReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\AdGroupCriterionReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterion\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/AdGroupCriterionService?wsdl';
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

    /**
     * @param mutate $parameters
     * @return mutateResponse
     */
    public function mutate(mutate $parameters)
    {
      return parent::invoke('mutate', $parameters);
    }

}
