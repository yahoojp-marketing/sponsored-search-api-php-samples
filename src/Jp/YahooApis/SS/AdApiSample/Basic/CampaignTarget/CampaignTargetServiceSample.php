<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignTarget;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignTarget\{CampaignTarget,
    CampaignTargetOperation,
    CampaignTargetSelector,
    CampaignTargetService,
    DayOfWeek,
    ExcludedType,
    get,
    getResponse,
    LocationTarget,
    MinuteOfHour,
    mutate,
    mutateResponse,
    NetworkCoverageType,
    NetworkTarget,
    Operator,
    PlatformTarget,
    PlatformType,
    ScheduleTarget,
    TargetType};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignTargetService operation and Utility method collection.
 */
class CampaignTargetServiceSample
{

    const SERVICE_NAME = 'CampaignTargetService';

    /**
     * @var CampaignTargetService
     */
    private static $service = null;

    /**
     * CampaignTargetServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignTargetService::class);
    }

    /**
     * example get campaign targets.
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
     * example mutate for campaign targets.
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
     * example CampaignTargetService operation.
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
            // CampaignTargetService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleScheduleTarget($accountId, $campaignId),
                self::createExampleLocationTarget($accountId, $campaignId),
                self::createExampleNetworkTarget($accountId, $campaignId),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $campaignTargets = [];
            foreach ($addResponse->getRval()->getValues() as $campaignTargetValues) {
                $campaignTargets[] = $campaignTargetValues->getCampaignTarget();
            }

            // =================================================================
            // CampaignTargetService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($campaignTargets)
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // CampaignTargetService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $campaignTargets);

            // run
            self::get($getRequest);

            // =================================================================
            // CampaignTargetService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $campaignTargets);

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
     * @param CampaignTarget[] $campaignTargets
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignTargets): get
    {
        $selector = new CampaignTargetSelector($accountId);

        if (!is_null($campaignTargets)) {
            $campaignIds = [];
            $targetIds = [];
            foreach ($campaignTargets as $campaignTarget) {
                $campaignIds[] = $campaignTarget->getCampaignId();
                $targetIds[] = $campaignTarget->getTarget()->getTargetId();
            }
            $selector->setCampaignIds($campaignIds);
            $selector->setTargetIds($targetIds);
        }

        $selector->setTargetTypes([
            TargetType::LOCATION,
            TargetType::SCHEDULE,
            TargetType::NETWORK,
            TargetType::PLATFORM,
        ]);
        $selector->setExcludedType(ExcludedType::INCLUDED);
        $selector->setPlatformTypes([
            PlatformType::SMART_PHONE,
            PlatformType::TABLET,
            PlatformType::DESKTOP,
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
     * @param CampaignTarget[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignTargetOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example Schedule Target request.
     *
     * @param int $accountId
     * @param int $campaignId
     * @return CampaignTarget
     */
    public static function createExampleScheduleTarget(int $accountId, int $campaignId): CampaignTarget
    {
        $campaignTarget = new CampaignTarget();
        $campaignTarget->setAccountId($accountId);
        $campaignTarget->setCampaignId($campaignId);
        $campaignTarget->setBidMultiplier(1.0);

        // set target
        $target = new ScheduleTarget();
        $target->setTargetType(TargetType::SCHEDULE);
        $target->setDayOfWeek(DayOfWeek::MONDAY);
        $target->setStartHour(10);
        $target->setStartMinute(MinuteOfHour::ZERO);
        $target->setEndHour(11);
        $target->setEndMinute(MinuteOfHour::ZERO);
        $campaignTarget->setTarget($target);

        return $campaignTarget;
    }

    /**
     * example Location Target request.
     *
     * @param int $accountId
     * @param int $campaignId
     * @return CampaignTarget
     */
    public static function createExampleLocationTarget(int $accountId, int $campaignId): CampaignTarget
    {
        $campaignTarget = new CampaignTarget();
        $campaignTarget->setAccountId($accountId);
        $campaignTarget->setCampaignId($campaignId);
        $campaignTarget->setBidMultiplier(0.95);

        // set target
        $target = new LocationTarget();
        $target->setTargetType(TargetType::LOCATION);
        $target->setTargetId('JP-13-0048');
        $target->setExcludedType(ExcludedType::INCLUDED);
        $campaignTarget->setTarget($target);

        return $campaignTarget;
    }

    /**
     * example Network Target request.
     *
     * @param int $accountId
     * @param int $campaignId
     * @return CampaignTarget
     */
    public static function createExampleNetworkTarget(int $accountId, int $campaignId): CampaignTarget
    {
        $campaignTarget = new CampaignTarget();
        $campaignTarget->setAccountId($accountId);
        $campaignTarget->setCampaignId($campaignId);

        // set target
        $target = new NetworkTarget();
        $target->setTargetType(TargetType::NETWORK);
        $target->setNetworkCoverageType(NetworkCoverageType::YAHOO_SEARCH);
        $campaignTarget->setTarget($target);

        return $campaignTarget;
    }

    /**
     * example campaign target set request.
     *
     * @param CampaignTarget[] $campaignTargets
     * @return CampaignTarget[]
     */
    public static function createExampleSetRequest(array $campaignTargets): array
    {
        // create operands
        $operands = [];

        // set BidMultiplier
        foreach ($campaignTargets as $campaignTarget) {

            // set target
            switch ($campaignTarget->getTarget()->getTargetType()) {
                default:
                    break;

                case TargetType::SCHEDULE:
                    $operand = new CampaignTarget();
                    $operand->setAccountId($campaignTarget->getAccountId());
                    $operand->setCampaignId($campaignTarget->getCampaignId());
                    $operand->setBidMultiplier(0.5);
                    $target = new ScheduleTarget();
                    $target->setTargetType($campaignTarget->getTarget()->getTargetType());
                    $target->setTargetId($campaignTarget->getTarget()->getTargetId());
                    $operand->setTarget($target);
                    array_push($operands, $operand);
                    break;

                case TargetType::LOCATION:
                    $operand = new CampaignTarget();
                    $operand->setAccountId($campaignTarget->getAccountId());
                    $operand->setCampaignId($campaignTarget->getCampaignId());
                    $operand->setBidMultiplier(0.5);
                    $target = new LocationTarget();
                    $target->setTargetType($campaignTarget->getTarget()->getTargetType());
                    $target->setTargetId($campaignTarget->getTarget()->getTargetId());
                    $operand->setTarget($target);
                    array_push($operands, $operand);
                    break;
            }
        }

        // set PlatformTarget for SMART_PHONE
        $operand = new CampaignTarget();
        $operand->setAccountId($campaignTargets[0]->getAccountId());
        $operand->setCampaignId($campaignTargets[0]->getCampaignId());
        $operand->setBidMultiplier(0.1);
        $target = new PlatformTarget();
        $target->setTargetType(TargetType::PLATFORM);
        $target->setPlatformType(PlatformType::SMART_PHONE);
        $operand->setTarget($target);
        array_push($operands, $operand);

        // set PlatformTarget for TABLET
        $operand = new CampaignTarget();
        $operand->setAccountId($campaignTargets[0]->getAccountId());
        $operand->setCampaignId($campaignTargets[0]->getCampaignId());
        $operand->setBidMultiplier(0.1);
        $target = new PlatformTarget();
        $target->setTargetType(TargetType::PLATFORM);
        $target->setPlatformType(PlatformType::TABLET);
        $operand->setTarget($target);
        array_push($operands, $operand);

        // set PlatformTarget for DESKTOP
        $operand = new CampaignTarget();
        $operand->setAccountId($campaignTargets[0]->getAccountId());
        $operand->setCampaignId($campaignTargets[0]->getCampaignId());
        $operand->setBidMultiplier(0.1);
        $target = new PlatformTarget();
        $target->setTargetType(TargetType::PLATFORM);
        $target->setPlatformType(PlatformType::DESKTOP);
        $operand->setTarget($target);
        array_push($operands, $operand);

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignTargetServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}

