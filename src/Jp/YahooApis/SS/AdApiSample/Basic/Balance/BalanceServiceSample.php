<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Balance;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201901\Balance\BalanceSelector;
use Jp\YahooApis\SS\V201901\Balance\BalanceService;
use Jp\YahooApis\SS\V201901\Balance\get;
use Jp\YahooApis\SS\V201901\Balance\getResponse;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example BalanceService operation and Utility method collection.
 */
class BalanceServiceSample
{

    const SERVICE_NAME = 'BalanceService';

    /**
     * @var BalanceService
     */
    private static $service = null;

    /**
     * BalanceServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(BalanceService::class);
    }

    /**
     * example get balance.
     *
     * @param get $request
     * @return getResponse
     * @throws Exception
     */
    public static function get(get $request): getResponse
    {
        self::init();

        // Call API
        $response = self::$service->get($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example BalanceService operation.
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
            // BalanceService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId);

            // run
            self::get($getRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId): get
    {
        $selector = new BalanceSelector([$accountId]);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    BalanceServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
