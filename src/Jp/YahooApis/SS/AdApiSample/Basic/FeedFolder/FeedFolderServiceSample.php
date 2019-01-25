<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\FeedFolder;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\FeedFolder\{FeedAttribute,
    FeedFolder,
    FeedFolderOperation,
    FeedFolderPlaceholderField,
    FeedFolderPlaceholderType,
    FeedFolderSelector,
    FeedFolderService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example FeedFolderService operation and Utility method collection.
 */
class FeedFolderServiceSample
{

    const SERVICE_NAME = 'FeedFolderService';

    /**
     * @var FeedFolderService
     */
    private static $service = null;

    /**
     * FeedFolderServiceSample constructor.
     */
    private static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(FeedFolderService::class);
    }

    /**
     * example get feedFolders.
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
     * example mutate feedFolders.
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
     * create basic FeedFolder.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();
        $accountId = SoapUtils::getAccountId();
        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
            self::createExampleAdCustomizerFeedFolder($accountId),
            self::createExampleDynamicAdForSearchFeedFolder($accountId),
        ]);
        $response = self::mutate($request);
        $valuesHolder->setFeedFolderValuesList($response->getRval()->getValues());
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
        if (count($valuesHolder->getFeedFolderValuesList()) === 0) {
            return;
        }
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        self::mutate(
            self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                $valuesRepositoryFacade->getFeedFolderValuesRepository()->getFeedFolders()
            )
        );
    }

    /**
     * example FeedFolderService operation.
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
            // FeedFolderService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleAdCustomizerFeedFolder($accountId),
                self::createExampleDynamicAdForSearchFeedFolder($accountId),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesRepositoryFacade->getValuesHolder()->setFeedFolderValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // FeedFolderService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($valuesRepositoryFacade->getFeedFolderValuesRepository()->getFeedFolders())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // FeedFolderService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getFeedFolderValuesRepository()->getFeedFolderIds());

            // run
            self::get($getRequest);

            // =================================================================
            // FeedFolderService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getFeedFolderValuesRepository()->getFeedFolders()
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
     * @param int[] $feedFolderIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $feedFolderIds): get
    {
        $selector = new FeedFolderSelector($accountId);

        if (!is_null($feedFolderIds)) {
            $selector->setFeedFolderIds($feedFolderIds);
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
     * @param FeedFolder[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new FeedFolderOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example AdCustomizer request.
     *
     * @param int $accountId
     * @return FeedFolder
     */
    public static function createExampleAdCustomizerFeedFolder(int $accountId): FeedFolder
    {
        $feedFolder = new FeedFolder($accountId);
        $feedFolder->setFeedFolderName('SampleAdCustomizerFeedFolder_' . SoapUtils::getCurrentTimestamp());
        $feedFolder->setPlaceholderType(FeedFolderPlaceholderType::AD_CUSTOMIZER);

        $feedAttributes = [];

        $feedAttribute = new FeedAttribute();
        $feedAttribute->setFeedAttributeName('SampleInteger_' . SoapUtils::getCurrentTimestamp());
        $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_INTEGER);
        array_push($feedAttributes, $feedAttribute);

        $feedAttribute = new FeedAttribute();
        $feedAttribute->setFeedAttributeName('SamplePrice_' . SoapUtils::getCurrentTimestamp());
        $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_PRICE);
        array_push($feedAttributes, $feedAttribute);

        $feedAttribute = new FeedAttribute();
        $feedAttribute->setFeedAttributeName('SampleDate_' . SoapUtils::getCurrentTimestamp());
        $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_DATE);
        array_push($feedAttributes, $feedAttribute);

        $feedAttribute = new FeedAttribute();
        $feedAttribute->setFeedAttributeName('SampleString_' . SoapUtils::getCurrentTimestamp());
        $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_STRING);
        array_push($feedAttributes, $feedAttribute);

        $feedFolder->setFeedAttribute($feedAttributes);
        return $feedFolder;
    }

    /**
     * example DynamicAdForSearch request.
     *
     * @param int $accountId Account ID
     * @return FeedFolder
     */
    public static function createExampleDynamicAdForSearchFeedFolder(int $accountId): FeedFolder
    {
        $feedFolder = new FeedFolder($accountId);
        $feedFolder->setFeedFolderName('SampleDASFeedFolder_' . SoapUtils::getCurrentTimestamp());
        $feedFolder->setPlaceholderType(FeedFolderPlaceholderType::DYNAMIC_AD_FOR_SEARCH_PAGE_FEEDS);
        $feedFolder->setDomain('http://yahoo.co.jp/');
        return $feedFolder;
    }

    /**
     * example feedFolders set request.
     *
     * @param FeedFolder[] $feedFolders
     * @return FeedFolder[]
     */
    public static function createExampleSetRequest(array $feedFolders): array
    {
        // create operands
        $operands = [];

        foreach ($feedFolders as $feedFolder) {

            // for AdCustomizer
            if ($feedFolder->getPlaceholderType() === FeedFolderPlaceholderType::AD_CUSTOMIZER) {

                // set operand
                $operand = new FeedFolder($feedFolder->getAccountId());
                $operand->setFeedFolderId($feedFolder->getFeedFolderId());
                $operand->setPlaceholderType($feedFolder->getPlaceholderType());

                $feedAttributes = [];

                $feedAttribute = new FeedAttribute();
                $feedAttribute->setFeedAttributeName('SampleInteger2_' . SoapUtils::getCurrentTimestamp());
                $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_INTEGER);
                array_push($feedAttributes, $feedAttribute);

                $feedAttribute = new FeedAttribute();
                $feedAttribute->setFeedAttributeName('SamplePrice2_' . SoapUtils::getCurrentTimestamp());
                $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_PRICE);
                array_push($feedAttributes, $feedAttribute);

                $feedAttribute = new FeedAttribute();
                $feedAttribute->setFeedAttributeName('SampleDate2_' . SoapUtils::getCurrentTimestamp());
                $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_DATE);
                array_push($feedAttributes, $feedAttribute);

                $feedAttribute = new FeedAttribute();
                $feedAttribute->setFeedAttributeName('SampleString2_' . SoapUtils::getCurrentTimestamp());
                $feedAttribute->setPlaceholderField(FeedFolderPlaceholderField::AD_CUSTOMIZER_STRING);
                array_push($feedAttributes, $feedAttribute);

                $operand->setFeedAttribute($feedAttributes);
                array_push($operands, $operand);
            }
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    FeedFolderServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
