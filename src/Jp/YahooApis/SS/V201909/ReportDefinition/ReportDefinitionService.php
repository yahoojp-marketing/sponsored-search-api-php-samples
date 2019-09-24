<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class ReportDefinitionService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'ReportDefinitionSelector' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionSelector',
      'ReportFieldAttribute' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportFieldAttribute',
      'ReportDefinition' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinition',
      'ReportDateRange' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDateRange',
      'ReportSortField' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportSortField',
      'ReportFilter' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportFilter',
      'ReportDefinitionFieldValue' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionFieldValue',
      'ReportDefinitionPage' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionPage',
      'ReportDefinitionValues' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionValues',
      'ReportDefinitionOperation' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionOperation',
      'ReportDefinitionReturnValue' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\ReportDefinitionReturnValue',
      'Operation' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\Operation',
      'getReportFields' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\getReportFields',
      'getReportFieldsResponse' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\getReportFieldsResponse',
      'get' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201909\\ReportDefinition\\mutateResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201909/ReportDefinitionService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
    }

    /**
     * @param getReportFields $parameters
     * @return getReportFieldsResponse
     */
    public function getReportFields(getReportFields $parameters)
    {
      return parent::invoke('getReportFields', $parameters);
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
