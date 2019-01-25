<?php

namespace Jp\YahooApis\SS\V201901\ReportDefinition;

class ReportDefinitionService extends \Jp\YahooApis\SS\AdApiSample\Util\Service
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
      'ReportDefinitionSelector' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionSelector',
      'ReportDefinition' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinition',
      'ReportFieldAttribute' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportFieldAttribute',
      'ReportDateRange' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDateRange',
      'ReportSortField' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportSortField',
      'ReportFilter' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportFilter',
      'ReportDefinitionPage' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionPage',
      'ReportDefinitionValues' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionValues',
      'ReportDefinitionOperation' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionOperation',
      'Operation' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\Operation',
      'ReportDefinitionReturnValue' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionReturnValue',
      'ReportDefinitionFieldValue' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\ReportDefinitionFieldValue',
      'get' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\get',
      'getResponse' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\getResponse',
      'mutate' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\mutateResponse',
      'getReportFields' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\getReportFields',
      'getReportFieldsResponse' => 'Jp\\YahooApis\\SS\\V201901\\ReportDefinition\\getReportFieldsResponse',
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
        $wsdl = 'https://ss.yahooapis.jp/services/V201901/ReportDefinitionService?wsdl';
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
     * @param getReportFields $parameters
     * @return getReportFieldsResponse
     */
    public function getReportFields(getReportFields $parameters)
    {
      return parent::invoke('getReportFields', $parameters);
    }

}
