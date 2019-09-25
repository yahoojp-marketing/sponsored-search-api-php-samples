<?php

namespace Jp\YahooApis\SS\V201909\AdGroup;

class AdGroupService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupSelector' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupSelector',
      'AdGroupPage' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupPage',
      'AdGroupValues' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupValues',
      'AdGroup' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroup',
      'Bid' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\Bid',
      'AdGroupOperation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupOperation',
      'AdGroupSettings' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupSettings',
      'TargetingSetting' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\TargetingSetting',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\CustomParameter',
      'UrlReviewData' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\UrlReviewData',
      'ReviewUrl' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\ReviewUrl',
      'AdGroupAdRotationMode' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupAdRotationMode',
      'Label' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\Label',
      'AdGroupReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\AdGroupReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroup\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/AdGroupService?wsdl';
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
