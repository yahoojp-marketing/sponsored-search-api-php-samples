<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\RetargetingList;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\Paging;
use Jp\YahooApis\SS\V201909\RetargetingList\{CustomKeyRuleItem,
    DefaultTargetList,
    get,
    getCustomKey,
    getCustomKeyResponse,
    GetCustomKeySelector,
    getResponse,
    IsAllVisitorRule,
    IsDateSpecificRule,
    LogicalCondition,
    LogicalGroup,
    LogicalRuleOperand,
    LogicalTargetList,
    mutate,
    mutateResponse,
    Operator,
    ReachStorageStatus,
    RetargetingListOperation,
    RetargetingListSelector,
    RetargetingListService,
    RuleBaseTargetList,
    RuleGroup,
    RuleOperator,
    RuleType,
    TargetingList,
    TargetListType,
    UrlRuleItem,
    UrlRuleKey};

/**
 * example RetargetingListService operation and Utility method collection.
 */
class RetargetingListServiceSample
{

    const SERVICE_NAME = 'RetargetingListService';

    /**
     * @var RetargetingListService
     */
    private static $service = null;

    /**
     * RetargetingListServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(RetargetingListService::class);
    }

    /**
     * example get retargeting lists.
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
     * example getCustomKeys.
     *
     * @param getCustomKey $request
     * @return getCustomKeyResponse
     * @throws Exception
     */
    public static function getCustomKey(getCustomKey $request): getCustomKeyResponse
    {
        self::init();

        // Call API
        $response = self::$service->getCustomKey($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getCustomKey.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getCustomKeys())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getCustomKey.' . PHP_EOL);
        }

        return $response;
    }

    /**
     * example mutate retargeting lists.
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
     * create basic retargeting lists.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();
        $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), []);
        $getRequest->getSelector()->setTargetListTypes([TargetListType::aDEFAULT]);
        $getResponse = self::get($getRequest);
        $valuesHolder->setRetargetingListValuesList($getResponse->getRval()->getValues());
        return $valuesHolder;
    }

    /**
     * example RetargçetingListService operation.
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
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);

            // get DefaultTargetList
            $getRequest = self::buildExampleGetRequest($accountId, []);
            $getRequest->getSelector()->setTargetListTypes([TargetListType::aDEFAULT]);
            $getResponse = self::get($getRequest);
            $valuesHolder->setRetargetingListValuesList($getResponse->getRval()->getValues());
            $defaultTargetListId = $valuesRepositoryFacade->getRetargetingListValuesRepository()->findTargetListId(TargetListType::aDEFAULT);

            // =================================================================
            // RetargetingListService GetCustomKey
            // =================================================================
            // create request.
            $getCustomKeyRequest = self::buildExampleGetCustomKeyRequest($accountId);

            // run
            $getCustomKeyResponse = self::getCustomKey($getCustomKeyRequest);

            $textKeys = $getCustomKeyResponse->getRval()->getCustomKeys()->getTextKey();

            // =================================================================
            // RetargetingListService ADD(RuleBaseTargetList)
            // =================================================================
            // create request.
            $addRequestRuleBaseTargetList = self::buildExampleMutateRequest(
                Operator::ADD, $accountId, [
                    self::createExampleRuleBaseTargetListUrlRuleItem($accountId),
                    self::createExampleRuleBaseTargetListCustomKeyRuleItem($accountId, $textKeys),
                ]
            );

            // run
            $addResponseRuleBaseTargetList = self::mutate($addRequestRuleBaseTargetList);

            $valuesHolder->setRetargetingListValuesList($addResponseRuleBaseTargetList->getRval()->getValues());
            $targetListIds = $valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetListIds();
            $ruleBaseTargetListIds = [];
            foreach ($targetListIds as $targetListId) {
                if ($targetListId != $defaultTargetListId) {
                    $ruleBaseTargetListIds[] = $targetListId;
                }
            }

            // =================================================================
            // RetargetingListService ADD(LogicalTargetList)
            // =================================================================
            // create request.
            $addRequestLogicalTargetList = self::buildExampleMutateRequest(
                Operator::ADD, $accountId, [
                    self::createExampleLogicalTargetList($accountId, $defaultTargetListId, $ruleBaseTargetListIds)
                ]
            );

            // run
            $addResponseLogicalTargetList = self::mutate($addRequestLogicalTargetList);

            $valuesHolder->setRetargetingListValuesList($addResponseLogicalTargetList->getRval()->getValues());
            $targetListIds = $valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetListIds();

            // =================================================================
            // RetargetingListService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $targetListIds);

            // run
            self::get($getRequest);

            // =================================================================
            // RetargetingListService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(
                Operator::SET, $accountId, self::createExampleSetRequest($valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetLists())
            );

            // run
            self::mutate($setRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $targetListIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $targetListIds): get
    {
        $selector = new RetargetingListSelector($accountId);

        if (!is_null($targetListIds)) {
            $selector->setTargetListIds($targetListIds);
        }

        $selector->setTargetListTypes([
            TargetListType::aDEFAULT,
            TargetListType::RULE,
            TargetListType::LOGICAL,
        ]);
        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @return getCustomKey
     */
    public static function buildExampleGetCustomKeyRequest(int $accountId): getCustomKey
    {
        $selector = new GetCustomKeySelector($accountId);
        return new getCustomKey($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param TargetingList[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new RetargetingListOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example RuleBase TargetList (UrlRuleItem) request.
     *
     * @param int $accountId
     * @return RuleBaseTargetList
     */
    public static function createExampleRuleBaseTargetListUrlRuleItem(int $accountId): RuleBaseTargetList
    {
        $operand = new RuleBaseTargetList($accountId, TargetListType::RULE, IsAllVisitorRule::TRUE);
        $operand->setTargetListName('SampleRuleBaseTargetList_CreateOn_UrlRule_' . SoapUtils::getCurrentTimestamp());
        $operand->setTargetListDescription('SampleRuleBaseTargetList');
        $operand->setReachStorageStatus(ReachStorageStatus::OPEN);
        $operand->setReachStorageSpan(180);
        $operand->setIsDateSpecific(IsDateSpecificRule::TRUE);
        $operand->setStartDate(date('Ymd'));
        $operand->setEndDate(date("Ymd", strtotime("+1 month")));

        $operand->setRules(
            [
                new RuleGroup(
                    [
                        new UrlRuleItem(
                            RuleType::URL_RULE,
                            RuleOperator::CONTAINS,
                            'yahoo.co.jp',
                            UrlRuleKey::REFFER_URL
                        ),
                        new UrlRuleItem(
                            RuleType::URL_RULE,
                            RuleOperator::EQUALS,
                            'http://promotionalads.yahoo.co.jp/',
                            UrlRuleKey::URL
                        )
                    ]
                )
            ]
        );

        return $operand;
    }

    /**
     * example RuleBase TargetList (CustomKeyRuleItem) request.
     *
     * @param int $accountId
     * @param string[] $textKeys
     * @return RuleBaseTargetList
     */
    public static function createExampleRuleBaseTargetListCustomKeyRuleItem(int $accountId, array $textKeys): RuleBaseTargetList
    {
        $operand = new RuleBaseTargetList($accountId, TargetListType::RULE, IsAllVisitorRule::FALSE);
        $operand->setTargetListName('SampleRuleBaseTargetList_CreateOn_CustomKeyRule_' . SoapUtils::getCurrentTimestamp());
        $operand->setTargetListDescription('SampleRuleBaseTargetList');
        $operand->setReachStorageStatus(ReachStorageStatus::OPEN);
        $operand->setReachStorageSpan(180);
        $operand->setIsDateSpecific(IsDateSpecificRule::TRUE);
        $operand->setStartDate(date('Ymd'));
        $operand->setEndDate(date("Ymd", strtotime("+1 month")));

        $ruleGroups = [];
        foreach ($textKeys as $textKey) {
            $ruleGroups[] = new CustomKeyRuleItem(
                RuleType::CUSTOM_KEY_RULE,
                RuleOperator::EQUALS,
                $textKey . '_sample',
                $textKey
            );
        }

        $operand->setRules(
            [new RuleGroup($ruleGroups)]
        );

        return $operand;
    }

    /**
     * example Logical TargetList request.
     *
     * @param int $accountId
     * @param int $defaultTargetListId
     * @param int[] $ruleBaseTargetListIds
     * @return LogicalTargetList
     */
    public static function createExampleLogicalTargetList(int $accountId, int $defaultTargetListId, array $ruleBaseTargetListIds): LogicalTargetList
    {
        // default
        $defaultLogicalGroup = new LogicalGroup(
            [new LogicalRuleOperand($defaultTargetListId)]
        );
        $defaultLogicalGroup->setCondition(LogicalCondition::NOT);

        // rule
        $logicalRuleOperand = [];
        foreach ($ruleBaseTargetListIds as $targetListId) {
            $logicalRuleOperand[] = new LogicalRuleOperand($targetListId);
        }
        $ruleLogicalGroup = new LogicalGroup($logicalRuleOperand);
        $ruleLogicalGroup->setCondition(LogicalCondition::aOR);

        $operand = new LogicalTargetList($accountId, TargetListType::LOGICAL, [$defaultLogicalGroup, $ruleLogicalGroup]);
        $operand->setTargetListName('SampleLogicalTargetList_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $operand->setTargetListDescription('SampleLogicalTargetList');

        return $operand;
    }

    /**
     * example targetLists set request.
     *
     * @param TargetingList[] $targetingLists
     * @return TargetingList[]
     */
    public static function createExampleSetRequest(array $targetingLists): array
    {
        // create operands
        $operands = [];

        foreach ($targetingLists as $targetingList) {
            switch ($targetingList->getTargetListType()) {
                default:
                    break;

                case TargetListType::aDEFAULT:
                    $operand = new DefaultTargetList($targetingList->getAccountId(), $targetingList->getTargetListType());
                    $operand->setTargetListId($targetingList->getTargetListId());
                    $operand->setTargetListName('SampleDefaultTargetList_UpdateOn_' . $targetingList->getTargetListId() . '_' . SoapUtils::getCurrentTimestamp());
                    $operand->setTargetListDescription('SampleDefaultTargetList_Update');
                    $operands[] = $operand;
                    break;

                case TargetListType::RULE:
                    $operand = new RuleBaseTargetList($targetingList->getAccountId(), $targetingList->getTargetListType(), IsAllVisitorRule::TRUE);
                    $operand->setTargetListId($targetingList->getTargetListId());
                    $operand->setTargetListName('SampleRuleBaseTargetList_UpdateOn_' . $targetingList->getTargetListId() . '_' . SoapUtils::getCurrentTimestamp());
                    $operand->setTargetListDescription('SampleRuleBaseTargetList_Update');
                    $operand->setReachStorageStatus(ReachStorageStatus::CLOSED);
                    $operand->setReachStorageSpan(100);
                    $operand->setIsDateSpecific(IsDateSpecificRule::FALSE);
                    $operands[] = $operand;
                    break;

                case TargetListType::LOGICAL:
                    $operand = new LogicalTargetList($targetingList->getAccountId(), $targetingList->getTargetListType(), $targetingList->getLogicalGroup());
                    $operand->setTargetListId($targetingList->getTargetListId());
                    $operand->setTargetListName('SampleLogicalTargetList_UpdateOn_' . $targetingList->getTargetListId() . '_' . SoapUtils::getCurrentTimestamp());
                    $operand->setTargetListDescription('SampleLogicalTargetList_Update');
                    $operands[] = $operand;
                    break;
            }
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    RetargetingListServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
