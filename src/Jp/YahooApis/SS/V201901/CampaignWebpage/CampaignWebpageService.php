<?php

namespace Jp\YahooApis\SS\V201901\CampaignWebpage;

class CampaignWebpageService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignWebpageSelector' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpageSelector',
      'CampaignWebpagePage' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpagePage',
      'CampaignWebpageValues' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpageValues',
      'CampaignWebpage' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpage',
      'Webpage' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\Webpage',
      'WebpageParameter' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\WebpageParameter',
      'WebpageCondition' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\WebpageCondition',
      'CampaignWebpageOperation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpageOperation',
      'CampaignWebpageReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\CampaignWebpageReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\CampaignWebpage\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/CampaignWebpageService?wsdl';
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
