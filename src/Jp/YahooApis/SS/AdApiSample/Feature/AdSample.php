<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Feature;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{
    AdGroup\AdGroupServiceSample,
    AdGroupAd\AdGroupAdServiceSample,
    AdGroupBidMultiplier\AdGroupBidMultiplierServiceSample,
    AdGroupCriterion\AdGroupCriterionServiceSample,
    AdGroupFeed\AdGroupFeedServiceSample,
    BiddingStrategy\BiddingStrategyServiceSample,
    Campaign\CampaignServiceSample,
    CampaignCriterion\CampaignCriterionServiceSample,
    CampaignFeed\CampaignFeedServiceSample,
    CampaignTarget\CampaignTargetServiceSample,
    FeedItem\FeedItemServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\{
    AdGroup\Operator as AdGroupOperator,
    AdGroupAd\Operator as AdGroupAdOperator,
    AdGroupBidMultiplier\Operator as AdGroupBidMultiplierOperator,
    AdGroupCriterion\AdGroupCriterionUse,
    AdGroupCriterion\Operator as AdGroupCriterionOperator,
    AdGroupFeed\AdGroupFeedPlaceholderType,
    AdGroupFeed\Operator as AdGroupFeedOperator,
    BiddingStrategy\Operator as BiddingStrategyOperator,
    Campaign\AppStore,
    Campaign\BiddingStrategyType,
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    CampaignCriterion\Operator as CampaignCriterionOperator,
    CampaignFeed\CampaignFeedPlaceholderType,
    CampaignFeed\Operator as CampaignFeedOperator,
    CampaignTarget\Operator as CampaignTargetOperator,
    FeedItem\FeedItemPlaceholderType,
    FeedItem\Operator as FeedItemOperator
};

/**
 * example Ad operation and Utility method collection.
 */
class AdSample
{

    /**
     * example Ad operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesHolder = new ValuesHolder();
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        $accountId = SoapUtils::getAccountId();
        $biddingStrategyId = null;
        $campaignIdStandard = null;
        $campaignIdMobileAppIOS = null;
        $appIdIOS = null;
        $campaignIdMobileAppAndroid = null;
        $appIdAndroid = null;
        $adGroupIdStandard = null;
        $adGroupIdMobileAppIOS = null;
        $adGroupIdMobileAppAndroid = null;
        $feedItemId = null;

        try {
            // =================================================================
            // BiddingStrategy
            // =================================================================
            // ADD
            $addRequestBiddingStrategy = BiddingStrategyServiceSample::buildExampleMutateRequest(
                BiddingStrategyOperator::ADD, $accountId,
                [BiddingStrategyServiceSample::createExampleTargetSpendBidding()]
            );
            $addResponseBiddingStrategy = BiddingStrategyServiceSample::mutate($addRequestBiddingStrategy);

            $valuesHolder->setBiddingStrategyValuesList($addResponseBiddingStrategy->getRval()->getValues());
            $biddingStrategyId = $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->findBiddingStrategyId(BiddingStrategyType::TARGET_SPEND);

            // sleep 30 second.
            sleep(30);

            // SET
            $setRequestBiddingStrategy = BiddingStrategyServiceSample::buildExampleMutateRequest(
                BiddingStrategyOperator::SET, $accountId,
                BiddingStrategyServiceSample::createExampleSetRequest($valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategies())
            );
            BiddingStrategyServiceSample::mutate($setRequestBiddingStrategy);

            // GET
            $getRequestBiddingStrategy = BiddingStrategyServiceSample::buildExampleGetRequest(
                $accountId, $valuesRepositoryFacade->getBiddingStrategyValuesRepository()->getBiddingStrategyIds()
            );
            BiddingStrategyServiceSample::get($getRequestBiddingStrategy);

            // sleep 30 second.
            sleep(30);

            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_',
                        CampaignServiceSample::createPortfolioBiddingCampaignBiddingStrategy($biddingStrategyId)
                    ),
                    CampaignServiceSample::createExampleMobileAppCampaignForIOS(
                        'SampleMobileAppCampaignForIOS_',
                        CampaignServiceSample::createPortfolioBiddingCampaignBiddingStrategy($biddingStrategyId)
                    ),
                    CampaignServiceSample::createExampleMobileAppCampaignForANDROID(
                        'SampleMobileAppCampaignForANDROID_',
                        CampaignServiceSample::createPortfolioBiddingCampaignBiddingStrategy($biddingStrategyId)
                    ),
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignIdStandard = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
            $campaignIdMobileAppIOS = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::MOBILE_APP, AppStore::IOS);
            $appIdIOS = $valuesRepositoryFacade->getCampaignValuesRepository()->findAppId($campaignIdMobileAppIOS);
            $campaignIdMobileAppAndroid = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::MOBILE_APP, AppStore::ANDROID);
            $appIdAndroid = $valuesRepositoryFacade->getCampaignValuesRepository()->findAppId($campaignIdMobileAppAndroid);

            // GET
            CampaignServiceSample::checkStatus($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaignIds());

            // SET
            $setRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::SET, $accountId,
                CampaignServiceSample::createExampleSetRequest($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaigns())
            );
            CampaignServiceSample::mutate($setRequestCampaign);

            // =================================================================
            // CampaignTargetService
            // =================================================================
            // ADD
            $addRequestCampaignTarget = CampaignTargetServiceSample::buildExampleMutateRequest(
                CampaignTargetOperator::ADD, $accountId,
                [
                    CampaignTargetServiceSample::createExampleScheduleTarget($accountId, $campaignIdStandard),
                    CampaignTargetServiceSample::createExampleLocationTarget($accountId, $campaignIdStandard),
                    CampaignTargetServiceSample::createExampleNetworkTarget($accountId, $campaignIdStandard),
                ]
            );
            $addResponseCampaignTarget = CampaignTargetServiceSample::mutate($addRequestCampaignTarget);

            $campaignTargets = [];
            foreach ($addResponseCampaignTarget->getRval()->getValues() as $campaignTargetValues) {
                $campaignTargets[] = $campaignTargetValues->getCampaignTarget();
            }

            // SET
            $setRequestCampaignTarget = CampaignTargetServiceSample::buildExampleMutateRequest(CampaignTargetOperator::SET, $accountId,
                CampaignTargetServiceSample::createExampleSetRequest($campaignTargets)
            );
            CampaignTargetServiceSample::mutate($setRequestCampaignTarget);

            // GET
            $getRequestCampaignTarget = CampaignTargetServiceSample::buildExampleGetRequest($accountId, $campaignTargets);
            CampaignTargetServiceSample::get($getRequestCampaignTarget);

            // =================================================================
            // CampaignCriterionService
            // =================================================================
            // ADD
            $addRequestCampaignCriterion = CampaignCriterionServiceSample::buildExampleMutateRequest(
                CampaignCriterionOperator::ADD, $accountId,
                [
                    CampaignCriterionServiceSample::createExampleNegativeCampaignCriterion($campaignIdStandard)
                ]
            );
            $addResponseCampaignCriterion = CampaignCriterionServiceSample::mutate($addRequestCampaignCriterion);

            $campaignCriterions = [];
            foreach ($addResponseCampaignCriterion->getRval()->getValues() as $campaignCriterionValues) {
                $campaignCriterions[] = $campaignCriterionValues->getCampaignCriterion();
            }

            // GET
            $getRequestCampaignCriterion = CampaignCriterionServiceSample::buildExampleGetRequest($accountId, $campaignCriterions);
            CampaignCriterionServiceSample::get($getRequestCampaignCriterion);

            // =================================================================
            // AdGroupService
            // =================================================================
            // ADD
            $addRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::ADD, $accountId,
                [
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIdStandard),
                    AdGroupServiceSample::createExampleMobileAppIOSAdGroup($campaignIdMobileAppIOS),
                    AdGroupServiceSample::createExampleMobileAppANDROIDAdGroup($campaignIdMobileAppAndroid),
                ]
            );
            $addResponseAdGroup = AdGroupServiceSample::mutate($addRequestAdGroup);

            $valuesHolder->setAdGroupValuesList($addResponseAdGroup->getRval()->getValues());
            $adGroupIdStandard = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdStandard);
            $adGroupIdMobileAppIOS = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdMobileAppIOS);
            $adGroupIdMobileAppAndroid = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdMobileAppAndroid);

            // GET
            AdGroupServiceSample::checkStatus($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());

            // SET
            $setRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::SET, $accountId,
                AdGroupServiceSample::createExampleSetRequest($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups())
            );
            AdGroupServiceSample::mutate($setRequestAdGroup);

            // =================================================================
            // AdGroupCriterionService
            // =================================================================
            // ADD
            $addRequestAdGroupCriterion = AdGroupCriterionServiceSample::buildExampleMutateRequest(
                AdGroupCriterionOperator::ADD, $accountId,
                [
                    AdGroupCriterionServiceSample::createExampleBiddableAdGroupCriterion($campaignIdStandard, $adGroupIdStandard),
                    AdGroupCriterionServiceSample::createExampleNegativeAdGroupCriterion($campaignIdStandard, $adGroupIdStandard),
                ]
            );
            $addResponseAdGroupCriterion = AdGroupCriterionServiceSample::mutate($addRequestAdGroupCriterion);

            $valuesHolder->setAdGroupCriterionValuesList($addResponseAdGroupCriterion->getRval()->getValues());

            // GET
            $getRequest = AdGroupCriterionServiceSample::buildExampleGetRequest(
                $accountId, AdGroupCriterionUse::BIDDABLE,
                $valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->getAdGroupCriterions()
            );
            AdGroupCriterionServiceSample::get($getRequest);

            // SET
            $setRequestAdGroupCriterion = AdGroupCriterionServiceSample::buildExampleMutateRequest(
                AdGroupCriterionOperator::SET, $accountId,
                AdGroupCriterionServiceSample::createExampleSetRequest($valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->getAdGroupCriterions())
            );

            // run
            AdGroupCriterionServiceSample::mutate($setRequestAdGroupCriterion);

            // =================================================================
            // AdGroupBidMultiplierService
            // =================================================================
            // SET
            $addRequestAdGroupBidMultiplier = AdGroupBidMultiplierServiceSample::buildExampleMutateRequest(
                AdGroupBidMultiplierOperator::SET, $accountId,
                AdGroupBidMultiplierServiceSample::createExampleSetRequest($campaignIdStandard, $adGroupIdStandard)
            );
            $addResponseAdGroupBidMultiplier = AdGroupBidMultiplierServiceSample::mutate($addRequestAdGroupBidMultiplier);

            $adGroupBidMultipliers = [];
            foreach ($addResponseAdGroupBidMultiplier->getRval()->getValues() as $adGroupBidMultiplierValues) {
                $adGroupBidMultipliers[] = $adGroupBidMultiplierValues->getAdGroupBidMultiplier();
            }

            // GET
            $getRequestAdGroupBidMultiplier = AdGroupBidMultiplierServiceSample::buildExampleGetRequest($accountId, $adGroupBidMultipliers);
            AdGroupBidMultiplierServiceSample::get($getRequestAdGroupBidMultiplier);

            // =================================================================
            // AdGroupAdService
            // =================================================================
            // ADD
            $addRequestAdGroupAd = AdGroupAdServiceSample::buildExampleMutateRequest(
                AdGroupAdOperator::ADD, $accountId,
                [
                    AdGroupAdServiceSample::createExampleExtendedTextAd($campaignIdStandard, $adGroupIdStandard),
                    AdGroupAdServiceSample::createExampleAppAdIOS($campaignIdMobileAppIOS, $appIdIOS, $adGroupIdMobileAppIOS),
                    AdGroupAdServiceSample::createExampleAppAdANDROID($campaignIdMobileAppAndroid, $appIdAndroid, $adGroupIdMobileAppAndroid),
                ]
            );
            $addResponseAdGroupAd = AdGroupAdServiceSample::mutate($addRequestAdGroupAd);

            $valuesHolder->setAdGroupAdValuesList($addResponseAdGroupAd->getRval()->getValues());

            // SET
            $setRequestAdGroupAd = AdGroupAdServiceSample::buildExampleMutateRequest(
                AdGroupAdOperator::SET, $accountId,
                AdGroupAdServiceSample::createExampleSetRequest($valuesRepositoryFacade->getAdGroupAdValuesRepository()->getAdGroupAds())
            );
            AdGroupAdServiceSample::mutate($setRequestAdGroupAd);

            // GET
            $getRequestAdGroupAd = AdGroupAdServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getAdGroupAdValuesRepository()->getAdGroupAds());
            AdGroupAdServiceSample::get($getRequestAdGroupAd);

            // =================================================================
            // FeedItemService
            // =================================================================
            // ADD
            $addRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::QUICKLINK,
                [FeedItemServiceSample::createExampleQuicklink()]
            );
            $addResponseFeedItem = FeedItemServiceSample::mutate($addRequestFeedItem);

            $valuesHolder->setFeedItemValuesList($addResponseFeedItem->getRval()->getValues());
            $feedItemId = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(FeedItemPlaceholderType::QUICKLINK);

            // GET
            $getRequestFeedItem = FeedItemServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds());
            FeedItemServiceSample::get($getRequestFeedItem);

            // SET
            $setRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId, FeedItemPlaceholderType::QUICKLINK,
                FeedItemServiceSample::createExampleSetRequest($valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItems())
            );
            FeedItemServiceSample::mutate($setRequestFeedItem);

            // =================================================================
            // CampaignFeedService
            // =================================================================
            // SET
            $setRequestCampaignFeed = CampaignFeedServiceSample::buildExampleMutateRequest(
                CampaignFeedOperator::SET, $accountId,
                [
                    CampaignFeedServiceSample::createExampleSetRequest($accountId, $campaignIdStandard, $feedItemId, CampaignFeedPlaceholderType::QUICKLINK)
                ]
            );
            CampaignFeedServiceSample::mutate($setRequestCampaignFeed);

            // GET
            $getRequestCampaignFeed = CampaignFeedServiceSample::buildExampleGetRequest($accountId, [$campaignIdStandard], [$feedItemId]);
            CampaignFeedServiceSample::get($getRequestCampaignFeed);

            // =================================================================
            // AdGroupFeedService
            // =================================================================
            // SET
            $setRequestAdGroupFeed = AdGroupFeedServiceSample::buildExampleMutateRequest(
                AdGroupFeedOperator::SET, $accountId,
                [
                    AdGroupFeedServiceSample::createExampleSetRequest($accountId, $campaignIdStandard, $adGroupIdStandard, $feedItemId, AdGroupFeedPlaceholderType::QUICKLINK)
                ]
            );
            AdGroupFeedServiceSample::mutate($setRequestAdGroupFeed);

            // GET
            $getRequestAdGroupFeed = AdGroupFeedServiceSample::buildExampleGetRequest($accountId, [$campaignIdStandard], [$adGroupIdStandard], [$feedItemId]);
            AdGroupFeedServiceSample::get($getRequestAdGroupFeed);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            FeedItemServiceSample::cleanup($valuesHolder);
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
