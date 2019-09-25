<?php

namespace Jp\YahooApis\SS\V201909\AccountTrackingUrl;

class AccountTrackingUrlService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AccountTrackingUrlSelector' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrlSelector',
      'AccountTrackingUrlPage' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrlPage',
      'AccountTrackingUrlValues' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrlValues',
      'AccountTrackingUrl' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrl',
      'AccountTrackingUrlOperation' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrlOperation',
      'AccountTrackingUrlReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\AccountTrackingUrlReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\AccountTrackingUrl\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/AccountTrackingUrlService?wsdl';
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
