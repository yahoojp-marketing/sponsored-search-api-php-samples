<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignCriterion;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignCriterion\{CampaignCriterion,
    CampaignCriterionOperation,
    CampaignCriterionSelector,
    CampaignCriterionService,
    CampaignCriterionUse,
    CampaignCriterionValues,
    CriterionType,
    get,
    getResponse,
    Keyword,
    KeywordMatchType,
    mutate,
    mutateResponse,
    NegativeCampaignCriterion,
    Operator};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignCriterionService operation and Utility method collection.
 */
class CampaignCriterionServiceSample
{

    const SERVICE_NAME = 'CampaignCriterionService';

    /**
     * @var CampaignCriterionService
     */
    private static $service = null;

    /**
     * CampaignCriterionServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignCriterionService::class);
    }

    /**
     * example get campaign criterions.
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
     * example mutate campaign criterions.
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
        return CampaignServiceSample::create();
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
    }

    /**
     * example CampaignCriterionService operation.
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(
                CampaignType::STANDARD
            );

            // =================================================================
            // CampaignCriterionService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleNegativeCampaignCriterion($campaignId),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $campaignCriterions = [];
            foreach ($addResponse->getRval()->getValues() as $campaignCriterionValues) {
                $campaignCriterions[] = $campaignCriterionValues->getCampaignCriterion();
            }

            // =================================================================
            // CampaignCriterionService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $campaignCriterions);

            // run
            self::get($getRequest);

            // =================================================================
            // CampaignCriterionService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $campaignCriterions);

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
     * @param CampaignCriterion[] $campaignCriterions
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignCriterions): get
    {
        $selector = new CampaignCriterionSelector($accountId);

        if (!is_null($campaignCriterions)) {
            $campaignIds = [];
            $criterionIds = [];
            foreach ($campaignCriterions as $campaignCriterion) {
                $campaignIds[] = $campaignCriterion->getCampaignId();
                $criterionIds[] = $campaignCriterion->getCriterion()->getCriterionId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setCriterionIds($criterionIds);
        }

        $selector->setCriterionUse(CampaignCriterionUse::NEGATIVE);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);

        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignCriterion[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignCriterionOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example campaign criterion request.
     *
     * @param int $campaignId
     * @return CampaignCriterion
     */
    public static function createExampleNegativeCampaignCriterion(int $campaignId): CampaignCriterion
    {
        $criterion = new Keyword();
        $criterion->setType(CriterionType::KEYWORD);
        $criterion->setText('sample text');
        $criterion->setMatchType(KeywordMatchType::PHRASE);

        $campaignCriterion = new NegativeCampaignCriterion(CampaignCriterionUse::NEGATIVE, $criterion);
        $campaignCriterion->setCampaignId($campaignId);

        return $campaignCriterion;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignCriterionServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
