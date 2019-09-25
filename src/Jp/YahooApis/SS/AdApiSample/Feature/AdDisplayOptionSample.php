<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Feature;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{
    AdGroup\AdGroupServiceSample,
    AdGroupFeed\AdGroupFeedServiceSample,
    Campaign\CampaignServiceSample,
    CampaignFeed\CampaignFeedServiceSample,
    FeedItem\FeedItemServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\{
    AdGroup\Operator as AdGroupOperator,
    AdGroupFeed\AdGroupFeedPlaceholderType,
    AdGroupFeed\Operator as AdGroupFeedOperator,
    Campaign\Operator as CampaignOperator,
    CampaignFeed\CampaignFeedPlaceholderType,
    CampaignFeed\Operator as CampaignFeedOperator,
    FeedItem\FeedItemPlaceholderType,
    FeedItem\Operator as FeedItemOperator
};

/**
 * example AdDisplayOption operation and Utility method collection.
 */
class AdDisplayOptionSample
{

    /**
     * example AdDisplayOption operation.
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
        $campaignIds = [];
        $adGroupIds = [];
        $feedItemIdQuicklink = null;
        $feedItemIdCallextension = null;
        $feedItemIdCallout = null;

        try {
            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_1_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_2_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_3_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignIds = $valuesRepositoryFacade->getCampaignValuesRepository()->getCampaignIds();

            // GET
            CampaignServiceSample::checkStatus($campaignIds);

            // SET
            $setRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::SET, $accountId,
                CampaignServiceSample::createExampleSetRequest($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaigns())
            );
            CampaignServiceSample::mutate($setRequestCampaign);

            // =================================================================
            // AdGroupService
            // =================================================================
            // ADD
            $addRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::ADD, $accountId,
                [
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIds[0]),
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIds[1]),
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIds[2]),
                ]
            );
            $addResponseAdGroup = AdGroupServiceSample::mutate($addRequestAdGroup);

            $valuesHolder->setAdGroupValuesList($addResponseAdGroup->getRval()->getValues());
            $adGroupIds = $valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroupIds();

            // GET
            AdGroupServiceSample::checkStatus($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());

            // SET
            $setRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::SET, $accountId,
                AdGroupServiceSample::createExampleSetRequest($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups())
            );
            AdGroupServiceSample::mutate($setRequestAdGroup);

            //=================================================================
            // FeedItemService ADD
            //=================================================================
            // QUICKLINK
            $addRequestQuicklink = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::QUICKLINK,
                [FeedItemServiceSample::createExampleQuicklink()]
            );
            $addResponseQuicklink = FeedItemServiceSample::mutate($addRequestQuicklink);

            // CALLEXTENSION
            $addRequestCallextension = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::CALLEXTENSION,
                [FeedItemServiceSample::createExampleCallextension()]
            );
            $addResponseCallextension = FeedItemServiceSample::mutate($addRequestCallextension);

            // CALLOUT
            $addRequestCallout = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::CALLOUT,
                [FeedItemServiceSample::createExampleCallout()]
            );
            $addResponseCallout = FeedItemServiceSample::mutate($addRequestCallout);

            $valuesHolder->setFeedItemValuesList($addResponseQuicklink->getRval()->getValues());
            $valuesHolder->setFeedItemValuesList($addResponseCallextension->getRval()->getValues());
            $valuesHolder->setFeedItemValuesList($addResponseCallout->getRval()->getValues());
            $feedItemIdQuicklink = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(FeedItemPlaceholderType::QUICKLINK);
            $feedItemIdCallextension = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(FeedItemPlaceholderType::CALLEXTENSION);
            $feedItemIdCallout = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(FeedItemPlaceholderType::CALLOUT);

            //=================================================================
            // FeedItemService GET
            //=================================================================
            $getRequestFeedItem = FeedItemServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds());
            FeedItemServiceSample::get($getRequestFeedItem);

            //=================================================================
            // FeedItemService SET
            //=================================================================
            // QUICKLINK
            $setRequestQuicklink = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId,
                FeedItemPlaceholderType::QUICKLINK,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::QUICKLINK)]
                )
            );
            FeedItemServiceSample::mutate($setRequestQuicklink);

            // CALLEXTENSION
            $setRequestCallextension = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId,
                FeedItemPlaceholderType::CALLEXTENSION,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLEXTENSION)]
                )
            );
            FeedItemServiceSample::mutate($setRequestCallextension);

            // CALLOUT
            $setRequestCallout = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId,
                FeedItemPlaceholderType::CALLOUT,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLOUT)]
                )
            );
            FeedItemServiceSample::mutate($setRequestCallout);

            // =================================================================
            // CampaignFeedService
            // =================================================================
            // SET
            $setRequestCampaignFeedQuicklink = CampaignFeedServiceSample::buildExampleMutateRequest(CampaignFeedOperator::SET, $accountId,
                [
                    CampaignFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[0], $feedItemIdQuicklink, CampaignFeedPlaceholderType::QUICKLINK),
                    CampaignFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[1], $feedItemIdCallextension, CampaignFeedPlaceholderType::CALLEXTENSION),
                    CampaignFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[2], $feedItemIdCallout, CampaignFeedPlaceholderType::CALLOUT)
                ]
            );
            CampaignFeedServiceSample::mutate($setRequestCampaignFeedQuicklink);

            // GET
            $getRequestCampaignFeed = CampaignFeedServiceSample::buildExampleGetRequest(
                $accountId, $campaignIds, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds()
            );
            CampaignFeedServiceSample::get($getRequestCampaignFeed);

            //=================================================================
            // AdGroupFeedService
            //=================================================================
            // SET
            $setRequestAdGroupFeedQuicklink = AdGroupFeedServiceSample::buildExampleMutateRequest(
                AdGroupFeedOperator::SET, $accountId,
                [
                    AdGroupFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[0], $adGroupIds[0], $feedItemIdQuicklink, AdGroupFeedPlaceholderType::QUICKLINK),
                    AdGroupFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[1], $adGroupIds[1], $feedItemIdCallextension, AdGroupFeedPlaceholderType::CALLEXTENSION),
                    AdGroupFeedServiceSample::createExampleSetRequest($accountId, $campaignIds[2], $adGroupIds[2], $feedItemIdCallout, AdGroupFeedPlaceholderType::CALLOUT)
                ]
            );
            AdGroupFeedServiceSample::mutate($setRequestAdGroupFeedQuicklink);

            // GET
            $getRequest = AdGroupFeedServiceSample::buildExampleGetRequest(
                $accountId, $campaignIds, $adGroupIds, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds()
            );
            AdGroupFeedServiceSample::get($getRequest);

            //=================================================================
            // FeedItemService REMOVE
            //=================================================================
            // QUICKLINK
            $removeRequestQuicklink = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::REMOVE,
                $accountId,
                FeedItemPlaceholderType::QUICKLINK,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::QUICKLINK)]
                )
            );
            FeedItemServiceSample::mutate($removeRequestQuicklink);

            // CALLEXTENSION
            $removeRequestCallextension = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::REMOVE,
                $accountId,
                FeedItemPlaceholderType::CALLEXTENSION,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLEXTENSION)]
                )
            );
            FeedItemServiceSample::mutate($removeRequestCallextension);

            // CALLOUT
            $removeRequestCallout = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::REMOVE,
                $accountId,
                FeedItemPlaceholderType::CALLOUT,
                FeedItemServiceSample::createExampleSetRequest(
                    [$valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItem(FeedItemPlaceholderType::CALLOUT)]
                )
            );
            FeedItemServiceSample::mutate($removeRequestCallout);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            CampaignServiceSample::cleanup($valuesHolder);
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdDisplayOptionSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
