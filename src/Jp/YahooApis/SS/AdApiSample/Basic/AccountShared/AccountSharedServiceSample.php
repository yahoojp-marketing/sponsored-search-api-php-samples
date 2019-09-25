<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AccountShared;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AccountShared\{AccountShared, AccountSharedOperation, AccountSharedSelector, AccountSharedService, get, getResponse, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example AccountSharedService operation and Utility method collection.
 */
class AccountSharedServiceSample
{

    const SERVICE_NAME = 'AccountSharedService';

    /**
     * @var AccountSharedService
     */
    private static $service = null;

    /**
     * AccountSharedServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AccountSharedService::class);
    }

    /**
     * example get account shared lists.
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
     * example mutate account shared lists.
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
     * create basic account shared lists.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();

        $request = self::buildExampleMutateRequest(Operator::ADD, SoapUtils::getAccountId(), [self::createExampleAccountShared()]);
        $response = self::mutate($request);

        $valuesHolder->setAccountSharedValuesList($response->getRval()->getValues());
        return $valuesHolder;
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        if (count($valuesHolder->getAccountSharedValuesList()) > 0) {
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            self::mutate(
                self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                    $valuesRepositoryFacade->getAccountSharedValuesRepository()->getAccountShareds()
                )
            );
        }
    }

    /**
     * example AccountSharedService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesHolder = new ValuesHolder();
        $accountId = SoapUtils::getAccountId();
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);

        try {
            // =================================================================
            // AccountSharedService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createExampleAccountShared()]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesHolder->setAccountSharedValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // AccountSharedService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createSampleSetRequest($valuesRepositoryFacade->getAccountSharedValuesRepository()->getAccountShareds())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // AccountSharedService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getAccountSharedValuesRepository()->getSharedListIds());

            // run
            self::get($getRequest);

            // =================================================================
            // AccountSharedService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getAccountSharedValuesRepository()->getAccountShareds()
            );

            // run
            self::mutate($removeRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $sharedListIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $sharedListIds): get
    {
        $selector = new AccountSharedSelector($accountId);

        if (!is_null($sharedListIds)) {
            $selector->setSharedListIds($sharedListIds);
        }

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param AccountShared[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AccountSharedOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example shared account list request.
     *
     * @return AccountShared
     */
    public static function createExampleAccountShared(): AccountShared
    {
        $operand = new AccountShared();
        $operand->setName('SampleSharedAccount_' . SoapUtils::getCurrentTimestamp());
        return $operand;
    }

    /**
     * example shared account list set request.
     *
     * @param AccountShared[] $accountShareds
     * @return AccountShared[]
     */
    public static function createSampleSetRequest(array $accountShareds): array
    {
        // create operands
        $operands = [];

        foreach ($accountShareds as $accountShared) {
            $operand = new AccountShared();
            $operand->setSharedListId($accountShared->getSharedListId());
            $operand->setName('SampleSharedAccount_UpdateOn_' . $accountShared->getSharedListId() . '_' . SoapUtils::getCurrentTimestamp());
            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AccountSharedServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
