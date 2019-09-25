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
    AdGroupWebpage\AdGroupWebpageServiceSample,
    Campaign\CampaignServiceSample,
    CampaignWebpage\CampaignWebpageServiceSample,
    FeedFolder\FeedFolderServiceSample,
    PageFeedItem\PageFeedItemServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\{
    AdGroup\Operator as AdGroupOperator,
    AdGroupAd\Operator as AdGroupAdOperator,
    AdGroupWebpage\Operator as AdGroupWebpageOperator,
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    CampaignWebpage\Operator as CampaignWebpageOperator,
    FeedFolder\FeedFolderPlaceholderType,
    FeedFolder\Operator as FeedFolderOperator,
    PageFeedItem\PageFeedItemJobType
};

/**
 * example DynamicAdsForSearch operation and Utility method collection.
 */
class DynamicAdsForSearchSample
{

    /**
     * example DynamicAdsForSearch operation.
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
        $campaignId = null;
        $adGroupId = null;

        $fileName = 'pageFeedItemUploadSample.csv';
        $jobId = null;
        $uploadUrl = null;
        $downloadUrl = null;

        try {
            // =================================================================
            // FeedFolderService
            // =================================================================
            // ADD
            $addRequestFeedFolder = FeedFolderServiceSample::buildExampleMutateRequest(
                FeedFolderOperator::ADD, $accountId,
                [FeedFolderServiceSample::createExampleDynamicAdForSearchFeedFolder($accountId),]
            );
            $addResponseFeedFolder = FeedFolderServiceSample::mutate($addRequestFeedFolder);

            $valuesHolder->setFeedFolderValuesList($addResponseFeedFolder->getRval()->getValues());
            $feedFolderId = $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedFolderId(FeedFolderPlaceholderType::DYNAMIC_AD_FOR_SEARCH_PAGE_FEEDS);

            // GET
            $getRequestFeedFolder = FeedFolderServiceSample::buildExampleGetRequest($accountId, [$feedFolderId]);
            FeedFolderServiceSample::get($getRequestFeedFolder);

            //=================================================================
            // PageFeedItemService
            //=================================================================
            // getUploadUrl
            $getUploadUrlRequest = PageFeedItemServiceSample::buildExampleGetUploadUrl($accountId, $feedFolderId);
            $getUploadUrlResponse = PageFeedItemServiceSample::getUploadUrl($getUploadUrlRequest);
            foreach ($getUploadUrlResponse->getRval()->getValues() as $feedItemUploadUrlValues) {
                $uploadUrl = $feedItemUploadUrlValues->getUploadUrl()->getUrl();
            }

            // upload
            $uploadResponse = SoapUtils::upload($uploadUrl, $fileName);
            if ($uploadResponse === false) {
                exit();
            }
            $uploadResponseObj = json_decode($uploadResponse);
            $jobId = $uploadResponseObj->ResultSet->Result[0]->pageFeedItemUploadJob->jobId;

            // check job status
            PageFeedItemServiceSample::checkStatus(PageFeedItemJobType::UPLOAD, [$jobId]);

            // getReviewSummary
            $getReviewSummaryRequest = PageFeedItemServiceSample::buildExampleGetReviewSummary($accountId, [$feedFolderId]);
            PageFeedItemServiceSample::getReviewSummary($getReviewSummaryRequest);

            // get
            $getRequest = PageFeedItemServiceSample::buildExampleGetRequest($accountId, [$feedFolderId]);
            PageFeedItemServiceSample::get($getRequest);

            // addDownloadJob
            $addDownloadJobRequest = PageFeedItemServiceSample::buildExampleAddDownloadJob($accountId, [$feedFolderId]);
            $addDownloadJobResponse = PageFeedItemServiceSample::addDownloadJob($addDownloadJobRequest);
            foreach ($addDownloadJobResponse->getRval()->getValues() as $downloadJobValues) {
                $jobId = $downloadJobValues->getJob()->getJobId();
            }

            // check job status
            PageFeedItemServiceSample::checkStatus(PageFeedItemJobType::DOWNLOAD, [$jobId]);

            // getJobStatus
            $getJobStatusRequest = PageFeedItemServiceSample::buildExampleGetJobStatus($accountId, PageFeedItemJobType::DOWNLOAD, [$jobId]);
            $getJobStatusResponse = PageFeedItemServiceSample::getJobStatus($getJobStatusRequest);
            foreach ($getJobStatusResponse->getRval()->getValues() as $feedItemJobValues) {
                $downloadUrl = $feedItemJobValues->getJob()->getDownloadUrl();
            }

            // download
            SoapUtils::download($downloadUrl, 'pageFeedItemDownloadSample.csv');

            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleDynamicAdsForSearchCampaign(
                        'SampleManualCpcDynamicAdsForSearchCampaign_',
                        [$feedFolderId],
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    )
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::DYNAMIC_ADS_FOR_SEARCH);

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
            // AdGroupAdService
            // =================================================================
            // ADD
            $addRequestAdGroupAd = AdGroupAdServiceSample::buildExampleMutateRequest(
                AdGroupAdOperator::ADD, $accountId,
                [AdGroupAdServiceSample::createExampleDynamicSearchLinkedAd($campaignId, $adGroupId)]
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
            // CampaignWebpageService
            // =================================================================
            // ADD
            $addRequestCampaignWebpage = CampaignWebpageServiceSample::buildExampleMutateRequest(CampaignWebpageOperator::ADD, $accountId, [
                CampaignWebpageServiceSample::createExampleCampaignWebpage($campaignId)
            ]);
            $addResponseCampaignWebpage = CampaignWebpageServiceSample::mutate($addRequestCampaignWebpage);
            $campaignWebpages = [];
            foreach ($addResponseCampaignWebpage->getRval()->getValues() as $campaignWebpageValues) {
                $campaignWebpages[] = $campaignWebpageValues->getCampaignWebpage();
            }

            // GET
            $getRequestCampaignWebpage = CampaignWebpageServiceSample::buildExampleGetRequest($accountId, $campaignWebpages);
            CampaignWebpageServiceSample::get($getRequestCampaignWebpage);

            // =================================================================
            // AdGroupWebpageService
            // =================================================================
            // ADD
            $addRequestAdGroupWebpage = AdGroupWebpageServiceSample::buildExampleMutateRequest(AdGroupWebpageOperator::ADD, $accountId, [
                AdGroupWebpageServiceSample::createExampleAdGroupWebpage($campaignId, $adGroupId)
            ]);

            // run
            $addResponseAdGroupWebpage = AdGroupWebpageServiceSample::mutate($addRequestAdGroupWebpage);
            $adGroupWebpages = [];
            foreach ($addResponseAdGroupWebpage->getRval()->getValues() as $adGroupWebpageValues) {
                $adGroupWebpages[] = $adGroupWebpageValues->getAdGroupWebpage();
            }

            // SET
            $setRequestAdGroupWebpage = AdGroupWebpageServiceSample::buildExampleMutateRequest(AdGroupWebpageOperator::SET, $accountId,
                AdGroupWebpageServiceSample::createExampleSetRequest($adGroupWebpages)
            );
            AdGroupWebpageServiceSample::mutate($setRequestAdGroupWebpage);

            // GET
            $getRequestAdGroupWebpage = AdGroupWebpageServiceSample::buildExampleGetRequest($accountId, $adGroupWebpages);
            AdGroupWebpageServiceSample::get($getRequestAdGroupWebpage);

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
    DynamicAdsForSearchSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
