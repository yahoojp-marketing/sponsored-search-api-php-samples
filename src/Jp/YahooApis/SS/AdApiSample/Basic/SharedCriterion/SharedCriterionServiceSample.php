<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\SharedCriterion;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AccountShared\AccountSharedServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\Paging;
use Jp\YahooApis\SS\V201909\SharedCriterion\get;
use Jp\YahooApis\SS\V201909\SharedCriterion\getResponse;
use Jp\YahooApis\SS\V201909\SharedCriterion\KeywordMatchType;
use Jp\YahooApis\SS\V201909\SharedCriterion\mutate;
use Jp\YahooApis\SS\V201909\SharedCriterion\mutateResponse;
use Jp\YahooApis\SS\V201909\SharedCriterion\Operator;
use Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion;
use Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionOperation;
use Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector;
use Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionService;

/**
 * example SharedCriterionService operation and Utility method collection.
 */
class SharedCriterionServiceSample
{

    const SERVICE_NAME = 'SharedCriterionService';

    /**
     * @var SharedCriterionService
     */
    private static $service = null;

    /**
     * SharedCriterionServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(SharedCriterionService::class);
    }

    /**
     * example get shared criterions.
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
     * example mutate shared criterions.
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
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        return AccountSharedServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        AccountSharedServiceSample::cleanup($valuesHolder);
    }

    /**
     * example CampaignSharedSetService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesHolder = new ValuesHolder();
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // check & create upper service object.
            // =================================================================
            $valuesHolder = self::setup();
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            $sharedListId = $valuesRepositoryFacade->getAccountSharedValuesRepository()->getSharedListIds()[0];

            // =================================================================
            // SharedCriterionService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleSharedCriterion($sharedListId)
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $sharedCriterions = [];
            $criterionIds = [];
            foreach ($addResponse->getRval()->getValues() as $sharedCriterionValues) {
                $sharedCriterions[] = $sharedCriterionValues->getSharedCriterion();
                $criterionIds[] = $sharedCriterionValues->getSharedCriterion()->getCriterionId();
            }

            // =================================================================
            // SharedCriterionService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$sharedListId], $criterionIds);

            // run
            self::get($getRequest);

            // =================================================================
            // SharedCriterionService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $sharedCriterions);

            // run
            self::mutate($removeRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            self::cleanup($valuesHolder);
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $sharedListIds
     * @param int[] $criterionIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $sharedListIds, array $criterionIds): get
    {
        $selector = new SharedCriterionSelector($accountId);

        if (!is_null($sharedListIds)) {
            $selector->setSharedListIds($sharedListIds);
        }
        if (!is_null($criterionIds)) {
            $selector->setCriterionIds($criterionIds);
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
     * @param SharedCriterion[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new SharedCriterionOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example SharedCriterion request.
     *
     * @param int $sharedListId
     * @return SharedCriterion
     */
    public static function createExampleSharedCriterion(int $sharedListId): SharedCriterion
    {
        $operand = new SharedCriterion();
        $operand->setSharedListId($sharedListId);
        $operand->setText('sample text ' . SoapUtils::getCurrentTimestamp() . ' ' . $sharedListId);
        $operand->setMatchType(KeywordMatchType::BROAD);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    SharedCriterionServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
