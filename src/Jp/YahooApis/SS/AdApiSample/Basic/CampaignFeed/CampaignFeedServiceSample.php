<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignFeed;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\FeedItem\FeedItemServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignFeed\{CampaignFeed,
    CampaignFeedList,
    CampaignFeedOperation,
    CampaignFeedPlaceholderType,
    CampaignFeedSelector,
    CampaignFeedService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201901\FeedItem\FeedItemPlaceholderType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignFeedService operation and Utility method collection.
 */
class CampaignFeedServiceSample
{

    const SERVICE_NAME = 'CampaignFeedService';

    /**
     * @var CampaignFeedService
     */
    private static $service = null;

    /**
     * CampaignFeedServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignFeedService::class);
    }

    /**
     * example get campaignFeeds.
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
     * example mutate campaignFeeds.
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
     * example CampaignFeedService operation.
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
            $feedItemId = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(
                FeedItemPlaceholderType::QUICKLINK
            );

            //=================================================================
            // CampaignFeedService SET
            //=================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                [self::createExampleSetRequest($accountId, $campaignId, $feedItemId, CampaignFeedPlaceholderType::QUICKLINK)]
            );

            // run
            self::mutate($setRequest);

            //=================================================================
            // CampaignFeedService GET
            //=================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$campaignId], [$feedItemId]);

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
     * @param int[] $feedItemIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignIds, array $feedItemIds): get
    {
        $selector = new CampaignFeedSelector($accountId);

        $selector->setCampaignIds($campaignIds);
        $selector->setFeedItemIds($feedItemIds);
        $selector->setPlaceholderTypes([
            CampaignFeedPlaceholderType::QUICKLINK,
            CampaignFeedPlaceholderType::CALLEXTENSION,
            CampaignFeedPlaceholderType::CALLOUT,
            CampaignFeedPlaceholderType::STRUCTURED_SNIPPET,
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
     * @param CampaignFeedList[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignFeedOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example campaignFeed set request.
     *
     * @param int $accountId
     * @param int $campaignId
     * @param int $feedItemId
     * @param CampaignFeedPlaceholderType $placeholderType
     * @return CampaignFeedList
     */
    public static function createExampleSetRequest(int $accountId, int $campaignId, int $feedItemId, string $placeholderType): CampaignFeedList
    {
        // set campaignFeedList
        $campaignFeedList = new CampaignFeedList($accountId);
        $campaignFeedList->setCampaignId($campaignId);
        $campaignFeedList->setPlaceholderType($placeholderType);

        // set campaignFeed
        $campaignFeed = new CampaignFeed();
        $campaignFeed->setFeedItemId($feedItemId);
        $campaignFeedList->setCampaignFeed([$campaignFeed]);

        return $campaignFeedList;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignFeedServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
