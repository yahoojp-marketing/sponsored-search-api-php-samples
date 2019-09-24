<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class CampaignTargetService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignTargetSelector' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTargetSelector',
      'CampaignTargetPage' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTargetPage',
      'CampaignTarget' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTarget',
      'Target' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\Target',
      'ScheduleTarget' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\ScheduleTarget',
      'NetworkTarget' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\NetworkTarget',
      'LocationTarget' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\LocationTarget',
      'PlatformTarget' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\PlatformTarget',
      'CampaignTargetOperation' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTargetOperation',
      'CampaignTargetReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTargetReturnValue',
      'CampaignTargetValues' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\CampaignTargetValues',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\CampaignTarget\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/CampaignTargetService?wsdl';
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
