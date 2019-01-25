<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\BidLandscape;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroupCriterion\AdGroupCriterionServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionUse;
use Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector;
use Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeService;
use Jp\YahooApis\SS\V201901\BidLandscape\get;
use Jp\YahooApis\SS\V201901\BidLandscape\getResponse;
use Jp\YahooApis\SS\V201901\BidLandscape\SimType;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example BidLandscapeService operation and Utility method collection.
 */
class BidLandscapeServiceSample
{

    const SERVICE_NAME = 'BidLandscapeService';

    /**
     * @var BidLandscapeService
     */
    private static $service = null;

    /**
     * BidLandscapeService constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(BidLandscapeService::class);
    }

    /**
     * example get bidLandscape.
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
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        return AdGroupCriterionServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        AdGroupCriterionServiceSample::cleanup($valuesHolder);
    }

    /**
     * example BidLandscapeService operation.
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);
            $criterionId = $valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->findCriterionId($campaignId, $adGroupId, AdGroupCriterionUse::BIDDABLE);

            // =================================================================
            // BidLandscapeService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $campaignId, $adGroupId, [$criterionId]);

            // run
            self::get($getRequest);

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
     * @param int $campaignId
     * @param int $adGroupId
     * @param int[] $criterionIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, int $campaignId, int $adGroupId, array $criterionIds): get
    {
        $selector = new BidLandscapeSelector($accountId, $campaignId, $adGroupId, $criterionIds, SimType::CRITERION);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    BidLandscapeServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
