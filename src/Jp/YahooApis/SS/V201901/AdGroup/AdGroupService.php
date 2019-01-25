<?php

namespace Jp\YahooApis\SS\V201901\AdGroup;

class AdGroupService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupSelector' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupSelector',
      'AdGroupPage' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupPage',
      'AdGroupValues' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupValues',
      'AdGroup' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroup',
      'Bid' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\Bid',
      'AdGroupOperation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupOperation',
      'AdGroupSettings' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupSettings',
      'TargetingSetting' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\TargetingSetting',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\CustomParameter',
      'UrlReviewData' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\UrlReviewData',
      'ReviewUrl' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\ReviewUrl',
      'AdGroupAdRotationMode' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupAdRotationMode',
      'Label' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\Label',
      'AdGroupReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\AdGroupReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroup\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/AdGroupService?wsdl';
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
