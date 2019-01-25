<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\BiddingStrategy;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\BiddingStrategy\{BidChangesForRaisesOnly,
    BiddingStrategy,
    BiddingStrategyOperation,
    BiddingStrategySelector,
    BiddingStrategyService,
    BiddingStrategyType,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    PageOnePromotedBiddingScheme,
    RaiseBidWhenBudgetConstrained,
    RaiseBidWhenLowQualityScore,
    TargetCpaBiddingScheme,
    TargetRoasBiddingScheme,
    TargetSpendBiddingScheme};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example BiddingStrategyService operation and Utility method collection.
 */
class BiddingStrategyServiceSample
{

    const SERVICE_NAME = 'BiddingStrategyService';

    /**
     * @var BiddingStrategyService
     */
    private static $service = null;

    /**
     * BiddingStrategyServiceSample constructor.
     */
    private static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(BiddingStrategyService::class);
    }

    /**
     * example get biddingStrategies.
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
     * example mutate biddingStrategies.
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
     * create basic BiddingStrategy.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();
        $request = self::buildExampleMutateRequest(Operator::ADD, SoapUtils::getAccountId(), [
            self::createExamplePageOnePromotedBidding(),
        ]);
        $response = self::mutate($request);
        $valuesHolder->setBiddingStrategyValuesList($response->getRval()->getValues());
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
        if (count($valuesHolder->getBiddingStrategyValuesList()) === 0) {
            return;
        }
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        self::mutate(
            self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategies()
            )
        );
    }

    /**
     * example BiddingStrategyService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setting
        // =================================================================
        $valuesRepositoryFacade = new ValuesRepositoryFacade(new ValuesHolder());
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // BiddingStrategyService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExamplePageOnePromotedBidding()
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesRepositoryFacade->getValuesHolder()->setBiddingStrategyValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // BiddingStrategyService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategies())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // BiddingStrategyService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategyIds());

            // run
            self::get($getRequest);

            // =================================================================
            // BiddingStrategyService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategies()
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
     * @param int[] $biddingStrategyIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $biddingStrategyIds): get
    {
        $selector = new BiddingStrategySelector($accountId);

        if (!is_null($biddingStrategyIds)) {
            $selector->setBiddingStrategyIds($biddingStrategyIds);
        }

        $selector->setBiddingStrategyTypes([
            BiddingStrategyType::PAGE_ONE_PROMOTED,
            BiddingStrategyType::TARGET_CPA,
            BiddingStrategyType::TARGET_SPEND,
            BiddingStrategyType::TARGET_ROAS,
        ]);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param BiddingStrategy[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new BiddingStrategyOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example PageOnePromotedBidding request.
     *
     * @return BiddingStrategy
     */
    public static function createExamplePageOnePromotedBidding(): BiddingStrategy
    {
        $biddingScheme = new PageOnePromotedBiddingScheme();
        $biddingScheme->setBiddingStrategyType(BiddingStrategyType::PAGE_ONE_PROMOTED);
        $biddingScheme->setBidCeiling(500);
        $biddingScheme->setBidMultiplier(1.00);
        $biddingScheme->setBidChangesForRaisesOnly(BidChangesForRaisesOnly::ACTIVE);
        $biddingScheme->setRaiseBidWhenBudgetConstrained(RaiseBidWhenBudgetConstrained::ACTIVE);
        $biddingScheme->setRaiseBidWhenLowQualityScore(RaiseBidWhenLowQualityScore::ACTIVE);

        $biddingStrategy = new BiddingStrategy();
        $biddingStrategy->setBiddingStrategyName('SamplePageOnePromoted_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $biddingStrategy->setBiddingScheme($biddingScheme);
        return $biddingStrategy;
    }

    /**
     * example TargetCpaBiddingScheme request.
     *
     * @return BiddingStrategy
     */
    public static function createExampleTargetCpaBidding(): BiddingStrategy
    {
        $biddingScheme = new TargetCpaBiddingScheme();
        $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_CPA);
        $biddingScheme->setTargetCpa(500);
        $biddingScheme->setBidCeiling(700);
        $biddingScheme->setBidFloor(200);

        $biddingStrategy = new BiddingStrategy();
        $biddingStrategy->setBiddingStrategyName('SampleTargetCpa_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $biddingStrategy->setBiddingScheme($biddingScheme);
        return $biddingStrategy;
    }

    /**
     * example TargetSpendBiddingScheme request.
     *
     * @return BiddingStrategy
     */
    public static function createExampleTargetSpendBidding(): BiddingStrategy
    {
        $biddingScheme = new TargetSpendBiddingScheme();
        $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_SPEND);
        $biddingScheme->setBidCeiling(700);
        $biddingScheme->setSpendTarget(10);

        $biddingStrategy = new BiddingStrategy();
        $biddingStrategy->setBiddingStrategyName('SampleTargetSpend_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $biddingStrategy->setBiddingScheme($biddingScheme);
        return $biddingStrategy;
    }

    /**
     * example TargetRoasBiddingScheme request.
     * @return BiddingStrategy
     */
    public static function createExampleTargetRoasBidding(): BiddingStrategy
    {
        $biddingScheme = new TargetRoasBiddingScheme();
        $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_ROAS);
        $biddingScheme->setTargetRoas(10.00);
        $biddingScheme->setBidCeiling(700);
        $biddingScheme->setBidFloor(600);

        $biddingStrategy = new BiddingStrategy();
        $biddingStrategy->setBiddingStrategyName('SampleTargetRoas_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $biddingStrategy->setBiddingScheme($biddingScheme);
        return $biddingStrategy;
    }

    /**
     * example biddingStrategies set request.
     *
     * @param BiddingStrategy[] $biddingStrategies
     * @return BiddingStrategy[]
     */
    public static function createExampleSetRequest(array $biddingStrategies): array
    {
        // create operands
        $operands = [];

        foreach ($biddingStrategies as $biddingStrategy) {

            // set operand
            $operand = new BiddingStrategy();
            $operand->setBiddingStrategyId($biddingStrategy->getBiddingStrategyId());
            $operand->setBiddingStrategyName('Sample_UpdateOn_' . $biddingStrategy->getBiddingStrategyId() . '_' . SoapUtils::getCurrentTimestamp());

            switch ($biddingStrategy->getBiddingStrategyType()) {

                // PageOnePromotedBiddingScheme
                case BiddingStrategyType::PAGE_ONE_PROMOTED:
                    $biddingScheme = new PageOnePromotedBiddingScheme();
                    $biddingScheme->setBiddingStrategyType(BiddingStrategyType::PAGE_ONE_PROMOTED);
                    $biddingScheme->setBidCeiling(550);
                    $biddingScheme->setBidMultiplier(5.00);
                    $biddingScheme->setBidChangesForRaisesOnly(BidChangesForRaisesOnly::DEACTIVE);
                    $biddingScheme->setRaiseBidWhenBudgetConstrained(RaiseBidWhenBudgetConstrained::DEACTIVE);
                    $biddingScheme->setRaiseBidWhenLowQualityScore(RaiseBidWhenLowQualityScore::DEACTIVE);
                    $operand->setBiddingScheme($biddingScheme);
                    break;

                // TargetCpaBiddingScheme
                case BiddingStrategyType::TARGET_CPA:
                    $biddingScheme = new TargetCpaBiddingScheme();
                    $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_CPA);
                    $biddingScheme->setTargetCpa(550);
                    $biddingScheme->setBidCeiling(750);
                    $biddingScheme->setBidFloor(250);
                    $operand->setBiddingScheme($biddingScheme);
                    break;

                // TargetSpendBiddingScheme
                case BiddingStrategyType::TARGET_SPEND:
                    $biddingScheme = new TargetSpendBiddingScheme();
                    $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_SPEND);
                    $biddingScheme->setBidCeiling(750);
                    $biddingScheme->setSpendTarget(20);
                    $operand->setBiddingScheme($biddingScheme);
                    break;

                // TargetRoasBiddingScheme
                case BiddingStrategyType::TARGET_ROAS:
                    $biddingScheme = new TargetRoasBiddingScheme();
                    $biddingScheme->setBiddingStrategyType(BiddingStrategyType::TARGET_ROAS);
                    $biddingScheme->setTargetRoas(15.00);
                    $biddingScheme->setBidCeiling(750);
                    $biddingScheme->setBidFloor(650);
                    $operand->setBiddingScheme($biddingScheme);
                    break;
            }

            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    BiddingStrategyServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
