<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Account;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201909\AccountTrackingUrl\{AccountTrackingUrl,
    AccountTrackingUrlOperation,
    AccountTrackingUrlSelector,
    AccountTrackingUrlService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example AccountTrackingUrlService operation and Utility method collection.
 */
class AccountTrackingUrlServiceSample
{

    const SERVICE_NAME = 'AccountTrackingUrlService';

    /**
     * @var AccountTrackingUrlService
     */
    private static $service = null;

    /**
     * AccountTrackingUrlService constructor.
     */
    private static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AccountTrackingUrlService::class);
    }

    /**
     * example get account trackingUrls.
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
     * example mutate account trackingUrls.
     *
     * @param mutate $request
     * @return mutateResponse
     * @throws Exception
     */
    public static function mutate(mutate $request): mutateResponse
    {
        self::init();

        // Call API
        $response = self::$service->mutate($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example AccountTrackingUrlService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setting
        // =================================================================
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // AccountTrackingUrlService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest([$accountId]);

            // run
            self::get($getRequest);

            // =================================================================
            // AccountTrackingUrlService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, [self::createSampleSetRequest($accountId)]);

            // run
            self::mutate($setRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int[] $accountIds
     * @return get
     */
    public static function buildExampleGetRequest(array $accountIds): get
    {
        $selector = new AccountTrackingUrlSelector();

        if (!is_null($accountIds)) {
            $selector->setAccountIds($accountIds);
        }

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param AccountTrackingUrl[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, array $operand): mutate
    {
        return new mutate(
            new AccountTrackingUrlOperation($operator, $operand)
        );
    }

    /**
     * example account TrackingUrl request.
     *
     * @param int $accountId
     * @return AccountTrackingUrl
     */
    public static function createSampleSetRequest(int $accountId): AccountTrackingUrl
    {
        $operand = new AccountTrackingUrl();
        $operand->setAccountId($accountId);
        $operand->setTrackingUrl('http://www.yahoo.co.jp?url={lpurl}&amp;id={_id1}');
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AccountTrackingUrlServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}

