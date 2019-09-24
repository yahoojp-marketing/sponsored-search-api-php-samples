<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\PageFeedItem;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\FeedFolder\FeedFolderServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderPlaceholderType;
use Jp\YahooApis\SS\V201909\PageFeedItem\{addDownloadJob,
    addDownloadJobResponse,
    get,
    getJobStatus,
    getJobStatusResponse,
    getResponse,
    getReviewSummary,
    getReviewSummaryResponse,
    getUploadUrl,
    getUploadUrlResponse,
    PageFeedItemDownloadJob,
    PageFeedItemDownloadJobOperation,
    PageFeedItemDownloadJobStatus,
    PageFeedItemJobStatusSelector,
    PageFeedItemJobType,
    PageFeedItemJobValues,
    PageFeedItemReviewSummarySelector,
    PageFeedItemSelector,
    PageFeedItemService,
    PageFeedItemUploadJobStatus,
    PageFeedItemUploadType,
    PageFeedItemUploadUrl,
    PageFeedItemUploadUrlOperation};

/**
 * example PageFeedItemService operation and Utility method collection.
 */
class PageFeedItemServiceSample
{

    const SERVICE_NAME = 'PageFeedItemService';

    /**
     * @var PageFeedItemService
     */
    private static $service = null;

    /**
     * FeedItemServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(PageFeedItemService::class);
    }

    /**
     * example get pageFeedItems.
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
     * example getUploadUrl pageFeedItems.
     *
     * @param getUploadUrl $request
     * @return getUploadUrlResponse
     * @throws Exception
     */
    public static function getUploadUrl(getUploadUrl $request): getUploadUrlResponse
    {
        self::init();

        // Call API
        $response = self::$service->getUploadUrl($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getUploadUrl.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getUploadUrl.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/getUploadUrl.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example getJobStatus pageFeedItems.
     *
     * @param getJobStatus $request
     * @return getJobStatusResponse
     * @throws Exception
     */
    public static function getJobStatus(getJobStatus $request): getJobStatusResponse
    {
        self::init();

        // Call API
        $response = self::$service->getJobStatus($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getJobStatus.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getJobStatus.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/getJobStatus.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example getReviewSummary pageFeedItems.
     *
     * @param getReviewSummary $request
     * @return getReviewSummaryResponse
     * @throws Exception
     */
    public static function getReviewSummary(getReviewSummary $request): getReviewSummaryResponse
    {
        self::init();

        // Call API
        $response = self::$service->getReviewSummary($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getReviewSummary.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getReviewSummary.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/getReviewSummary.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example addDownloadJob pageFeedItems.
     *
     * @param addDownloadJob $request
     * @return addDownloadJobResponse
     * @throws Exception
     */
    public static function addDownloadJob(addDownloadJob $request): addDownloadJobResponse
    {
        self::init();

        // Call API
        $response = self::$service->addDownloadJob($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/addDownloadJob.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/addDownloadJob.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/addDownloadJob.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example check pageFeedItem job status.
     *
     * @param PageFeedItemJobType $jobType
     * @param int[] $jobIds
     * @return void
     * @throws Exception
     */
    public static function checkStatus(string $jobType, array $jobIds): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for PageFeedItem $jobType Job *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetJobStatus(SoapUtils::getAccountId(), $jobType, $jobIds);
            $getResponse = self::getJobStatus($getRequest);

            // status check
            if ($jobType === PageFeedItemJobType::UPLOAD) {
                if (self::checkUploadJob($getResponse->getRval()->getValues())) {
                    return;
                }
            } elseif ($jobType === PageFeedItemJobType::DOWNLOAD) {
                if (self::checkDownloadJob($getResponse->getRval()->getValues())) {
                    return;
                }
            }
        }

        throw new Exception('Fail to getJobStatus PageFeedItemService.');
    }

    /**
     * @param PageFeedItemJobValues[] $feedItemJobValuesList
     * @return bool
     * @throws Exception
     */
    private static function checkUploadJob(array $feedItemJobValuesList): bool
    {
        $completedCount = 0;

        // upload job check.
        foreach ($feedItemJobValuesList as $feedItemJobValues) {

            if (!is_null($feedItemJobValues->getJob()->getUploadJobStatus())) {
                switch ($feedItemJobValues->getJob()->getUploadJobStatus()) {
                    default:
                    case PageFeedItemUploadJobStatus::COMPLETED_WITH_VALIDATION_ERROR:
                    case PageFeedItemUploadJobStatus::FILE_FORMAT_ERROR:
                    case PageFeedItemUploadJobStatus::FILE_ENCODING_ERROR:
                    case PageFeedItemUploadJobStatus::COLUMN_HEADER_ERROR:
                    case PageFeedItemUploadJobStatus::EXCEED_ROW_LINES:
                    case PageFeedItemUploadJobStatus::EXCEED_FILE_COUNTS:
                    case PageFeedItemUploadJobStatus::INVALID_FEED_FOLDER_ID:
                    case PageFeedItemUploadJobStatus::TIMEOUT:
                    case PageFeedItemUploadJobStatus::SYSTEM_ERROR:
                        throw new Exception('check upload Status failed.');
                    case PageFeedItemUploadJobStatus::IN_PROGRESS:
                        continue 1;
                    case PageFeedItemUploadJobStatus::COMPLETED:
                        $completedCount++;
                        continue 1;
                }
            } else {
                throw new Exception('Fail to getJobStatus PageFeedItemService.');
            }
        }

        if (count($feedItemJobValuesList) === $completedCount) {
            return true;
        }

        throw new Exception('Fail to getJobStatus PageFeedItemService.');
    }

    /**
     * @param PageFeedItemJobValues[] $feedItemJobValuesList
     * @return bool
     * @throws Exception
     */
    private static function checkDownloadJob(array $feedItemJobValuesList): bool
    {
        $completedCount = 0;

        // upload job check.
        foreach ($feedItemJobValuesList as $feedItemJobValues) {

            if (!is_null($feedItemJobValues->getJob()->getDownloadJobStatus())) {
                switch ($feedItemJobValues->getJob()->getDownloadJobStatus()) {
                    default:
                    case PageFeedItemDownloadJobStatus::FIELDS_ERROR:
                    case PageFeedItemDownloadJobStatus::TIMEOUT:
                    case PageFeedItemDownloadJobStatus::SYSTEM_ERROR:
                        throw new Exception('check download Status failed.');
                    case PageFeedItemDownloadJobStatus::IN_PROGRESS:
                        continue 1;
                    case PageFeedItemDownloadJobStatus::COMPLETED:
                        $completedCount++;
                        continue 1;
                }
            } else {
                throw new Exception('Fail to getJobStatus PageFeedItemService.');
            }
        }

        if (count($feedItemJobValuesList) === $completedCount) {
            return true;
        }

        throw new Exception('Fail to getJobStatus PageFeedItemService.');
    }

    /**
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        return FeedFolderServiceSample::create();
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        FeedFolderServiceSample::cleanup($valuesHolder);
    }

    /**
     * example PageFeedItemService operation.
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
            $feedFolderId = $valuesRepositoryFacade->getFeedFolderValuesRepository()->findFeedFolderId(FeedFolderPlaceholderType::DYNAMIC_AD_FOR_SEARCH_PAGE_FEEDS);

            $fileName = 'pageFeedItemUploadSample.csv';
            $jobId = null;
            $uploadUrl = null;
            $downloadUrl = null;

            //=================================================================
            // PageFeedItemService getUploadUrl
            //=================================================================
            // create request.
            $getUploadUrlRequest = self::buildExampleGetUploadUrl($accountId, $feedFolderId);

            // run
            $getUploadUrlResponse = self::getUploadUrl($getUploadUrlRequest);
            foreach ($getUploadUrlResponse->getRval()->getValues() as $feedItemUploadUrlValues) {
                $uploadUrl = $feedItemUploadUrlValues->getUploadUrl()->getUrl();
            }

            //=================================================================
            // PageFeedItemService upload
            //=================================================================
            // run
            $uploadResponse = SoapUtils::upload($uploadUrl, $fileName);
            if ($uploadResponse === false) {
                exit();
            }
            $uploadResponseObj = json_decode($uploadResponse);
            $jobId = $uploadResponseObj->ResultSet->Result[0]->pageFeedItemUploadJob->jobId;

            //=================================================================
            // PageFeedItemService getJobStatus
            //=================================================================
            // check job status
            self::checkStatus(PageFeedItemJobType::UPLOAD, [$jobId]);

            //=================================================================
            // PageFeedItemService getReviewSummary
            //=================================================================
            // create request.
            $getReviewSummaryRequest = self::buildExampleGetReviewSummary($accountId, [$feedFolderId]);

            // run
            self::getReviewSummary($getReviewSummaryRequest);

            //=================================================================
            // PageFeedItemService get
            //=================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$feedFolderId]);

            // run
            self::get($getRequest);

            //=================================================================
            // PageFeedItemService addDownloadJob
            //=================================================================
            // create request.
            $addDownloadJobRequest = self::buildExampleAddDownloadJob($accountId, [$feedFolderId]);

            // run
            $addDownloadJobResponse = self::addDownloadJob($addDownloadJobRequest);
            foreach ($addDownloadJobResponse->getRval()->getValues() as $downloadJobValues) {
                $jobId = $downloadJobValues->getJob()->getJobId();
            }

            //=================================================================
            // PageFeedItemService getJobStatus
            //=================================================================
            // check job status
            self::checkStatus(PageFeedItemJobType::DOWNLOAD, [$jobId]);

            // create request.
            $getJobStatusRequest = self::buildExampleGetJobStatus($accountId, PageFeedItemJobType::DOWNLOAD, [$jobId]);

            // run
            $getJobStatusResponse = self::getJobStatus($getJobStatusRequest);
            foreach ($getJobStatusResponse->getRval()->getValues() as $feedItemJobValues) {
                $downloadUrl = $feedItemJobValues->getJob()->getDownloadUrl();
            }

            //=================================================================
            // PageFeedItemService download (http request)
            //=================================================================
            SoapUtils::download($downloadUrl, 'pageFeedItemDownloadSample.csv');

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
     * @param int[] $feedFolderIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $feedFolderIds): get
    {
        $selector = new PageFeedItemSelector($accountId, $feedFolderIds);
        return new get($selector);
    }

    /**
     * example getUploadUrl request.
     *
     * @param int $accountId
     * @param int $feedFolderId
     * @return getUploadUrl
     */
    public static function buildExampleGetUploadUrl(int $accountId, int $feedFolderId): getUploadUrl
    {
        $operand = new PageFeedItemUploadUrl();
        $operand->setFeedFolderId($feedFolderId);
        $operand->setUploadType(PageFeedItemUploadType::NEW_OR_REPLACE);

        $operations = new PageFeedItemUploadUrlOperation();
        $operations->setAccountId($accountId);
        $operations->setOperand([$operand]);

        return new getUploadUrl($operations);
    }

    /**
     * example getJobStatus request.
     *
     * @param int $accountId
     * @param PageFeedItemJobType $jobType
     * @param int[] $jobIds
     * @return getJobStatus
     */
    public static function buildExampleGetJobStatus(int $accountId, string $jobType = PageFeedItemJobType::UPLOAD, array $jobIds): getJobStatus
    {
        $selector = new PageFeedItemJobStatusSelector($accountId, $jobType);
        if (!is_null($jobIds)) {
            $selector->setJobIds($jobIds);
        }
        return new getJobStatus($selector);
    }

    /**
     * example getReviewSummary request.
     *
     * @param int $accountId
     * @param int[] $feedFolderIds
     * @return getReviewSummary
     */
    public static function buildExampleGetReviewSummary(int $accountId, array $feedFolderIds): getReviewSummary
    {
        $selector = new PageFeedItemReviewSummarySelector($accountId);
        if (!is_null($feedFolderIds)) {
            $selector->setFeedFolderIds($feedFolderIds);
        }
        return new getReviewSummary($selector);
    }

    /**
     * example addDownloadJob request.
     *
     * @param int $accountId
     * @param int[] $feedFolderIds
     * @return addDownloadJob
     */
    public static function buildExampleAddDownloadJob(int $accountId, array $feedFolderIds): addDownloadJob
    {
        $operand = new PageFeedItemDownloadJob();

        if (!is_null($feedFolderIds)) {
            $operand->setFeedFolderIds($feedFolderIds);
        }

        $operations = new PageFeedItemDownloadJobOperation();
        $operations->setAccountId($accountId);
        $operations->setOperand([$operand]);
        return new addDownloadJob($operations);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    PageFeedItemServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
