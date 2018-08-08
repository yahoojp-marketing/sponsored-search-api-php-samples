<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');

/**
 * Sample Program for PageFeedItemServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class PageFeedItemServiceSample
{

    private $serviceName = 'PageFeedItemService';

    /**
     * Sample Program for PageFeedItemService getUploadUrl.
     *
     * @param array $request PageFeedItemUploadUrlOperation entity.
     * @return array PageFeedItemUploadUrlValues entity.
     * @throws Exception
     */
    public function getUploadUrl($request)
    {
        // Call API
        $pageFeedItemService = SoapUtils::getService($this->serviceName);
        $response = $pageFeedItemService->invoke('getUploadUrl', $request);

        // Response
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $pageFeedItemUploadUrlValues = $response->rval->values;
            } else {
                $pageFeedItemUploadUrlValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception("No response of getUploadUrl PageFeedItemService.");
        }

        // Error
        foreach ($pageFeedItemUploadUrlValues as $pageFeedItemUploadUrlValue) {
            if (!isset($pageFeedItemUploadUrlValue->uploadUrl)) {
                throw new Exception("Fail to getUploadUrl PageFeedItemService.");
            }
        }

        return $pageFeedItemUploadUrlValues;
    }

    /**
     * Sample Program for PageFeedItemService getJobStatus.
     *
     * @param array $request PageFeedItemJobStatusSelector entity.
     * @return array PageFeedItemJobValues entity.
     * @throws Exception
     */
    public function getJobStatus($request)
    {
        // Call API
        $pageFeedItemService = SoapUtils::getService($this->serviceName);
        $response = $pageFeedItemService->invoke('getJobStatus', $request);

        // Response
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $pageFeedItemJobValues = $response->rval->values;
            } else {
                $pageFeedItemJobValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception("No response of getJobStatus PageFeedItemService.");
        }

        // Error
        foreach ($pageFeedItemJobValues as $pageFeedItemJobValue) {
            if (!isset($pageFeedItemJobValue->job)) {
                throw new Exception("Fail to getJobStatus PageFeedItemService.");
            }
        }

        return $pageFeedItemJobValues;
    }

    /**
     * Sample Program for PageFeedItemService getReviewSummary.
     *
     * @param array $request PageFeedItemReviewSummarySelector entity.
     * @return array PageFeedItemReviewSummaryValues entity.
     * @throws Exception
     */
    public function getReviewSummary($request)
    {
        // Call API
        $pageFeedItemService = SoapUtils::getService($this->serviceName);
        $response = $pageFeedItemService->invoke('getReviewSummary', $request);

        // Response
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $pageFeedItemReviewSummaryValues = $response->rval->values;
            } else {
                $pageFeedItemReviewSummaryValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception("No response of getReviewSummary PageFeedItemService.");
        }

        // Error
        foreach ($pageFeedItemReviewSummaryValues as $pageFeedItemReviewSummaryValue) {
            if (!isset($pageFeedItemReviewSummaryValue->reviewSummary)) {
                throw new Exception("Fail to getReviewSummary PageFeedItemService.");
            }
        }

        return $pageFeedItemReviewSummaryValues;
    }

    /**
     * Sample Program for PageFeedItemService get.
     *
     * @param array $request PageFeedItemSelector entity.
     * @return array PageFeedItemReturnValues entity.
     * @throws Exception
     */
    public function get($request)
    {
        // Call API
        $pageFeedItemService = SoapUtils::getService($this->serviceName);
        $response = $pageFeedItemService->invoke('get', $request);

        // Response
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $pageFeedItemReturnValues = $response->rval->values;
            } else {
                $pageFeedItemReturnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception("No response of get PageFeedItemService.");
        }

        // Error
        foreach ($pageFeedItemReturnValues as $pageFeedItemReturnValue) {
            if (!isset($pageFeedItemReturnValue->pageFeedItem)) {
                throw new Exception("Fail to get PageFeedItemService.");
            }
        }

        return $pageFeedItemReturnValues;
    }

    /**
     * Sample Program for PageFeedItemService addDownloadJob.
     *
     * @param array $request PageFeedItemDownloadJobOperation entity.
     * @return array PageFeedItemDownloadJobReturnValue entity.
     * @throws Exception
     */
    public function addDownloadJob($request)
    {
        // Call API
        $pageFeedItemService = SoapUtils::getService($this->serviceName);
        $response = $pageFeedItemService->invoke('addDownloadJob', $request);

        // Response
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $pageFeedItemDownloadJobReturnValue = $response->rval->values;
            } else {
                $pageFeedItemDownloadJobReturnValue = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception("No response of addDownloadJob PageFeedItemService.");
        }

        // Error
        foreach ($pageFeedItemDownloadJobReturnValue as $pageFeedItemDownloadJobValues) {
            if (!isset($pageFeedItemDownloadJobValues->job)) {
                throw new Exception("Fail to addDownloadJob PageFeedItemService.");
            }
        }

        return $pageFeedItemDownloadJobReturnValue;
    }

    /**
     * Sample Program for PageFeedItemService getUploadUrl.
     *
     * @param string $accountId Account ID
     * @param string $feedFolderId FeedFolder ID
     * @return array PageFeedItemUploadUrlOperation entity
     */
    public function createGetUploadUrlRequest($accountId, $feedFolderId)
    {
        return array(
            'operations' => array(
                'accountId' => $accountId,
                'operand' => array(
                    'uploadType' => 'NEW_OR_REPLACE',
                    'feedFolderId' => $feedFolderId,
                )
            )
        );
    }

    /**
     * Sample Program for PageFeedItemService getJobStatus.
     *
     * @param string $accountId Account ID
     * @param string $jobType Job Type
     * @param array $jobIds Job Ids
     * @return array PageFeedItemUploadUrlOperation entity
     */
    public function createGetJobStatusRequest($accountId, $jobType = 'UPLOAD', $jobIds = array())
    {
        return array(
            'selector' => array(
                'accountId' => $accountId,
                'jobIds' => $jobIds,
                'jobType' => $jobType
            )
        );
    }

    /**
     * Sample Program for PageFeedItemService getReviewSummary.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderIds FeedFolder Ids
     * @return array PageFeedItemReviewSummarySelector entity
     */
    public function createGetReviewSummaryRequest($accountId, $feedFolderIds = array())
    {
        return array(
            'selector' => array(
                'accountId' => $accountId,
                'feedFolderIds' => $feedFolderIds
            )
        );
    }

    /**
     * Sample Program for PageFeedItemService get.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderIds FeedFolder Ids
     * @return array PageFeedItemSelector entity
     */
    public function createGetRequest($accountId, $feedFolderIds = array())
    {
        return array(
            'selector' => array(
                'accountId' => $accountId,
                'feedFolderIds' => $feedFolderIds
            )
        );
    }

    /**
     * Sample Program for PageFeedItemService addDownloadJob.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderIds FeedFolder Ids
     * @return array PageFeedItemDownloadJobOperation entity
     */
    public function createAddDownloadJobRequest($accountId, $feedFolderIds = array())
    {
        return array(
            'operations' => array(
                'accountId' => $accountId,
                'operand' => array(
                    'feedFolderIds' => $feedFolderIds,
                    'encoding' => 'UTF-8'
                )
            )
        );
    }

    /**
     * example check job status.
     *
     * @param string $accountId Account ID
     * @param string $jobType Job Type
     * @param array $jobIds Job Ids
     * @return array PageFeedItemUploadUrlOperation entity
     * @throws Exception
     */
    public function checkJobStatus($accountId, $jobType, $jobIds) {
        $getUploadJobStatusRequest = $this->createGetJobStatusRequest($accountId, $jobType, $jobIds);

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {
            // sleep 30 second.
            echo "\n***** sleep 30 seconds for PageFeedItem Upload Job *****\n";
            sleep(30);

            // call API
            $getUploadJobStatusResponse = $this->getJobStatus($getUploadJobStatusRequest);

            // status check
            foreach ($getUploadJobStatusResponse as $value) {
                if ($value->job->uploadJobStatus === 'COMPLETED') {
                    return $getUploadJobStatusResponse;
                } elseif ($value->job->uploadJobStatus === 'IN_PROGRESS') {
                    continue 2;
                } else {
                    echo 'Upload job status failed.';
                    echo 'PageFeedItemUploadJobStatus:' . $value->job->uploadJobStatus;
                    exit();
                }
            }
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * PageFeedItemServiceSample
 */
try {
    $feedFolderService = new FeedFolderServiceSample();
    $pageFeedItemService = new PageFeedItemServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderId = SoapUtils::getFeedFolderId();
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
    /*
     * getUploadUrl
     */
    $getUploadUrlRequest = $pageFeedItemService->createGetUploadUrlRequest($accountId, $feedFolderId);
    $getUploadUrlResponse = $pageFeedItemService->getUploadUrl($getUploadUrlRequest);
    foreach ($getUploadUrlResponse as $values) {
        $uploadUrl = $values->uploadUrl->url;
    }

    /*
     * upload
     */
    $uploadResponse = SoapUtils::upload($uploadUrl, $fileName);
    if ($uploadResponse === false) {
        exit();
    }
    $uploadResponseObj = json_decode($uploadResponse);
    $jobId = $uploadResponseObj->ResultSet->Result[0]->pageFeedItemUploadJob->jobId;;

    /*
     * getJobStatus
     */
    $pageFeedItemService->checkJobStatus($accountId, 'UPLOAD', array($jobId));

    /*
     * getReviewSummary
     */
    $getReviewSummaryRequest = $pageFeedItemService->createGetReviewSummaryRequest($accountId, array($feedFolderId));
    $pageFeedItemService->getReviewSummary($getReviewSummaryRequest);

    /*
     * get
     */
    $getRequest = $pageFeedItemService->createGetRequest($accountId, array($feedFolderId));
    $pageFeedItemService->get($getReviewSummaryRequest);

    /*
     * addDownloadJob
     */
    $addDownloadJobRequest = $pageFeedItemService->createAddDownloadJobRequest($accountId, array($feedFolderId));
    $addDownloadJobResponse = $pageFeedItemService->addDownloadJob($addDownloadJobRequest);
    foreach ($addDownloadJobResponse as $values) {
        $jobId = $values->job->jobId;
    }

    /*
     * getJobStatus
     */
    $pageFeedItemService->checkJobStatus($accountId, 'DOWNLOAD', array($jobId));

    /*
     * download
     */
    SoapUtils::download($downloadUrl, 'pageFeedItemDownloadSample.csv');

    //=================================================================
    // remove FeedFolderService
    //=================================================================
    if (count($feedFolderValues) > 0) {
        $feedFolderService->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
