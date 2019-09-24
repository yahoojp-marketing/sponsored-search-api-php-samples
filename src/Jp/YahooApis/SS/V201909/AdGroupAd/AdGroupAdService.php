<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupAdSelector' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdSelector',
      'AdGroupAdPage' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdPage',
      'AdGroupAdValues' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdValues',
      'AdGroupAd' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAd',
      'Ad' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\Ad',
      'AdGroupAdAdditionalAdvancedUrls' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdAdditionalAdvancedUrls',
      'AdGroupAdAdditionalAdvancedMobileUrls' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdAdditionalAdvancedMobileUrls',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\CustomParameter',
      'TextAd2' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\TextAd2',
      'AppAd' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AppAd',
      'ExtendedTextAd' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\ExtendedTextAd',
      'DynamicSearchLinkedAd' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\DynamicSearchLinkedAd',
      'Label' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\Label',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\Operation',
      'AdGroupAdOperation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdOperation',
      'AdGroupAdReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdReturnValue',
      'AdGroupAdSetTrademarkStatusOperation' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdSetTrademarkStatusOperation',
      'AdGroupAdSetTrademarkStatus' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\AdGroupAdSetTrademarkStatus',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\mutateResponse',
      'setTrademarkStatus' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\setTrademarkStatus',
      'setTrademarkStatusResponse' => 'Jp\\YahooApis\\SS\\V201909\\AdGroupAd\\setTrademarkStatusResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/AdGroupAdService?wsdl';
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

    /**
     * @param setTrademarkStatus $parameters
     * @return setTrademarkStatusResponse
     */
    public function setTrademarkStatus(setTrademarkStatus $parameters)
    {
      return $this->__soapCall('setTrademarkStatus', array($parameters));
    }

}
