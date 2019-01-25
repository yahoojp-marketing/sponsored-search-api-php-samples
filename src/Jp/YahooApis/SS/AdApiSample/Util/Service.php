<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Util;

use DOMDocument;
use SoapFault;
use SoapHeader;

/**
 * Utility method collection for PHP Sample Program.
 */
abstract class Service extends \SoapClient
{

    /**
     * @var string $serviceName Service Name
     */
    private $serviceName;

    /**
     * @var string $serviceWsdl Service WSDL URL
     */
    private $serviceWsdl;

    /**
     * @var string $serviceEndpoint Service Endpoint URL
     */
    private $serviceEndpoint;

    /**
     * Service constructor.
     *
     * @param string $wsdl Service WSDL URL
     * @param string $endpoint Service Endpont URL
     * @param array $options Soap Options
     */
    public function __construct(string $wsdl, string $endpoint, array $options = [])
    {
        ini_set('soap.wsdl_cache_enabled', '0');

        $defaultOptions = [
            'location' => $endpoint,
            'uri' => API_NAMESPACE,
            'trace' => true,
        ];
        if (SOAP_CONFIG) {
            $defaultOptions['stream_context'] = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
        }
        parent::__construct($wsdl, array_merge_recursive($defaultOptions, $options));

        $this->serviceWsdl = $wsdl;
        $this->serviceEndpoint = $endpoint;
        $this->serviceName = preg_replace('/http?s:\/\/.*\/services\/V.*\/(.*)Service\?wsdl/', '$1', $wsdl);
    }

    /**
     * overwrite SoapClient::__doRequest
     *
     * @param string $request SOAP Request Array
     * @param string $location Service Endpoint URL
     * @param string $action SOAP Action
     * @param int $version API Version
     * @param int $one_way if 1, this method return nothing.
     * @return string SOAP Response
     */
    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        //----------------------------------
        // display request.
        //----------------------------------
        $doc = new DOMDocument('1.0');
        $doc->loadXML($request);
        $doc->formatOutput = true;
        $timestamp = date('Y/m/d H:i:s');
        print '--------------------------------------------' . PHP_EOL;
        print "[{$timestamp}] : SOAP Request" . PHP_EOL;
        print '--------------------------------------------' . PHP_EOL;
        print $doc->saveXML();
        print PHP_EOL . PHP_EOL;
        @ob_flush();
        flush();

        return parent::__doRequest($request, $location, $action, $version);
    }

    /**
     * execute SOAP Function.
     *
     * @param string $function SOAP Action
     * @param array $param SOAP Request
     * @return array SOAP Response
     * @access public
     * @throws SoapFault
     */
    protected function invoke($function, $param)
    {
        try {
            //----------------------------------
            // set soap SoapHeader
            //----------------------------------
            // api_account
            $header = new \Jp\YahooApis\SS\V201901\SoapHeader(LICENSE, API_ACCOUNT_ID, API_ACCOUNT_PASSWORD);

            // on_behalf_of_account
            if (defined('ON_BEHALF_OF_ACCOUNT_ID') && ON_BEHALF_OF_ACCOUNT_ID !== '' && defined('ON_BEHALF_OF_PASSWORD') && ON_BEHALF_OF_PASSWORD !== '') {
                $header->setOnBehalfOfAccountId(ON_BEHALF_OF_ACCOUNT_ID);
                $header->setApiAccountPassword(ON_BEHALF_OF_PASSWORD);
            }
            $this->__setSoapHeaders(new SoapHeader(API_NAMESPACE . '/' . $this->serviceName, 'RequestHeader', $header));

            //----------------------------------
            // call WebAPI
            //----------------------------------
            print PHP_EOL . '============================================' . PHP_EOL;
            print "WSDL={$this->serviceWsdl}" . PHP_EOL;
            print "Location={$this->serviceEndpoint}" . PHP_EOL;
            print "Function={$function}" . PHP_EOL;
            print '============================================' . PHP_EOL;
            @ob_flush();
            flush();
            $response = $this->__soapCall($function, array($param));

            //----------------------------------
            // display Response
            //----------------------------------
            $timestamp = date('Y/m/d H:i:s');
            print '--------------------------------------------' . PHP_EOL;
            print "[{$timestamp}] : Normal SOAP Response" . PHP_EOL;
            print '--------------------------------------------' . PHP_EOL;
            $doc = new DOMDocument();
            $doc->loadXML($this->__getLastResponse());
            $doc->formatOutput = true;
            print $doc->saveXML();
            print PHP_EOL . PHP_EOL;
            @ob_flush();
            flush();

            return $response;

        } catch (SOAPFault $e) {

            print '--------------------------------------------' . PHP_EOL;
            print 'Error SOAP Response' . PHP_EOL;
            print '--------------------------------------------' . PHP_EOL;

            if (is_null($this->__getLastResponse())) {
                echo print_r($e, true);

            } else {
                $doc = new DOMDocument();
                print $this->__getLastRequestHeaders();
                $doc->loadXML($this->__getLastResponse());
                $doc->formatOutput = true;
                print $doc->saveXML();
            }
            @ob_flush();
            flush();

            throw $e;
        }
    }
}
