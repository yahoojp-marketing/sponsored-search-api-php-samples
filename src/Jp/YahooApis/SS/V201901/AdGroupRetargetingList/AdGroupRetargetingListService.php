<?php

namespace Jp\YahooApis\SS\V201901\AdGroupRetargetingList;

class AdGroupRetargetingListService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'AdGroupRetargetingList' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingList',
      'CriterionTargetList' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\CriterionTargetList',
      'AdGroupRetargetingListSelector' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingListSelector',
      'AdGroupRetargetingListPage' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingListPage',
      'AdGroupRetargetingListValues' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingListValues',
      'AdGroupRetargetingListOperation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingListOperation',
      'AdGroupRetargetingListReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\AdGroupRetargetingListReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\AdGroupRetargetingList\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/AdGroupRetargetingListService?wsdl';
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
