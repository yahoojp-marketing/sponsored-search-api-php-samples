<?php

namespace Jp\YahooApis\SS\V201909\AccountShared;

class AccountSharedService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AccountShared' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountShared',
      'AccountSharedSelector' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountSharedSelector',
      'AccountSharedPage' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountSharedPage',
      'AccountSharedValues' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountSharedValues',
      'AccountSharedOperation' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountSharedOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\Operation',
      'AccountSharedReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\AccountSharedReturnValue',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\AccountShared\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/AccountSharedService?wsdl';
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
