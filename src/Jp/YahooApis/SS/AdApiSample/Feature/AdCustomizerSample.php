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
    AdGroupCriterion\AdGroupCriterionServiceSample,
    Campaign\CampaignServiceSample,
    FeedFolder\FeedFolderServiceSample,
    FeedItem\FeedItemServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\{
    AdGroup\Operator as AdGroupOperator,
    AdGroupAd\Operator as AdGroupAdOperator,
    AdGroupCriterion\AdGroupCriterionUse,
    AdGroupCriterion\Operator as AdGroupCriterionOperator,
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    FeedFolder\FeedFolderPlaceholderField,
    FeedFolder\FeedFolderPlaceholderType,
    FeedFolder\Operator as FeedFolderOperator,
    FeedItem\FeedItemPlaceholderType,
    FeedItem\Operator as FeedItemOperator
};

/**
 * example AdCustomizer operation and Utility method collection.
 */
class AdCustomizerSample
{

    /**
     * example AdCustomizer operation.
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
        $feedFolderId = null;
        $feedFolderName = null;
        $feedAttributeIds = [
            'AD_CUSTOMIZER_INTEGER' => null,
            'AD_CUSTOMIZER_PRICE' => null,
            'AD_CUSTOMIZER_DATE' => null,
            'AD_CUSTOMIZER_STRING' => null,
        ];
        $feedAttributeNames = [
            'AD_CUSTOMIZER_INTEGER' => null,
            'AD_CUSTOMIZER_PRICE' => null,
            'AD_CUSTOMIZER_DATE' => null,
            'AD_CUSTOMIZER_STRING' => null,
        ];
        $campaignId = null;
        $adGroupId = null;

        try {
            // =================================================================
            // FeedFolderService
            // =================================================================
            // ADD
            $addRequestFeedFolder = FeedFolderServiceSample::buildExampleMutateRequest(
                FeedFolderOperator::ADD, $accountId,
                [FeedFolderServiceSample::createExampleAdCustomizerFeedFolder($accountId),]
            );
            $addResponseFeedFolder = FeedFolderServiceSample::mutate($addRequestFeedFolder);

            $valuesHolder->setFeedFolderValuesList($addResponseFeedFolder->getRval()->getValues());
            $feedFolderId = $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedFolderId(FeedFolderPlaceholderType::AD_CUSTOMIZER);
            $feedFolderName = $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedFolderName($feedFolderId);
            $feedAttributeIds = [
                'AD_CUSTOMIZER_INTEGER' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeId($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_INTEGER),
                'AD_CUSTOMIZER_PRICE' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeId($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_PRICE),
                'AD_CUSTOMIZER_DATE' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeId($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_DATE),
                'AD_CUSTOMIZER_STRING' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeId($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_STRING),
            ];
            $feedAttributeNames = [
                'AD_CUSTOMIZER_INTEGER' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeName($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_INTEGER),
                'AD_CUSTOMIZER_PRICE' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeName($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_PRICE),
                'AD_CUSTOMIZER_DATE' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeName($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_DATE),
                'AD_CUSTOMIZER_STRING' => $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedAttributeName($feedFolderId, FeedFolderPlaceholderField::AD_CUSTOMIZER_STRING),
            ];

            // SET
            $setRequestFeedFolder = FeedFolderServiceSample::buildExampleMutateRequest(
                FeedFolderOperator::SET, $accountId,
                FeedFolderServiceSample::createExampleSetRequest($valuesRepositoryFacade->getFeedFolderValuesRepository()->getFeedFolders())
            );
            FeedFolderServiceSample::mutate($setRequestFeedFolder);

            // GET
            $getRequestFeedFolder = FeedFolderServiceSample::buildExampleGetRequest($accountId, [$feedFolderId]);
            FeedFolderServiceSample::get($getRequestFeedFolder);

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
            CampaignServiceSample::checkStatus([$campaignId]);

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
                [AdGroupServiceSample::createExampleStandardAdGroup($campaignId)]
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
            // AdGroupCriterionService
            // =================================================================
            // ADD
            $addRequestAdGroupCriterion = AdGroupCriterionServiceSample::buildExampleMutateRequest(
                AdGroupCriterionOperator::ADD, $accountId,
                [
                    AdGroupCriterionServiceSample::createExampleBiddableAdGroupCriterion($campaignId, $adGroupId),
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

            //=================================================================
            // FeedItemService
            //=================================================================
            // ADD
            $addRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::ADD, $accountId,
                FeedItemPlaceholderType::AD_CUSTOMIZER,
                [FeedItemServiceSample::createExampleAdCustomizer($campaignId, $adGroupId, $feedFolderId, $feedAttributeIds)]
            );
            $addResponseFeedItem = FeedItemServiceSample::mutate($addRequestFeedItem);

            $valuesHolder->setFeedItemValuesList($addResponseFeedItem->getRval()->getValues());

            // GET
            $getRequestFeedItem = FeedItemServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItemIds());
            FeedItemServiceSample::get($getRequestFeedItem);

            // SET
            $setRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::SET, $accountId,
                FeedItemPlaceholderType::AD_CUSTOMIZER,
                FeedItemServiceSample::createExampleSetRequest($valuesRepositoryFacade->getFeedItemValuesRepository()->getFeedItems())
            );
            FeedItemServiceSample::mutate($setRequestFeedItem);

            // =================================================================
            // AdGroupAdService
            // =================================================================
            // ADD
            $addRequestAdGroupAd = AdGroupAdServiceSample::buildExampleMutateRequest(
                AdGroupAdOperator::ADD, $accountId,
                AdGroupAdServiceSample::createExampleAdCustomizerAds($campaignId, $adGroupId, $feedFolderName, $feedAttributeNames)
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

            //=================================================================
            // FeedItemService REMOVE
            //=================================================================
            // REMOVE
            $removeRequestFeedItem = FeedItemServiceSample::buildExampleMutateRequest(
                FeedItemOperator::REMOVE, $accountId,
                FeedItemPlaceholderType::AD_CUSTOMIZER,
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
    AdCustomizerSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
