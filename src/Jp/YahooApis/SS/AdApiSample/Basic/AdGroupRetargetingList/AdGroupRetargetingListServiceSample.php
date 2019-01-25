<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupRetargetingList;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\RetargetingList\RetargetingListServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupRetargetingList\{AdGroupRetargetingList,
    AdGroupRetargetingListOperation,
    AdGroupRetargetingListSelector,
    AdGroupRetargetingListService,
    CriterionTargetList,
    ExcludedType,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\Paging;
use Jp\YahooApis\SS\V201901\RetargetingList\TargetListType;

/**
 * example AdGroupRetargetingListService operation and Utility method collection.
 */
class AdGroupRetargetingListServiceSample
{

    const SERVICE_NAME = 'AdGroupRetargetingListService';

    /**
     * @var AdGroupRetargetingListService
     */
    private static $service = null;

    /**
     * AdGroupRetargetingListServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupRetargetingListService::class);
    }

    /**
     * example get adGroup retargeting lists.
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
     * example mutate adGroup retargeting lists.
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
        $adGroupValuesHolder = AdGroupServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setRetargetingListValuesList($retargetingListValuesHolder->getRetargetingListValuesList());
        $selfValuesHolder->setBiddingStrategyValuesList($adGroupValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($adGroupValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($adGroupValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($adGroupValuesHolder->getAdGroupValuesList());
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
        AdGroupServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupRetargetingListService operation.
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
            $adGroupIdStandard = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdStandard);
            $adGroupIdMobileApp = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdMobileApp);

            // =================================================================
            // AdGroupRetargetingListService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [
                    self::createExampleIncludedAdGroupRetargetingList($campaignIdStandard, $adGroupIdStandard, $targetListId),
                    self::createExampleExcludedAdGroupRetargetingList($campaignIdMobileApp, $adGroupIdMobileApp, $targetListId),
                ]
            );

            // run
            $addResponse = self::mutate($addRequest);
            $adGroupRetargetingLists = [];
            foreach ($addResponse->getRval()->getValues() as $adGroupRetargetingListValues) {
                $adGroupRetargetingLists[] = $adGroupRetargetingListValues->getAdGroupRetargetingList();
            }

            // =================================================================
            // AdGroupRetargetingListService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId, self::createExampleSetRequest($adGroupRetargetingLists));

            // run
            self::mutate($setRequest);

            // =================================================================
            // AdGroupRetargetingListService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$campaignIdStandard, $campaignIdMobileApp], [$adGroupIdStandard, $adGroupIdMobileApp], [$targetListId]);

            // run
            self::get($getRequest);

            // =================================================================
            // AdGroupRetargetingListService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $adGroupRetargetingLists);

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
     * @param int[] $adGroupIds
     * @param int[] $targetListIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $campaignIds, array $adGroupIds, array $targetListIds): get
    {
        $selector = new AdGroupRetargetingListSelector($accountId);

        if (!is_null($campaignIds)) {
            $selector->setCampaignIds($campaignIds);
        }
        if (!is_null($adGroupIds)) {
            $selector->setAdGroupIds($adGroupIds);
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
     * @param AdGroupRetargetingList[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupRetargetingListOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example INCLUDED AdGroupRetargetingList request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $targetListId
     * @return AdGroupRetargetingList
     */
    public static function createExampleIncludedAdGroupRetargetingList(int $campaignId, int $adGroupId, int $targetListId): AdGroupRetargetingList
    {
        $operand = new AdGroupRetargetingList($campaignId, $adGroupId, new CriterionTargetList($targetListId));
        $operand->setExcludedType(ExcludedType::INCLUDED);
        $operand->setBidMultiplier(1.00);
        return $operand;
    }

    /**
     * example EXCLUDED AdGroupRetargetingList request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $targetListId
     * @return AdGroupRetargetingList
     */
    public static function createExampleExcludedAdGroupRetargetingList(int $campaignId, $adGroupId, int $targetListId): AdGroupRetargetingList
    {
        $operand = new AdGroupRetargetingList($campaignId, $adGroupId, new CriterionTargetList($targetListId));
        $operand->setExcludedType(ExcludedType::EXCLUDED);
        return $operand;
    }

    /**
     * example adGroup targetLists set request.
     *
     * @param AdGroupRetargetingList[] $adGroupRetargetingLists
     * @return AdGroupRetargetingList[]
     */
    public static function createExampleSetRequest(array $adGroupRetargetingLists):array
    {
        // create operands
        $operands = [];

        foreach ($adGroupRetargetingLists as $adGroupRetargetingList) {
            if($adGroupRetargetingList->getExcludedType() === ExcludedType::INCLUDED) {
                $operand = new AdGroupRetargetingList(
                    $adGroupRetargetingList->getCampaignId(),
                    $adGroupRetargetingList->getAdGroupId(),
                    new CriterionTargetList($adGroupRetargetingList->getCriterionTargetList()->getTargetListId())
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
    AdGroupRetargetingListServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
