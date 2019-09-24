<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupCriterion;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroupCriterion\{AdGroupCriterion,
    AdGroupCriterionAdditionalAdvancedMobileUrls,
    AdGroupCriterionAdditionalAdvancedUrls,
    AdGroupCriterionAdditionalUrl,
    AdGroupCriterionOperation,
    AdGroupCriterionSelector,
    AdGroupCriterionService,
    AdGroupCriterionUse,
    ApprovalStatus,
    Bid,
    BiddableAdGroupCriterion,
    CriterionType,
    CustomParameter,
    CustomParameters,
    get,
    getResponse,
    Keyword,
    KeywordMatchType,
    mutate,
    mutateResponse,
    NegativeAdGroupCriterion,
    Operator,
    UserStatus};
use Jp\YahooApis\SS\V201909\Campaign\CampaignType;
use Jp\YahooApis\SS\V201909\Paging;

/**
 * example AdGroupCriterionService operation and Utility method collection.
 */
class AdGroupCriterionServiceSample
{

    const SERVICE_NAME = 'AdGroupCriterionService';

    /**
     * @var AdGroupCriterionService
     */
    private static $service = null;

    /**
     * AdGroupCriterionServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupCriterionService::class);
    }

    /**
     * example get adGroupCriterions.
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
     * example mutate adGroupCriterions.
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
     * example check adGroup criterion review status. (biddable only)
     *
     * @param AdGroupCriterion[] $adGroupCriterions
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $adGroupCriterions): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for AdGroupCriterion Review Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), AdGroupCriterionUse::BIDDABLE, $adGroupCriterions);
            $getResponse = self::get($getRequest);

            $approvalCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $adGroupCriterionValue) {
                if ($adGroupCriterionValue->getAdGroupCriterion() instanceof BiddableAdGroupCriterion) {
                    switch ($adGroupCriterionValue->getAdGroupCriterion()->getApprovalStatus()) {
                        default:
                        case ApprovalStatus::REVIEW:
                        case ApprovalStatus::APPROVED_WITH_REVIEW:
                            continue 1;
                        case ApprovalStatus::PRE_DISAPPROVED:
                        case ApprovalStatus::POST_DISAPPROVED:
                            throw new Exception('AdGroupCriterion Review Status failed.');
                        case ApprovalStatus::APPROVED:
                            $approvalCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get AdGroupCriterionService.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $approvalCount) {
                return;
            }
        }

        throw new Exception('Fail to get AdGroupCriterionService.');
    }

    /**
     * create basic AdGroupAd.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $parentValuesHolder = self::setup();
        $parentValuesRepositoryFacade = new ValuesRepositoryFacade($parentValuesHolder);
        $accountId = SoapUtils::getAccountId();

        $campaignId = $parentValuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
        $adGroupId = $parentValuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

        $request = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
            self::createExampleBiddableAdGroupCriterion($campaignId, $adGroupId),
        ]);
        $response = self::mutate($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($parentValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($parentValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($parentValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($parentValuesHolder->getAdGroupValuesList());
        $selfValuesHolder->setAdGroupCriterionValuesList($response->getRval()->getValues());
        return $selfValuesHolder;
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
     * example AdGroupCriterionService operation.
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
            // AdGroupCriterionService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [
                self::createExampleBiddableAdGroupCriterion($campaignId, $adGroupId),
                self::createExampleNegativeAdGroupCriterion($campaignId, $adGroupId),
            ]);

            // run
            $addResponse = self::mutate($addRequest);
            $adGroupCriterions = [];
            foreach ($addResponse->getRval()->getValues() as $adGroupCriterionValues) {
                $adGroupCriterions[] = $adGroupCriterionValues->getAdGroupCriterion();
            }

            // =================================================================
            // AdGroupCriterionService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, AdGroupCriterionUse::BIDDABLE, $adGroupCriterions);

            // run
            self::get($getRequest);

            // =================================================================
            // AdGroupCriterionService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($adGroupCriterions)
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // AdGroupCriterionService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $adGroupCriterions);

            // run
            self::mutate($removeRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            self::cleanup($valuesHolder);
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId AccountID
     * @param AdGroupCriterionUse $criterionUse
     * @param AdGroupCriterion[] $adGroupCriterions
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, string $criterionUse, array $adGroupCriterions): get
    {
        $selector = new AdGroupCriterionSelector($accountId, $criterionUse);

        if (!is_null($adGroupCriterions)) {
            $campaignIds = [];
            $adGroupIds = [];
            $criterionIds = [];
            foreach ($adGroupCriterions as $adGroupCriterion) {
                $campaignIds[] = $adGroupCriterion->getCampaignId();
                $adGroupIds[] = $adGroupCriterion->getAdGroupId();
                $criterionIds[] = $adGroupCriterion->getCriterion()->getCriterionId();
            }
            $selector->setCampaignIds(array_unique($campaignIds));
            $selector->setAdGroupIds(array_unique($adGroupIds));
            $selector->setCriterionIds($criterionIds);
        }

        $selector->setUserStatuses([
            UserStatus::ACTIVE,
            UserStatus::PAUSED,
        ]);
        $selector->setApprovalStatuses([
            ApprovalStatus::APPROVED,
            ApprovalStatus::APPROVED_WITH_REVIEW,
            ApprovalStatus::REVIEW,
            ApprovalStatus::PRE_DISAPPROVED,
            ApprovalStatus::POST_DISAPPROVED,
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
     * @param AdGroupCriterion[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupCriterionOperation($operator, $accountId, $operand)
        );
    }

    /**
     * cexample biddable adGroup criterion request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return BiddableAdGroupCriterion
     */
    public static function createExampleBiddableAdGroupCriterion(int $campaignId, int $adGroupId): BiddableAdGroupCriterion
    {
        $criterion = new BiddableAdGroupCriterion();
        $criterion->setCampaignId($campaignId);
        $criterion->setAdGroupId($adGroupId);
        $criterion->setCriterionUse(AdGroupCriterionUse::BIDDABLE);
        $criterion->setUserStatus(UserStatus::ACTIVE);
        $criterion->setTrackingUrl('http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}');

        // set keyword
        $keyword = new Keyword();
        $keyword->setType(CriterionType::KEYWORD);
        $keyword->setText('sample text' . AdGroupCriterionUse::BIDDABLE);
        $keyword->setMatchType(KeywordMatchType::PHRASE);
        $criterion->setCriterion($keyword);

        // set bid
        $bid = new Bid();
        $bid->setMaxCpc(100);
        $criterion->setBid($bid);

        // set advanced url
        $criterion->setAdvancedUrl('http://www.yahoo.co.jp');
        $additionalAdvancedUrls = new AdGroupCriterionAdditionalAdvancedUrls();
        $additionalAdvancedUrl1 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedUrl1->setUrl('http://www1.yahoo.co.jp');
        $additionalAdvancedUrl2 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedUrl2->setUrl('http://www2.yahoo.co.jp');
        $additionalAdvancedUrl3 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedUrl3->setUrl('http://www3.yahoo.co.jp');
        $additionalAdvancedUrls->setAdditionalAdvancedUrl([
            $additionalAdvancedUrl1,
            $additionalAdvancedUrl2,
            $additionalAdvancedUrl3,
        ]);
        $criterion->setAdditionalAdvancedUrls($additionalAdvancedUrls);

        // set advanced mobile url
        $criterion->setAdvancedMobileUrl('http://www.yahoo.co.jp/mobile');
        $additionalAdvancedMobileUrls = new AdGroupCriterionAdditionalAdvancedMobileUrls();
        $additionalAdvancedMobileUrl1 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedMobileUrl1->setUrl('http://www1.yahoo.co.jp');
        $additionalAdvancedMobileUrl2 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedMobileUrl2->setUrl('http://www2.yahoo.co.jp');
        $additionalAdvancedMobileUrl3 = new AdGroupCriterionAdditionalUrl();
        $additionalAdvancedMobileUrl3->setUrl('http://www3.yahoo.co.jp');
        $additionalAdvancedMobileUrls->setAdditionalAdvancedMobileUrl([
            $additionalAdvancedMobileUrl1,
            $additionalAdvancedMobileUrl2,
            $additionalAdvancedMobileUrl3,
        ]);
        $criterion->setAdditionalAdvancedMobileUrls($additionalAdvancedMobileUrls);

        // set customParameters
        $customParameter = new CustomParameter();
        $customParameter->setKey('id1');
        $customParameter->setValue('1234');
        $customParameters = new CustomParameters();
        $customParameters->setParameters([$customParameter]);
        $criterion->setCustomParameters($customParameters);

        return $criterion;
    }

    /**
     * cexample negative adGroup criterion request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @return NegativeAdGroupCriterion
     */
    public static function createExampleNegativeAdGroupCriterion(int $campaignId, int $adGroupId): NegativeAdGroupCriterion
    {
        $criterion = new NegativeAdGroupCriterion();
        $criterion->setCampaignId($campaignId);
        $criterion->setAdGroupId($adGroupId);
        $criterion->setCriterionUse(AdGroupCriterionUse::NEGATIVE);

        // set keyword
        $keyword = new Keyword();
        $keyword->setType(CriterionType::KEYWORD);
        $keyword->setText('sample text' . AdGroupCriterionUse::NEGATIVE);
        $keyword->setMatchType(KeywordMatchType::PHRASE);
        $criterion->setCriterion($keyword);

        return $criterion;
    }

    /**
     * example adGroup criterion set request.
     *
     * @param AdGroupCriterion[] $adGroupCriterions
     * @return BiddableAdGroupCriterion[] AdGroupOperation entity.
     */
    public static function createExampleSetRequest(array $adGroupCriterions): array
    {
        $operands = [];

        foreach ($adGroupCriterions as $adGroupCriterion) {
            if ($adGroupCriterion instanceof BiddableAdGroupCriterion) {

                $criterion = new BiddableAdGroupCriterion();
                $criterion->setCampaignId($adGroupCriterion->getCampaignId());
                $criterion->setAdGroupId($adGroupCriterion->getAdGroupId());
                $criterion->setCriterionUse($adGroupCriterion->getCriterionUse());
                $criterion->setUserStatus(UserStatus::PAUSED);

                // set keyword
                $keyword = new Keyword();
                $keyword->setCriterionId($adGroupCriterion->getCriterion()->getCriterionId());
                $keyword->setType($adGroupCriterion->getCriterion()->getType());
                $criterion->setCriterion($keyword);

                // set bid
                $bid = new Bid();
                $bid->setMaxCpc(150);
                $criterion->setBid($bid);

                $operands[] = $criterion;
            }
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupCriterionServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
