<?php

namespace Jp\YahooApis\SS\V201909\ConversionTracker;

class ConversionTrackerService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'ConversionTrackerSelector' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTrackerSelector',
      'ConversionDateRange' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionDateRange',
      'ConversionTracker' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTracker',
      'WebConversion' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\WebConversion',
      'AppConversion' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\AppConversion',
      'AppPostbackUrl' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\AppPostbackUrl',
      'ConversionTrackerPage' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTrackerPage',
      'ConversionTrackerValues' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTrackerValues',
      'ConversionTrackerOperation' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTrackerOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\Operation',
      'ConversionTrackerReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\ConversionTrackerReturnValue',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\ConversionTracker\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/ConversionTrackerService?wsdl';
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
