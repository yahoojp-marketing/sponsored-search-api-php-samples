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
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    CampaignFeed\CampaignFeedPlaceholderType,
    CampaignFeed\Operator as CampaignFeedOperator,
    FeedItem\FeedItemPlaceholderType,
    FeedItem\Operator as FeedItemOperator
};

/**
 * example StructuredSnippet operation and Utility method collection.
 */
class StructuredSnippetSample
{

    /**
     * example StructuredSnippet operation.
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
        $campaignId = null;
        $adGroupId = null;
        $feedItemId = null;

        try {
            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    )
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);

            // GET
            CampaignServiceSample::checkStatus($valuesRepositoryFacade->getCampaignValuesRepository()->getCampaignIds());

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
                [AdGroupServiceSample::createExampleStandardAdGroup($campaignId),]
            );
            $addResponseAdGroup = AdGroupServiceSample::mutate($addRequestAdGroup);

            $valuesHolder->setAdGroupValuesList($addResponseAdGroup->getRval()->getValues());
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

            // GET
            AdGroupServiceSample::checkStatus($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());

            // SET
            $setRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::SET, $accountId,
                AdGroupServiceSample::createExampleSetRequest($valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups())
            );
            AdGroupServiceSample::mutate($setRequestAdGroup);

            // =================================================================
            // FeedItemService
            // =================================================================
            // ADD
            $addRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::STRUCTURED_SNIPPET,
                [FeedItemServiceSample::createExampleStructuredSnippet()]
            );
            $addResponseFeedItem = FeedItemServiceSample::mutate($addRequestFeedItem);

            $valuesHolder->setFeedItemValuesList($addResponseFeedItem->getRval()->getValues());
            $feedItemId = $valuesRepositoryFacade->getFeedItemValuesRepository()->findFeedItemId(FeedItemPlaceholderType::STRUCTURED_SNIPPET);

            // GET
            $getRequestFeedItem = FeedItemServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds());
            FeedItemServiceSample::get($getRequestFeedItem);

            // SET
            $setRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId,
                FeedItemPlaceholderType::STRUCTURED_SNIPPET,
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
                    CampaignFeedServiceSample::createExampleSetRequest($accountId, $campaignId, $feedItemId, CampaignFeedPlaceholderType::STRUCTURED_SNIPPET)
                ]
            );
            CampaignFeedServiceSample::mutate($setRequestCampaignFeed);

            // GET
            $getRequestCampaignFeed = CampaignFeedServiceSample::buildExampleGetRequest($accountId, [$campaignId], [$feedItemId]);
            CampaignFeedServiceSample::get($getRequestCampaignFeed);

            // =================================================================
            // AdGroupFeedService
            // =================================================================
            // SET
            $setRequestAdGroupFeed = AdGroupFeedServiceSample::buildExampleMutateRequest(
                AdGroupFeedOperator::SET, $accountId,
                [
                    AdGroupFeedServiceSample::createExampleSetRequest($accountId, $campaignId, $adGroupId, $feedItemId, AdGroupFeedPlaceholderType::STRUCTURED_SNIPPET)
                ]
            );
            AdGroupFeedServiceSample::mutate($setRequestAdGroupFeed);

            // GET
            $getRequestAdGroupFeed = AdGroupFeedServiceSample::buildExampleGetRequest($accountId, [$campaignId], [$adGroupId], [$feedItemId]);
            AdGroupFeedServiceSample::get($getRequestAdGroupFeed);

            //=================================================================
            // FeedItemService REMOVE
            //=================================================================
            // REMOVE
            $removeRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::REMOVE, $accountId,
                FeedItemPlaceholderType::STRUCTURED_SNIPPET,
                $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItems()
            );
            FeedItemServiceSample::mutate($removeRequestFeedItem);

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
    StructuredSnippetSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
