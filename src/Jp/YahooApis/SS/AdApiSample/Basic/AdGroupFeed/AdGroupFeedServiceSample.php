<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupFeed;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\FeedItem\FeedItemServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroupFeed\{AdGroupFeed,
    AdGroupFeedList,
    AdGroupFeedOperation,
    AdGroupFeedPlaceholderType,
    AdGroupFeedSelector,
    AdGroupFeedService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201909\Campaign\CampaignType;
use Jp\YahooApis\SS\V201909\FeedItem\FeedItemPlaceholderType;
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example AdGroupFeedService operation and Utility method collection.
 */
class AdGroupFeedServiceSample
{

    const SERVICE_NAME = 'AdGroupFeedService';

    /**
     * @var AdGroupFeedService
     */
    private static $service = null;

    /**
     * AdGroupFeedServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupFeedService::class);
    }

    /**
     * example get adGroupFeeds.
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
     * example mutate adGroupFeeds.
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
        return FeedItemServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        FeedItemServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupFeedService operation.
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
            $feedItemId = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(
                FeedItemPlaceholderType::QUICKLINK
            );

            //=================================================================
            // AdGroupFeedService SET
            //=================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                [self::createExampleSetRequest($accountId, $campaignId, $adGroupId, $feedItemId, AdGroupFeedPlaceholderType::QUICKLINK)]
            );

            // run
            self::mutate($setRequest);

            //=================================================================
            // AdGroupFeedService GET
            //=================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$campaignId], [$adGroupId], [$feedItemId]);

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
     * @param int[] $campaignIds
     * @param int[] $adGroupIds
     * @param int[] $feedItemIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignIds, array $adGroupIds, array $feedItemIds): get
    {
        $selector = new AdGroupFeedSelector($accountId);

        $selector->setCampaignIds($campaignIds);
        $selector->setAdGroupIds($adGroupIds);
        $selector->setFeedItemIds($feedItemIds);
        $selector->setPlaceholderTypes([
            AdGroupFeedPlaceholderType::QUICKLINK,
            AdGroupFeedPlaceholderType::CALLEXTENSION,
            AdGroupFeedPlaceholderType::CALLOUT,
            AdGroupFeedPlaceholderType::STRUCTURED_SNIPPET,
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
     * @param AdGroupFeedList[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupFeedOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example adGroupFeed set request.
     *
     * @param int $accountId
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $feedItemId
     * @param string $placeholderType
     * @return AdGroupFeedList
     */
    public static function createExampleSetRequest(int $accountId, int $campaignId, int $adGroupId, int $feedItemId, string $placeholderType): AdGroupFeedList
    {
        // set adGroupFeedList
        $adGroupFeedList = new AdGroupFeedList($accountId);
        $adGroupFeedList->setCampaignId($campaignId);
        $adGroupFeedList->setAdGroupId($adGroupId);
        $adGroupFeedList->setPlaceholderType($placeholderType);

        // set adGroupFeed
        $adGroupFeed = new AdGroupFeed();
        $adGroupFeed->setFeedItemId($feedItemId);
        $adGroupFeedList->setAdGroupFeed([$adGroupFeed]);

        return $adGroupFeedList;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupFeedServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
