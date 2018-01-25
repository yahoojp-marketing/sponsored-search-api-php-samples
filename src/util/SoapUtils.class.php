<?php
require_once (dirname(__FILE__) . '/Service.class.php');

define('LOCATION_CACHE_FILE', dirname(__FILE__) . '/location_cache.txt');

/**
 * Utility method collection for PHP Sample Program.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class SoapUtils{

    private static $locationCache; // cache of location for accountId.

    /**
     * get Account ID from config file.
     *
     * @return long account ID
     * @access public
     */
    public static function getAccountId(){
        return ACCOUNTID;
    }

    /**
     * get BiddingStrategy ID from config file.
     *
     * @return long biddingStrategy ID
     * @access public
     */
    public static function getBiddingStrategyId(){
        return BIDDINGSTRATEGYID;
    }

    /**
     * get Campaign ID from config file.
     *
     * @return long campaign ID
     * @access public
     */
    public static function getCampaignId(){
        return CAMPAIGNID;
    }

    /**
     * get AppCampaign ID from config file.
     *
     * @return long appCampaign ID
     * @access public
     */
    public static function getAppCampaignId(){
        return APPCAMPAIGNID;
    }

    /**
     * get AdGroup ID from config file.
     *
     * @return long adGroup ID
     * @access public
     */
    public static function getAdGroupId(){
        return ADGROUPID;
    }

    /**
     * get AppAdGroup ID from config file.
     *
     * @return long appAdGroup ID
     * @access public
     */
    public static function getAppAdGroupId(){
        return APPADGROUPID;
    }

    /**
     * get AdGroupCriterion ID from config file.
     *
     * @return string adGroupCriterion ID
     * @access public
     */
    public static function getAdGroupCriterionIds(){
        return ADGROUPCRITERIONIDS;
    }

    /**
     * get FeedFolder ID from config file.
     *
     * @return long feedFolder ID
     * @access public
     */
    public static function getFeedFolderId(){
        return FEEDFOLDERID;
    }

    /**
     * get Integer Type FeedAttribute ID from config file.
     *
     * @return long Integer Type FeedAttribute ID
     * @access public
     */
    public static function getIntegerFeedAttributeId(){
        return INTEGERFEEDATTRIBUTEID;
    }

    /**
     * get Price Type FeedAttribute ID from config file.
     *
     * @return long Price Type FeedAttribute ID
     * @access public
     */
    public static function getPriceFeedAttributeId(){
        return PRICEFEEDFOLDERID;
    }

    /**
     * get Date Type FeedAttribute ID from config file.
     *
     * @return long Date Type FeedAttribute ID
     * @access public
     */
    public static function getDateFeedAttributeId(){
        return DATEFEEDFOLDERID;
    }

    /**
     * get String Type FeedAttribute ID from config file.
     *
     * @return long String Type FeedAttribute ID
     * @access public
     */
    public static function getStringFeedAttributeId(){
        return STRINGFEEDFOLDERID;
    }

    /**
     * get TargetList ID from config file.
     *
     * @return long TargetList ID
     * @access public
     */
    public static function getTargetListId(){
        return TARGETLISTID;
    }

    /**
     * get service WSDL URL.
     *
     * @param string $service_name SOAP API service name.
     * @return string WSDL URL
     * @access public
     */
    public static function getWsdlURL($service_name){
        return 'https://' . LOCATION . '/services/' . API_VERSION . '/' . $service_name . '?wsdl';
    }

    /**
     * get service endpoint URL.
     *
     * @param string $service_name SOAP API service name
     * @return string endpoint URL
     * @access public
     */
    public static function getServiceEndPointURL($service_name){
        return 'https://' . self::getLocation(self::getAccountId()) . '/services/' . API_VERSION . '/' . $service_name;
    }

    /**
     * get location for accountId.
     *
     * @return colocation server name for accountId.
     * @access public
     */
    public static function getLocation($accountId){
        if(isset(self::$locationCache[$accountId])){
            return self::$locationCache[$accountId];
        }else{
            // read location cache file
            self::$locationCache = array();
            if(is_readable(LOCATION_CACHE_FILE)){
                $cache = file_get_contents(LOCATION_CACHE_FILE);
                self::$locationCache = unserialize($cache);
            }

            if(isset(self::$locationCache[$accountId])){
                // return cached location
                $cachedLocation = self::$locationCache[$accountId];
            }else{
                // get LocationService Stub
                $locationService = self::getService('LocationService');
                // call API
                $response = $locationService->invoke('get', array(
                    'accountId' => $accountId
                ));
                // response
                if(isset($response->rval->value)){
                    // save cache
                    $cachedLocation = $response->rval->value;
                    self::$locationCache[$accountId] = $cachedLocation;
                    $cache = serialize(self::$locationCache);
                    file_put_contents(LOCATION_CACHE_FILE, $cache);
                }else{
                    echo 'Error : Fail to get Location.';
                    exit();
                }
            }
            return $cachedLocation;
        }
    }

    /**
     * download data from url.
     *
     * @param string $download_url download url
     * @param string $file_name save file name(not path, file name only).
     * @access public
     */
    public static function download($download_url, $file_name){
        $file_path = dirname(__FILE__) . '/../../download/' . $file_name;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $download_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        echo "------------------------------------\n";
        echo "Start download. \n";
        echo "DOWNLOAD_URL  = $download_url \n";
        echo "DOWNLOAD_FILE = $file_path \n";
        echo "------------------------------------\n";

        $data = curl_exec($ch);
        echo $data;

        file_put_contents($file_path, $data);
        curl_close($ch);
    }

    /**
     * upload data to url.
     *
     * @param string $upload_url upload url
     * @param string $file_name upload file name(not path, file name only).
     * @access public
     */
    public static function upload($upload_url, $file_name){
        $file_path = dirname(__FILE__) . '/../../upload/' . $file_name;

        $req = new HttpRequest($upload_url, HttpRequest::METH_POST);

        $req->addPostFile('upfile', $file_path);

        echo "------------------------------------\n";
        echo "Start upload. \n";
        echo "UPLOAD_URL  = $upload_url \n";
        echo "UPLOAD_FILE = $file_path \n";
        echo "------------------------------------\n";

        try{
            $message = $req->send();
            echo "$message\n";
        }catch(Exception $e){
            echo 'Fail to upload file.';
            var_dump($e);
            return false;
        }

        if($req->getResponseCode() != 200){
            echo 'Fail to upload file.';
            var_dump($req);
            return false;
        }

        echo 'Success to upload file.';
        return $message->getBody();
    }

    /**
     * get SOAP API Service Stub Object
     *
     * @param string $service_name SOAP API Service Name
     * @return Service SOAP API Service Stub Object
     * @access public
     */
    public static function getService($service_name){
        if($service_name === 'LocationService'){
            return new Service(self::getWsdlURL('LocationService'), 'https://' . LOCATION . '/services/' . API_VERSION . '/LocationService');
        }else{
            return new Service(self::getWsdlURL($service_name), self::getServiceEndPointURL($service_name));
        }
    }

    /**
     * get current timestamp value.
     *
     * @return current timestamp
     * @access public
     */
    public static function getCurrentTimestamp(){
        return date("YmdHis");
    }

    /**
     * convert from Soap Response Object to array
     *
     * @param object $soapResponseObject
     * @return array soap response
     */
    public static function convertArray($soapResponseObject){
        $list = (array) $soapResponseObject;
        foreach($list as $key => $value){
            if(is_object($value) || is_array($value)){
                $list[$key] = self::convertArray($value);
            }
        }
        return $list;
    }
    /**
     * encoding from Array to SoapVar.
     *
     * @param array $data
     * @param $type_name
     * @param $service_name
     * @param $node_name
     * @return array
     */
    public static function encodingSoapVar(array $data, $type_name, $service_name, $node_name){
        $result = array();
        if (isset($type_name) && isset($service_name)) {
            $result = new SoapVar($data, SOAP_ENC_OBJECT, $type_name, API_NS . '/' . $service_name, $node_name, XMLSCHEMANS);
        }
        return $result;
    }
}
