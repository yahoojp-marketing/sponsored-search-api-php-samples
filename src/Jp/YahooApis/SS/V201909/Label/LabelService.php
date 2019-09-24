<?php

namespace Jp\YahooApis\SS\V201909\Label;

class LabelService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'LabelSelector' => 'Jp\\YahooApis\\SS\\V201909\\Label\\LabelSelector',
      'Label' => 'Jp\\YahooApis\\SS\\V201909\\Label\\Label',
      'LabelPage' => 'Jp\\YahooApis\\SS\\V201909\\Label\\LabelPage',
      'LabelValues' => 'Jp\\YahooApis\\SS\\V201909\\Label\\LabelValues',
      'LabelOperation' => 'Jp\\YahooApis\\SS\\V201909\\Label\\LabelOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\Label\\Operation',
      'LabelReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\Label\\LabelReturnValue',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\Label\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\Label\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\Label\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\Label\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/LabelService?wsdl';
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
