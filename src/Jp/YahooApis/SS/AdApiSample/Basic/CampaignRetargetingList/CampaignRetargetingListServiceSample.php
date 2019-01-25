<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignRetargetingList;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\RetargetingList\RetargetingListServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignRetargetingList\{CampaignRetargetingList,
    CampaignRetargetingListOperation,
    CampaignRetargetingListSelector,
    CampaignRetargetingListService,
    CriterionTargetList,
    ExcludedType,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201901\Paging;
use Jp\YahooApis\SS\V201901\RetargetingList\TargetListType;

/**
 * example CampaignRetargetingListService operation and Utility method collection.
 */
class CampaignRetargetingListServiceSample
{

    const SERVICE_NAME = 'CampaignRetargetingListService';

    /**
     * @var CampaignRetargetingListService
     */
    private static $service = null;

    /**
     * CampaignRetargetingListServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignRetargetingListService::class);
    }

    /**
     * example get campaign retargeting lists.
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
     * example mutate campaign retargeting lists.
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
                    if ($values->getError()[0]->getCode() != '210804') {
                        throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
                    }
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
        $retargetingListValuesHolder = RetargetingListServiceSample::create();
        $campaignValuesHolder = CampaignServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setRetargetingListValuesList($retargetingListValuesHolder->getRetargetingListValuesList());
        $selfValuesHolder->setBiddingStrategyValuesList($campaignValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($campaignValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($campaignValuesHolder->getCampaignValuesList());
        return $selfValuesHolder;
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
     * example CampaignRetargetingListService operation.
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
            $campaignIdStandard = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
            $campaignIdMobileApp = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::MOBILE_APP);
            $targetListId = $valuesRepositoryFacade->getRetargetingListValuesRepository()->findTargetListId(TargetListType::aDEFAULT);

            // =================================================================
            // CampaignRetargetingListService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [
                    self::createExampleIncludedCampaignRetargetingList($campaignIdStandard, $targetListId),
                    self::createExampleExcludedCampaignRetargetingList($campaignIdMobileApp, $targetListId),
                ]
            );

            // run
            $addResponse = self::mutate($addRequest);
            $campaignRetargetingLists = [];
            foreach ($addResponse->getRval()->getValues() as $campaignRetargetingListValues) {
                $campaignRetargetingLists[] =$campaignRetargetingListValues->getCampaignRetargetingList();
            }

            // =================================================================
            // CampaignRetargetingListService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId, self::createExampleSetRequest($campaignRetargetingLists));

            // run
            self::mutate($setRequest);

            // =================================================================
            // CampaignRetargetingListService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$campaignIdStandard, $campaignIdMobileApp], [$targetListId]);

            // run
            self::get($getRequest);

            // =================================================================
            // CampaignRetargetingListService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $campaignRetargetingLists);

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
     * @param int[] $campaignIds
     * @param int[] $targetListIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignIds, array $targetListIds): get
    {
        $selector = new CampaignRetargetingListSelector($accountId);

        if (!is_null($campaignIds)) {
            $selector->setCampaignIds($campaignIds);
        }
        if (!is_null($targetListIds)) {
            $selector->setTargetListIds($targetListIds);
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
     * @param CampaignRetargetingList[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignRetargetingListOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example INCLUDED CampaignRetargetingList request.
     *
     * @param int $campaignId
     * @param int $targetListId
     * @return CampaignRetargetingList
     */
    public static function createExampleIncludedCampaignRetargetingList(int $campaignId, int $targetListId): CampaignRetargetingList
    {
        $operand = new CampaignRetargetingList($campaignId, new CriterionTargetList($targetListId));
        $operand->setExcludedType(ExcludedType::INCLUDED);
        $operand->setBidMultiplier(1.00);
        return $operand;
    }

    /**
     * example EXCLUDED CampaignRetargetingList request.
     *
     * @param int $campaignId
     * @param int $targetListId
     * @return CampaignRetargetingList
     */
    public static function createExampleExcludedCampaignRetargetingList(int $campaignId, int $targetListId): CampaignRetargetingList
    {
        $operand = new CampaignRetargetingList($campaignId, new CriterionTargetList($targetListId));
        $operand->setExcludedType(ExcludedType::EXCLUDED);
        return $operand;
    }

    /**
     * example campaign targetLists set request.
     *
     * @param CampaignRetargetingList[] $campaignRetargetingLists
     * @return CampaignRetargetingList[]
     */
    public static function createExampleSetRequest(array $campaignRetargetingLists):array
    {
        // create operands
        $operands = [];

        foreach ($campaignRetargetingLists as $campaignRetargetingList) {
            if($campaignRetargetingList->getExcludedType() === ExcludedType::INCLUDED) {
                $operand = new CampaignRetargetingList(
                    $campaignRetargetingList->getCampaignId(),
                    new CriterionTargetList($campaignRetargetingList->getCriterionTargetList()->getTargetListId())
                );
                $operand->setBidMultiplier('10.00');
                $operands[] = $operand;
            }
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignRetargetingListServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
