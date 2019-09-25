<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class CampaignExportService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'CampaignExportPage' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\CampaignExportPage',
      'CampaignExportReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\CampaignExportReturnValue',
      'CampaignExportValues' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\CampaignExportValues',
      'Job' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\Job',
      'ExportSetting' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\ExportSetting',
      'JobSelector' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\JobSelector',
      'CampaignExportFieldAttribute' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\CampaignExportFieldAttribute',
      'CampaignExportFieldValue' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\CampaignExportFieldValue',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\getResponse',
      'addJob' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\addJob',
      'addJobResponse' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\addJobResponse',
      'getExportFields' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\getExportFields',
      'getExportFieldsResponse' => 'Jp\\YahooApis\\SS\\V201909\\CampaignExport\\getExportFieldsResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/CampaignExportService?wsdl';
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
     * @param addJob $parameters
     * @return addJobResponse
     */
    public function addJob(addJob $parameters)
    {
      return parent::invoke('addJob', $parameters);
    }

    /**
     * @param getExportFields $parameters
     * @return getExportFieldsResponse
     */
    public function getExportFields(getExportFields $parameters)
    {
      return parent::invoke('getExportFields', $parameters);
    }

}
