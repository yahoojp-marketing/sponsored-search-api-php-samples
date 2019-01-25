<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class RetargetingListService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'TargetingList' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\TargetingList',
      'RetargetingAccountStatus' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingAccountStatus',
      'DefaultTargetList' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\DefaultTargetList',
      'Tag' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\Tag',
      'RuleBaseTargetList' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RuleBaseTargetList',
      'RuleGroup' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RuleGroup',
      'RuleItem' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RuleItem',
      'UrlRuleItem' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\UrlRuleItem',
      'CustomKeyRuleItem' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\CustomKeyRuleItem',
      'LogicalTargetList' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\LogicalTargetList',
      'LogicalGroup' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\LogicalGroup',
      'LogicalRuleOperand' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\LogicalRuleOperand',
      'RetargetingListSelector' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListSelector',
      'GetCustomKeySelector' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\GetCustomKeySelector',
      'CustomKey' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\CustomKey',
      'RetargetingListPage' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListPage',
      'RetargetingListValues' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListValues',
      'RetargetingListOperation' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListOperation',
      'RetargetingListReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListReturnValue',
      'RetargetingListCustomKeyPage' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\RetargetingListCustomKeyPage',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\mutateResponse',
      'getCustomKey' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\getCustomKey',
      'getCustomKeyResponse' => 'Jp\\YahooApis\\SS\\V201901\\RetargetingList\\getCustomKeyResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/RetargetingListService?wsdl';
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
