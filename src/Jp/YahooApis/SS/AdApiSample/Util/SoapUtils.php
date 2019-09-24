<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Util;

use Exception;
use ReflectionClass;
use ReflectionException;

/**
 * Utility method collection for PHP Sample Program.
 */
class SoapUtils
{

    /**
     * get Account ID from api_config.ini file.
     *
     * @return int
     */
    public static function getAccountId(): int
    {
        return ACCOUNT_ID;
    }

    /**
     * SoapUtils initialize.
     * @throws Exception
     */
    public static function init()
    {
        if (file_exists(__DIR__ . '/../../../../../../conf/api_config.ini')) {
            $apiConfig = parse_ini_file(__DIR__ . '/../../../../../../conf/api_config.ini');
            // apiVersion
            if (self::isExistsConfiguration('apiVersion', $apiConfig)) {
                self::setConfiguration('API_VERSION', $apiConfig['apiVersion']);
            }
            // apiNamespace
            if (self::isExistsConfiguration('apiNamespace', $apiConfig)) {
                self::setConfiguration('API_NAMESPACE', $apiConfig['apiNamespace']);
            }
            // location
            if (self::isExistsConfiguration('location', $apiConfig, false)) {
                self::setConfiguration('LOCATION', $apiConfig['location']);
            } else {
                self::setConfiguration('LOCATION', 'ss.yahooapis.jp');
            }
            // license
            if (self::isExistsConfiguration('license', $apiConfig)) {
                self::setConfiguration('LICENSE', $apiConfig['license']);
            }
            // apiAccountId
            if (self::isExistsConfiguration('apiAccountId', $apiConfig)) {
                self::setConfiguration('API_ACCOUNT_ID', $apiConfig['apiAccountId']);
            }
            // apiAccountPassword
            if (self::isExistsConfiguration('apiAccountPassword', $apiConfig)) {
                self::setConfiguration('API_ACCOUNT_PASSWORD', $apiConfig['apiAccountPassword']);
            }
            // onBehalfOfAccountId
            if (self::isExistsConfiguration('onBehalfOfAccountId', $apiConfig, false)) {
                self::setConfiguration('ON_BEHALF_OF_ACCOUNT_ID', $apiConfig['onBehalfOfAccountId']);
            }
            // onBehalfOfAccountPassword
            if (self::isExistsConfiguration('onBehalfOfPassword', $apiConfig, false)) {
                self::setConfiguration('ON_BEHALF_OF_PASSWORD', $apiConfig['onBehalfOfPassword']);
            }
            // accountId
            if (self::isExistsConfiguration('accountId', $apiConfig, false)) {
                self::setConfiguration('ACCOUNT_ID', $apiConfig['accountId']);
            }
            // soapConfig
            if (self::isExistsConfiguration('soapConfig', $apiConfig, false)) {
                self::setConfiguration('SOAP_CONFIG', $apiConfig['soapConfig']);
            } else {
                self::setConfiguration('SOAP_CONFIG', false);
            }
        }
    }

    /**
     * get SOAP API ServiceInterface
     *
     * @param string|null $service yahooapis ServiceInterface::class
     * @return Service yahooapis ServiceInterface
     */
    public static function getService(string $service = null): Service
    {
        try {
            $refl = new ReflectionClass($service);
            $tmp = explode('\\', $service);
            $serviceName = end($tmp);
            return $refl->newInstanceArgs([self::getWsdlURL($serviceName), self::getServiceEndPointURL($serviceName)]);
        } catch (ReflectionException $e) {
            print $e->getMessage();
        }
    }

    /**
     * get service WSDL URL.
     *
     * @param string $serviceName SOAP API service name.
     * @return string WSDL URL
     */
    public static function getWsdlURL(string $serviceName): string
    {
        return 'https://' . LOCATION . '/services/' . API_VERSION . '/' . $serviceName . '?wsdl';
    }

    /**
     * get service endpoint URL.
     *
     * @param string $serviceName SOAP API service name
     * @return string endpoint URL
     */
    public static function getServiceEndPointURL(string $serviceName): string
    {
        return 'https://' . LOCATION . '/services/' . API_VERSION . '/' . $serviceName;
    }

    /**
     * get current timestamp value.
     *
     * @return string current timestamp
     */
    public static function getCurrentTimestamp()
    {
        return date('YmdHis');
    }

    /**
     * @param string $key
     * @param array $apiConfig
     * @param bool $isRequired
     * @return bool
     * @throws Exception
     */
    private static function isExistsConfiguration(string $key, array $apiConfig, bool $isRequired = true): bool
    {
        if (array_key_exists($key, $apiConfig) && !is_null($apiConfig[$key]) && $apiConfig[$key] != '') {
            return true;
        } else {
            if ($isRequired) {
                throw new Exception("Setting was not found in api_config.ini, not exist configuration key. : [{$key}]");
            } else {
                return false;
            }
        }
    }

    /**
     * @param string $key
     * @param string $config
     */
    private static function setConfiguration(string $key, string $config): void
    {
        if (!defined($key)) {
            define($key, $config);
        }
    }

    /**
     * download data from url.
     *
     * @param string $download_url
     * @param string $file_name
     * @return void
     */
    public static function download(string $download_url, string $file_name): void
    {
        $file_path = __DIR__ . '/../../../../../../download/' . $file_name;

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

        file_put_contents($file_path, $data);
        curl_close($ch);
    }

    /**
     * upload data to url.
     *
     * @param string $upload_url
     * @param string $file_name
     * @return bool
     */
    public static function upload(string $upload_url, string $file_name)
    {
        $file_path = __DIR__ . '/../../../../../../upload/' . $file_name;

        $req = new \http\Client\Request("POST", $upload_url);
        $client = new \http\Client;

        $req->getBody()->addForm([], [
            [
                "name" => "upfile",
                "type" => "text/csv",
                "file" => $file_path
            ]
        ]);

        echo "------------------------------------\n";
        echo "Start upload. \n";
        echo "UPLOAD_URL  = $upload_url \n";
        echo "UPLOAD_FILE = $file_path \n";
        echo "------------------------------------\n";

        try {
            $client->enqueue($req)->send();
            $response = $client->getResponse($req);
            echo "$response\n";
        } catch (Exception $e) {
            echo "Fail to upload file.\n";
            var_dump($e);
            return false;
        }

        if ($response->getTransferInfo("response_code") != 200) {
            echo "Fail to upload file.\n";
            var_dump($req);
            return false;
        }

        echo "Success to upload file.\n";
        return $response->getBody();
    }
}

SoapUtils::init();
