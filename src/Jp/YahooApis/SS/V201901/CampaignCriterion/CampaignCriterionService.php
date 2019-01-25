<?php

namespace Jp\YahooApis\SS\V201901\CampaignCriterion;

class CampaignCriterionService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignCriterionSelector' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterionSelector',
      'CampaignCriterionPage' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterionPage',
      'CampaignCriterion' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterion',
      'NegativeCampaignCriterion' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\NegativeCampaignCriterion',
      'Criterion' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\Criterion',
      'Keyword' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\Keyword',
      'CampaignCriterionOperation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterionOperation',
      'CampaignCriterionReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterionReturnValue',
      'CampaignCriterionValues' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\CampaignCriterionValues',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignCriterion\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/CampaignCriterionService?wsdl';
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
