<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class CampaignService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignSelector' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignSelector',
      'Campaign' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\Campaign',
      'Budget' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\Budget',
      'CampaignSettings' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignSettings',
      'GeoTargetTypeSetting' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\GeoTargetTypeSetting',
      'DynamicAdsForSearchSetting' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\DynamicAdsForSearchSetting',
      'TargetingSetting' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\TargetingSetting',
      'CampaignBiddingStrategy' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignBiddingStrategy',
      'BiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\BiddingScheme',
      'ManualCpcBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\ManualCpcBiddingScheme',
      'PageOnePromotedBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\PageOnePromotedBiddingScheme',
      'TargetCpaBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\TargetCpaBiddingScheme',
      'TargetSpendBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\TargetSpendBiddingScheme',
      'TargetRoasBiddingScheme' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\TargetRoasBiddingScheme',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CustomParameter',
      'UrlReviewData' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\UrlReviewData',
      'ReviewUrl' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\ReviewUrl',
      'Label' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\Label',
      'CampaignPage' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignPage',
      'CampaignValues' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignValues',
      'CampaignOperation' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\Operation',
      'CampaignReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\CampaignReturnValue',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\Campaign\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/CampaignService?wsdl';
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
