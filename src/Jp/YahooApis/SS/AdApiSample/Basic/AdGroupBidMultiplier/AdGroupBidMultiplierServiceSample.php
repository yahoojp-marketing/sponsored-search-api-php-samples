<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupBidMultiplier;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\{AdGroupBidMultiplier,
    AdGroupBidMultiplierOperation,
    AdGroupBidMultiplierSelector,
    AdGroupBidMultiplierService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    PlatformType};
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example AdGroupBidMultiplierService operation and Utility method collection.
 */
class AdGroupBidMultiplierServiceSample
{

    const SERVICE_NAME = 'AdGroupBidMultiplierService';

    /**
     * @var AdGroupBidMultiplierService
     */
    private static $service = null;

    /**
     * AdGroupBidMultiplierServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupBidMultiplierService::class);
    }

    /**
     * example get adGroupBidMultipliers.
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
     * example mutate adGroupBidMultipliers.
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
        return AdGroupServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        AdGroupServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupBidMultiplierService operation.
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
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

            // =================================================================
            // AdGroupBidMultiplierService SET
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($campaignId, $adGroupId)
            );

            // run
            $addResponse = self::mutate($addRequest);
            $adGroupBidMultipliers = [];
            foreach ($addResponse->getRval()->getValues() as $adGroupBidMultiplierValues) {
                $adGroupBidMultipliers[] = $adGroupBidMultiplierValues->getAdGroupBidMultiplier();
            }

            // =================================================================
            // AdGroupBidMultiplierService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $adGroupBidMultipliers);

            // run
            self::get($getRequest);

            // =================================================================
            // AdGroupBidMultiplierService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $adGroupBidMultipliers);

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
     * @param AdGroupBidMultiplier[] $adGroupBidMultipliers
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $adGroupBidMultipliers): get
    {
        $selector = new AdGroupBidMultiplierSelector($accountId);

        if (!is_null($adGroupBidMultipliers)) {
            $campaignIds = [];
            $adGroupIds = [];
            foreach ($adGroupBidMultipliers as $adGroupBidMultiplier) {
                $campaignIds[] = $adGroupBidMultiplier->getCampaignId();
                $adGroupIds[] = $adGroupBidMultiplier->getAdGroupId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setAdGroupIds(array_unique($adGroupIds));
        }

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
     * @param AdGroupBidMultiplier[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupBidMultiplierOperation($operator, $accountId, $operand)
        );
    }

    /**
     * cexample adGroupBidMultiplier request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return AdGroupBidMultiplier[]
     */
    public static function createExampleSetRequest(int $campaignId, int $adGroupId): array
    {

        $smartPhone = new AdGroupBidMultiplier();
        $smartPhone->setCampaignId($campaignId);
        $smartPhone->setAdGroupId($adGroupId);
        $smartPhone->setPlatformType(PlatformType::SMART_PHONE);
        $smartPhone->setBidMultiplier(3.2);

        $tablet = new AdGroupBidMultiplier();
        $tablet->setCampaignId($campaignId);
        $tablet->setAdGroupId($adGroupId);
        $tablet->setPlatformType(PlatformType::TABLET);
        $tablet->setBidMultiplier(5.2);

        $desktop = new AdGroupBidMultiplier();
        $desktop->setCampaignId($campaignId);
        $desktop->setAdGroupId($adGroupId);
        $desktop->setPlatformType(PlatformType::DESKTOP);
        $desktop->setBidMultiplier(9.2);

        return [$smartPhone, $tablet, $desktop];
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupBidMultiplierServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
