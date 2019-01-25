<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class CampaignTargetService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignTargetSelector' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTargetSelector',
      'CampaignTargetPage' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTargetPage',
      'CampaignTarget' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTarget',
      'Target' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\Target',
      'ScheduleTarget' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\ScheduleTarget',
      'NetworkTarget' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\NetworkTarget',
      'LocationTarget' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\LocationTarget',
      'PlatformTarget' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\PlatformTarget',
      'CampaignTargetOperation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTargetOperation',
      'CampaignTargetReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTargetReturnValue',
      'CampaignTargetValues' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\CampaignTargetValues',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignTarget\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/CampaignTargetService?wsdl';
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
