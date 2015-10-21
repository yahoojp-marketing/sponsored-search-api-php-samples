<?php
/**
 * Utility method collection for PHP Sample Program.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class Service extends SoapClient {

    private $service_wsdl;      //Service WSDL URL
    private $service_endpoint;  //Service Endpoint URL

    /**
     * __construct() : constructor
     *
     * @param string $wsdl      Service WSDL URL
     * @param string $endpoint  Service Endpont URL
     * @access public
     */
    public function __construct($wsdl, $endpoint){
        ini_set("soap.wsdl_cache_enabled", "0");
        parent::__construct($wsdl, array("location"=>$endpoint,"uri"=>API_NS,"trace"=>true));
        $this->service_wsdl = $wsdl;
        $this->service_endpoint = $endpoint;
    }

    /**
     * overwrite SoapClient::__doRequest
     *
     * @param array $request    SOAP Request Array
     * @param string $location  Service Endpoint URL
     * @param string $saction   SOAP Action
     * @param string $version   API Version
     * @param integer $one_way  if 1, this method return nothing.
     * @return string SOAP Response
     */
    function __doRequest($request, $location, $saction, $version, $one_way = 0) {
        $doc = new DOMDocument("1.0");
        $doc->loadXML($request);
        $doc->formatOutput = true;

        $envelope = $doc->documentElement;
        $soapNS = $envelope->namespaceURI;
        $soapPFX = $envelope->prefix;

        $header = $doc->createElementNS($soapNS, $soapPFX.":Header");
        $envelope->insertBefore($header, $envelope->firstChild);

        $license = $doc->createElement("ns1:license");
        $license->nodeValue = LICENSE;
        $user = $doc->createElement("ns1:apiAccountId");
        $user->nodeValue = APIACCOUNTID;
        $pass = $doc->createElement("ns1:apiAccountPassword");
        $pass->nodeValue = APIACCOUNTPASSWORD;

        if (ONBEHALFOFACCOUNTID !== "" && ONBEHALFOFPASSWORD !== "") {
            $onb = $doc->createElement("ns1:onBehalfOfAccountId");
            $onb->nodeValue = ONBEHALFOFACCOUNTID;
            $onbp = $doc->createElement("ns1:onBehalfOfPassword");
            $onbp->nodeValue = ONBEHALFOFPASSWORD;
            $onbaccountId = $doc->createElement("ns1:accountId");
            $onbaccountId->nodeValue = ACCOUNTID;
        }

        $requestHeader = $doc->createElement("ns1:RequestHeader");

        $requestHeader->appendChild($license);
        $requestHeader->appendChild($user);
        $requestHeader->appendChild($pass);

        $header->appendChild($requestHeader);

        if (ONBEHALFOFACCOUNTID !== "" && ONBEHALFOFPASSWORD !== "") {
            $requestHeader->appendChild($onb);
            $requestHeader->appendChild($onbp);
            $requestHeader->appendChild($onbaccountId);
        }
        $timestamp = date("Y/m/d H:i:s");
        echo "[".$timestamp."]\n";
        echo "----------------------\n";
        echo "SOAP Request:\n";
        echo "----------------------\n";
        echo $doc->saveXML();
        echo "\n";

        return parent::__doRequest($doc->saveXML(), $location, $saction, $version);
    }

    /**
     * execute SOAP Function.
     *
     * @param string $function SOAP Action
     * @param array $param  SOAP Request
     * @return array SOAP Response
     * @access public
     */
    public function invoke($function, $param){
        try {
            //----------------------------------
            // call WebAPI
            //----------------------------------
            echo "\n========================================\n";
            echo "WSDL=".$this->service_wsdl."\n";
            echo "Location=".$this->service_endpoint."\n";
            echo "Function=".$function;
            echo "\n========================================\n";
            $response = $this->__soapCall($function, array($function => $param));

            //----------------------------------
            // display Response
            //----------------------------------
            echo "----------------------\n";
            echo "Normal SOAP Response:\n";
            echo "----------------------\n";
            $doc = new DOMDocument();
            $doc->loadXML($this->__getLastResponse());
            $doc->formatOutput = true;
            echo $doc->saveXML();
            echo "\n\n";

            return $response;

        }catch (SOAPFault  $e) {
            echo "Error! \n";
            if(is_null($this->__getLastResponse())){
                echo print_r($e, true);
            }else{
                echo "Error response:\n";
                $doc = new DOMDocument();
                $doc->loadXML($this->__getLastResponse());
                $doc->formatOutput = true;
                echo $doc->saveXML();
            }
        }
    }
}
