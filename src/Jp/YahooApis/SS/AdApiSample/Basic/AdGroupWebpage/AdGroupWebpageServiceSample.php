<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupWebpage;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupWebpage\{AdGroupWebpage,
    AdGroupWebpageOperation,
    AdGroupWebpageSelector,
    AdGroupWebpageService,
    Bid,
    ExcludedType,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator,
    UserStatus,
    Webpage,
    WebpageCondition,
    WebpageConditionType,
    WebpageParameter};
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example AdGroupWebpageService operation and Utility method collection.
 */
class AdGroupWebpageServiceSample
{

    const SERVICE_NAME = 'AdGroupWebpageService';

    /**
     * @var AdGroupWebpageService
     */
    private static $service = null;

    /**
     * AdGroupWebpageServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupWebpageService::class);
    }

    /**
     * example get adGroup webpages.
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
     * example mutate adGroup webpages.
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
     * example AdGroupWebpageService operation.
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
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

            // =================================================================
            // AdGroupWebpageService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createExampleAdGroupWebpage($campaignId, $adGroupId)]);

            // run
            $addResponse = self::mutate($addRequest);
            $adGroupWebpages = [];
            foreach ($addResponse->getRval()->getValues() as $adGroupWebpageValues) {
                $adGroupWebpages[] = $adGroupWebpageValues->getAdGroupWebpage();
            }

            // =================================================================
            // AdGroupWebpageService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId, self::createExampleSetRequest($adGroupWebpages));

            // run
            self::mutate($setRequest);

            // =================================================================
            // AdGroupWebpageService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $adGroupWebpages);

            // run
            self::get($getRequest);

            // =================================================================
            // AdGroupWebpageService REMOVE
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $adGroupWebpages);

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
     * @param AdGroupWebpage[] $adGroupWebpage
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $adGroupWebpage): get
    {
        $selector = new AdGroupWebpageSelector($accountId);

        if (!is_null($adGroupWebpage)) {

            $campaignIds = [];
            $adGroupIds = [];
            $targetIds = [];
            foreach ($adGroupWebpage as $adGroupWebpage) {
                $campaignIds[] = $adGroupWebpage->getCampaignId();
                $adGroupIds[] = $adGroupWebpage->getAdGroupId();
                $targetIds[] = $adGroupWebpage->getWebpage()->getTargetId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setAdGroupIds(array_unique($adGroupIds));
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
     * @param AdGroupWebpage[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupWebpageOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example AdGroup Webpage request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return AdGroupWebpage
     */
    public static function createExampleAdGroupWebpage(int $campaignId, int $adGroupId): AdGroupWebpage
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

        $operand = new AdGroupWebpage($campaignId, $adGroupId, $webpage);
        $operand->setUserStatus(UserStatus::ACTIVE);
        $operand->setExcludedType(ExcludedType::INCLUDED);

        $bid = new Bid();
        $bid->setMaxCpc(100);
        $operand->setBid($bid);

        return $operand;
    }

    /**
     * example AdGroup Webpage set request.
     *
     * @param AdGroupWebpage[] $adGroupWebpages
     * @return AdGroupWebpage[]
     */
    public static function createExampleSetRequest(array $adGroupWebpages): array
    {
        $operands = [];

        foreach ($adGroupWebpages as $adGroupWebpage) {

            $operand = new AdGroupWebpage($adGroupWebpage->getCampaignId(), $adGroupWebpage->getAdGroupId(), $adGroupWebpage->getWebpage());

            $bid = new Bid();
            $bid->setMaxCpc(150);
            $operand->setBid($bid);

            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupWebpageServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
