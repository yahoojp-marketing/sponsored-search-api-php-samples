<?php

namespace Jp\YahooApis\SS\V201901\CampaignLabel;

class CampaignLabelService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignLabel' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\CampaignLabel',
      'CampaignLabelValues' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\CampaignLabelValues',
      'CampaignLabelOperation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\CampaignLabelOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\Operation',
      'CampaignLabelReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\CampaignLabelReturnValue',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignLabel\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/CampaignLabelService?wsdl';
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
