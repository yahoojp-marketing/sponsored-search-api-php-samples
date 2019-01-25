<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class BiddingStrategyService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'BiddingStrategySelector' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategySelector',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\Operation',
      'BiddingStrategyOperation' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategyOperation',
      'BiddingStrategyPage' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategyPage',
      'BiddingStrategyReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategyReturnValue',
      'BiddingStrategyValues' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategyValues',
      'BiddingStrategy' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingStrategy',
      'BiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\BiddingScheme',
      'PageOnePromotedBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\PageOnePromotedBiddingScheme',
      'TargetCpaBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\TargetCpaBiddingScheme',
      'TargetSpendBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\TargetSpendBiddingScheme',
      'TargetRoasBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\TargetRoasBiddingScheme',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\BiddingStrategy\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/BiddingStrategyService?wsdl';
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
