<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Dictionary;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201901\Dictionary\DictionaryLang;
use Jp\YahooApis\SS\V201901\Dictionary\DictionaryService;
use Jp\YahooApis\SS\V201901\Dictionary\DisapprovalReasonSelector;
use Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationSelector;
use Jp\YahooApis\SS\V201901\Dictionary\getDisapprovalReason;
use Jp\YahooApis\SS\V201901\Dictionary\getDisapprovalReasonResponse;
use Jp\YahooApis\SS\V201901\Dictionary\getGeographicLocation;
use Jp\YahooApis\SS\V201901\Dictionary\getGeographicLocationResponse;

/**
 * example DictionaryService operation and Utility method collection.
 */
class DictionaryServiceSample
{

    const SERVICE_NAME = 'DictionaryService';

    /**
     * @var DictionaryService
     */
    private static $service = null;

    /**
     * DictionaryServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(DictionaryService::class);
    }

    /**
     * example getGeographicLocation.
     *
     * @param getGeographicLocation $request
     * @return getGeographicLocationResponse
     * @throws Exception
     */
    public static function getGeographicLocation(getGeographicLocation $request): getGeographicLocationResponse
    {
        self::init();

        // Call API
        $response = self::$service->getGeographicLocation($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getGeographicLocation.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getGeographicLocation.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/getGeographicLocation.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example getDisapprovalReason.
     *
     * @param getDisapprovalReason $request
     * @return getDisapprovalReasonResponse
     * @throws Exception
     */
    public static function getDisapprovalReason(getDisapprovalReason $request): getDisapprovalReasonResponse
    {
        self::init();

        // Call API
        $response = self::$service->getDisapprovalReason($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getDisapprovalReason.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getDisapprovalReason.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/getDisapprovalReason.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example DictionaryService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // DictionaryService GetGeographicLocation
            // =================================================================
            // create request.
            $getGeographicLocationRequest = self::buildExampleGetGeographicLocationRequest();

            // run
            self::getGeographicLocation($getGeographicLocationRequest);

            // =================================================================
            // DictionaryService GetDisapprovalReason
            // =================================================================
            // create request.
            $getDisapprovalReasonRequest = self::buildExampleGetDisapprovalReasonRequest();

            // run
            self::getDisapprovalReason($getDisapprovalReasonRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example getGeographicLocation request.
     *
     * @return getGeographicLocation
     */
    public static function buildExampleGetGeographicLocationRequest(): getGeographicLocation
    {
        return new getGeographicLocation(
            new GeographicLocationSelector(DictionaryLang::EN)
        );
    }

    /**
     * example getDisapprovalReason request.
     *
     * @return getDisapprovalReason
     */
    public static function buildExampleGetDisapprovalReasonRequest(): getDisapprovalReason
    {
        return new getDisapprovalReason(
            new DisapprovalReasonSelector(DictionaryLang::EN)
        );
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    DictionaryServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
