<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignSharedSet;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AccountShared\AccountSharedServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignSharedSet\{CampaignSharedSet, CampaignSharedSetOperation, CampaignSharedSetSelector, CampaignSharedSetService, get, getResponse, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignSharedSetService operation and Utility method collection.
 */
class CampaignSharedSetServiceSample
{

    const SERVICE_NAME = 'CampaignSharedSetService';

    /**
     * @var CampaignSharedSetService
     */
    private static $service = null;

    /**
     * CampaignSharedSetServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignSharedSetService::class);
    }

    /**
     * example get campaign shared sets.
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
     * example mutate campaign shared sets.
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
        $accountSharedValuesHolder = AccountSharedServiceSample::create();
        $campaignValuesHolder = CampaignServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setAccountSharedValuesList($accountSharedValuesHolder->getAccountSharedValuesList());
        $selfValuesHolder->setCampaignValuesList($campaignValuesHolder->getCampaignValuesList());
        return $selfValuesHolder;
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        CampaignServiceSample::cleanup($valuesHolder);
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);

            // =================================================================
            // CampaignSharedSetService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleCampaignSharedSet($sharedListId, $campaignId)
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $campaignSharedSets = [];
            foreach ($addResponse->getRval()->getValues() as $campaignSharedSetValues) {
                $campaignSharedSets[] = $campaignSharedSetValues->getCampaignSharedSet();
            }

            // =================================================================
            // CampaignSharedSetService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$sharedListId], [$campaignId]);

            // run
            self::get($getRequest);

            // =================================================================
            // CampaignSharedSetService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $campaignSharedSets);

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
     * @param int[] $campaignIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $sharedListIds, array $campaignIds): get
    {
        $selector = new CampaignSharedSetSelector($accountId);

        if (!is_null($sharedListIds)) {
            $selector->setSharedListIds($sharedListIds);
        }
        if (!is_null($campaignIds)) {
            $selector->setCampaignIds($campaignIds);
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
     * @param CampaignSharedSet[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignSharedSetOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example CampaignSharedSet request.
     *
     * @param int $sharedListId
     * @param int $campaignId
     * @return CampaignSharedSet
     */
    public static function createExampleCampaignSharedSet(int $sharedListId, int $campaignId): CampaignSharedSet
    {
        $operand = new CampaignSharedSet();
        $operand->setSharedListId($sharedListId);
        $operand->setCampaignId($campaignId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignSharedSetServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
