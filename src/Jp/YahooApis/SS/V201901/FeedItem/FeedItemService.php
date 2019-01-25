<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class FeedItemService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'FeedItem' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItem',
      'FeedItemSelector' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemSelector',
      'FeedItemAttribute' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemAttribute',
      'SimpleFeedItemAttribute' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\SimpleFeedItemAttribute',
      'MultipleFeedItemAttribute' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\MultipleFeedItemAttribute',
      'FeedAttributeValue' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedAttributeValue',
      'FeedItemScheduling' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemScheduling',
      'FeedItemSchedule' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemSchedule',
      'TargetingCampaign' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\TargetingCampaign',
      'TargetingAdGroup' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\TargetingAdGroup',
      'TargetingKeyword' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\TargetingKeyword',
      'Location' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\Location',
      'CustomParameters' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\CustomParameters',
      'CustomParameter' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\CustomParameter',
      'FeedItemPage' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemPage',
      'FeedItemValues' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemValues',
      'FeedItemOperation' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemOperation',
      'FeedItemReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\FeedItemReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\Operation',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\FeedItem\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/FeedItemService?wsdl';
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
