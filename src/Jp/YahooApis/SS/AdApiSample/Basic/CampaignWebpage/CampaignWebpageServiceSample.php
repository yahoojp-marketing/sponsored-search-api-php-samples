<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignWebpage;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignWebpage\{CampaignWebpage,
    CampaignWebpageOperation,
    CampaignWebpageSelector,
    CampaignWebpageService,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    Webpage,
    WebpageCondition,
    WebpageConditionType,
    WebpageParameter};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example CampaignWebpageService operation and Utility method collection.
 */
class CampaignWebpageServiceSample
{

    const SERVICE_NAME = 'CampaignWebpageService';

    /**
     * @var CampaignWebpageService
     */
    private static $service = null;

    /**
     * CampaignWebpageServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignWebpageService::class);
    }

    /**
     * example get campaign webpages.
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
     * example mutate campaign webpages.
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
     * example CampaignWebpageService operation.
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::DYNAMIC_ADS_FOR_SEARCH);

            // =================================================================
            // CampaignWebpageService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createExampleCampaignWebpage($campaignId)]);

            // run
            $addResponse = self::mutate($addRequest);
            $campaignWebpages = [];
            foreach ($addResponse->getRval()->getValues() as $campaignWebpageValues) {
                $campaignWebpages[] = $campaignWebpageValues->getCampaignWebpage();
            }

            // =================================================================
            // CampaignWebpageService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $campaignWebpages);

            // run
            self::get($getRequest);

            // =================================================================
            // CampaignWebpageService REMOVE
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $campaignWebpages);

            // run
            self::mutate($addRequest);

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
     * @param CampaignWebpage[] $campaignWebpages
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignWebpages): get
    {
        $selector = new CampaignWebpageSelector($accountId);

        if (!is_null($campaignWebpages)) {

            $campaignIds = [];
            $targetIds = [];
            foreach ($campaignWebpages as $campaignWebpage) {
                $campaignIds[] = $campaignWebpage->getCampaignId();
                $targetIds[] = $campaignWebpage->getWebpage()->getTargetId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setTargetIds(array_unique($targetIds));
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
     * @param CampaignWebpage[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignWebpageOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example Campaign Webpage request.
     *
     * @param int $campaignId
     * @return CampaignWebpage
     */
    public static function createExampleCampaignWebpage(int $campaignId): CampaignWebpage
    {
        $webpageCondition1 = new WebpageCondition();
        $webpageCondition1->setType(WebpageConditionType::URL);
        $webpageCondition1->setArgument('yahoo.co.jp');

        $webpageCondition2 = new WebpageCondition();
        $webpageCondition2->setType(WebpageConditionType::PAGE_TITLE);
        $webpageCondition2->setArgument('YahooJapan');

        $webpageCondition3 = new WebpageCondition();
        $webpageCondition3->setType(WebpageConditionType::CUSTOM_LABEL);
        $webpageCondition3->setArgument('sample');

        $webpageParameter = new WebpageParameter();
        $webpageParameter->setConditions([$webpageCondition1, $webpageCondition2, $webpageCondition3]);

        $webpage = new Webpage();
        $webpage->setParameter($webpageParameter);
        return new CampaignWebpage($campaignId, $webpage);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignWebpageServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
