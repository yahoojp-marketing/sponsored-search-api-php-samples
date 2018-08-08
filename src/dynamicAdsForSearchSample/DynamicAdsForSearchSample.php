<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupAdServiceSample.php');
require_once(dirname(__FILE__) . '/PageFeedItemServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignWebpageServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupWebpageServiceSample.php');

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}


/**
 * Sample Program for DynamicAdsForSearchSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
try {
    $feedFolderService = new FeedFolderServiceSample();
    $pageFeedItemService = new PageFeedItemServiceSample();
    $campaignWebpageServiceSample = new CampaignWebpageServiceSample();
    $adGroupWebpageServiceSample = new AdGroupWebpageServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    $jobId = null;
    $fileName = 'pageFeedItemUploadSample.csv';
    $uploadUrl = null;
    $downloadUrl = null;

    //=================================================================
    // FeedFolderService
    //=================================================================
    $feedFolderValues = array();
    if ($feedFolderId === 'xxxxxxxx') {
        $feedFolderAddRequest = $feedFolderService->createMutateRequest('ADD', $accountId);
        array_push($feedFolderAddRequest['operations']['operand'], $feedFolderService->createAddDynamicAdForSearchFeedFolder($accountId));
        $feedFolderValues = $feedFolderService->mutate($feedFolderAddRequest, 'ADD');
        foreach ($feedFolderValues as $feedFolderValue) {
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
        }
    }

    //=================================================================
    // PageFeedItemService
    //=================================================================
    // getUploadUrl
    $getUploadUrlRequest = $pageFeedItemService->createGetUploadUrlRequest($accountId, $feedFolderId);
    $getUploadUrlResponse = $pageFeedItemService->getUploadUrl($getUploadUrlRequest);
    foreach ($getUploadUrlResponse as $values) {
        $uploadUrl = $values->uploadUrl->url;
    }

    // upload
    $uploadResponse = SoapUtils::upload($uploadUrl, $fileName);
    if ($uploadResponse === false) {
        exit();
    }
    $uploadResponseObj = json_decode($uploadResponse);
    $jobId = $uploadResponseObj->ResultSet->Result[0]->pageFeedItemUploadJob->jobId;;

    // getJobStatus
    $pageFeedItemService->checkJobStatus($accountId, 'UPLOAD', array($jobId));

    // getReviewSummary
    $getReviewSummaryRequest = $pageFeedItemService->createGetReviewSummaryRequest($accountId, array($feedFolderId));
    $pageFeedItemService->getReviewSummary($getReviewSummaryRequest);

    // get
    $getRequest = $pageFeedItemService->createGetRequest($accountId, array($feedFolderId));
    $pageFeedItemService->get($getReviewSummaryRequest);

    // addDownloadJob
    $addDownloadJobRequest = $pageFeedItemService->createAddDownloadJobRequest($accountId, array($feedFolderId));
    $addDownloadJobResponse = $pageFeedItemService->addDownloadJob($addDownloadJobRequest);
    foreach ($addDownloadJobResponse as $values) {
        $jobId = $values->job->jobId;
    }

    // getJobStatus
    $pageFeedItemService->checkJobStatus($accountId, 'DOWNLOAD', array($jobId));

    // download
    SoapUtils::download($downloadUrl, 'pageFeedItemDownloadSample.csv');

    // =================================================================
    // CampaignService
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcDynamicAdsForSearchCampaign($accountId, array($feedFolderId)));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // =================================================================
    // AdGroupService
    // =================================================================
    $adGroupValues = array();
    if ($adGroupId === 'xxxxxxxx') {
        $addAdGroupRequest = $adGroupServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddStandardAdGroup($accountId, $campaignId));
        $adGroupValues = $adGroupServiceSample->mutate($addAdGroupRequest, 'ADD');
        foreach ($adGroupValues as $adGroupValue) {
            $adGroupId = $adGroupValue->adGroup->adGroupId;
        }
    }

    // =================================================================
    // AdGroupAdService
    // =================================================================
    $adGroupAdAddRequest = $adGroupAdServiceSample->createMutateRequest('ADD',$accountId);
    array_push($adGroupAdAddRequest['operations']['operand'], $adGroupAdServiceSample->createAddDynamicSearchLinkedAd($accountId,$campaignId,$adGroupId));
    $adGroupAdValues = $adGroupAdServiceSample->mutate($adGroupAdAddRequest, 'ADD');

    // =================================================================
    // CampaignWebpageService
    // =================================================================
    // add
    $addCampaignWebpageRequest = $campaignWebpageServiceSample->createMutateRequest('ADD', $accountId);
    array_push($addCampaignWebpageRequest['operations']['operand'], $campaignWebpageServiceSample->createAddCampaignWebpage($accountId, $campaignId));
    $campaignWebpageValues = $campaignWebpageServiceSample->mutate($addCampaignWebpageRequest, 'ADD');

    // =================================================================
    // AdGroupWebpageService
    // =================================================================
    // add
    $addAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('ADD', $accountId);
    array_push($addAdGroupWebpageRequest['operations']['operand'], $adGroupWebpageServiceSample->createAddAdGroupWebpage($accountId, $campaignId, $adGroupId));
    $adGroupWebpageValues = $adGroupWebpageServiceSample->mutate($addAdGroupWebpageRequest, 'ADD');

    // set
    $setAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('SET', $accountId);
    $setAdGroupWebpageRequest['operations']['operand'] = $adGroupWebpageServiceSample->createSetAdGroupWebpage($adGroupWebpageValues);
    $adGroupWebpageServiceSample->mutate($setAdGroupWebpageRequest, 'SET');

    // remove
    $removeAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('REMOVE', $accountId);
    $removeAdGroupWebpageRequest['operations']['operand'] = $adGroupWebpageServiceSample->createRemoveCampaignWebpage($adGroupWebpageValues);
    $adGroupWebpageServiceSample->mutate($removeAdGroupWebpageRequest, 'REMOVE');

    // =================================================================
    // CampaignWebpageService
    // =================================================================
    // remove
    $removeCampaignWebpageRequest = $campaignWebpageServiceSample->createMutateRequest('REMOVE', $accountId);
    $removeCampaignWebpageRequest['operations']['operand'] = $campaignWebpageServiceSample->createRemoveCampaignWebpage($campaignWebpageValues);
    $campaignWebpageServiceSample->mutate($removeCampaignWebpageRequest, 'REMOVE');

    //=================================================================
    // remove AdGroupAd, AdGroup, Campaign, FeedFolderService
    //=================================================================
    // AdGroupAdService
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);
    $adGroupAdServiceSample->mutate($operation, 'REMOVE');

    // AdGroup
    if (count($adGroupValues) > 0) {
        $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
        $adGroupServiceSample->mutate($operation, 'REMOVE');
    }

    // Campaign
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignServiceSample->mutate($operation, 'REMOVE');
    }

    // FeedFolderService
    if (count($feedFolderValues) > 0) {
        $feedFolderService->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
