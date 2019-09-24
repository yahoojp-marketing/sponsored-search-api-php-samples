<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RetargetingListService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'TargetingList' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\TargetingList',
      'RetargetingAccountStatus' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingAccountStatus',
      'DefaultTargetList' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\DefaultTargetList',
      'Tag' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\Tag',
      'RuleBaseTargetList' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RuleBaseTargetList',
      'RuleGroup' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RuleGroup',
      'RuleItem' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RuleItem',
      'UrlRuleItem' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\UrlRuleItem',
      'CustomKeyRuleItem' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\CustomKeyRuleItem',
      'LogicalTargetList' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\LogicalTargetList',
      'LogicalGroup' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\LogicalGroup',
      'LogicalRuleOperand' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\LogicalRuleOperand',
      'RetargetingListSelector' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListSelector',
      'GetCustomKeySelector' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\GetCustomKeySelector',
      'CustomKey' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\CustomKey',
      'RetargetingListPage' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListPage',
      'RetargetingListValues' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListValues',
      'RetargetingListOperation' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListOperation',
      'RetargetingListReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListReturnValue',
      'RetargetingListCustomKeyPage' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\RetargetingListCustomKeyPage',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\mutateResponse',
      'getCustomKey' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\getCustomKey',
      'getCustomKeyResponse' => 'Jp\\YahooApis\\SS\\V201909\\RetargetingList\\getCustomKeyResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/RetargetingListService?wsdl';
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
     * @param getCustomKey $parameters
     * @return getCustomKeyResponse
     */
    public function getCustomKey(getCustomKey $parameters)
    {
      return parent::invoke('getCustomKey', $parameters);
    }

}
