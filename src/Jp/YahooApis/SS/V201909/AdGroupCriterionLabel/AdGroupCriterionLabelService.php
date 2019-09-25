<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterionLabel;

class AdGroupCriterionLabelService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupCriterionLabel' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\AdGroupCriterionLabel',
      'AdGroupCriterionLabelValues' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\AdGroupCriterionLabelValues',
      'AdGroupCriterionLabelOperation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\AdGroupCriterionLabelOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\Operation',
      'AdGroupCriterionLabelReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\AdGroupCriterionLabelReturnValue',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupCriterionLabel\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/AdGroupCriterionLabelService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
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
