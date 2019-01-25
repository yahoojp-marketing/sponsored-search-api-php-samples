<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterionLabel;

class AdGroupCriterionLabelService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupCriterionLabel' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\AdGroupCriterionLabel',
      'AdGroupCriterionLabelValues' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\AdGroupCriterionLabelValues',
      'AdGroupCriterionLabelOperation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\AdGroupCriterionLabelOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\Operation',
      'AdGroupCriterionLabelReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\AdGroupCriterionLabelReturnValue',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupCriterionLabel\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/AdGroupCriterionLabelService?wsdl';
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
