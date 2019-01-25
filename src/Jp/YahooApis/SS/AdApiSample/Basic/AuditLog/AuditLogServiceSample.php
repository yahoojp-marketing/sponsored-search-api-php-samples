<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AuditLog;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201901\AuditLog\{addJob,
    addJobResponse,
    AuditLogEncoding,
    AuditLogEventType,
    AuditLogJob,
    AuditLogJobStatus,
    AuditLogLang,
    AuditLogOperation,
    AuditLogOutput,
    AuditLogSelector,
    AuditLogService,
    DateRange,
    EventSelector,
    get,
    getResponse};

/**
 * example AuditLogService operation and Utility method collection.
 */
class AuditLogServiceSample
{

    const SERVICE_NAME = 'AuditLogService';

    /**
     * @var AuditLogService
     */
    private static $service = null;

    /**
     * AuditLogServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AuditLogService::class);
    }

    /**
     * example get AuditLog.
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
     * example addJob AuditLog.
     *
     * @param addJob $request
     * @return addJobResponse
     * @throws Exception
     */
    public static function addJob(addJob $request): addJobResponse
    {
        self::init();

        // Call API
        $response = self::$service->addJob($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/addJob.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/addJob.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/addJob.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example check AuditLog job status.
     *
     * @param int[] $jobIds
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $jobIds): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for AuditLog Job Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $jobIds);
            $getResponse = self::get($getRequest);

            $completedCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $auditLogValues) {
                if (!is_null($auditLogValues->getJob()->getJobStatus())) {
                    switch ($auditLogValues->getJob()->getJobStatus()) {
                        default:
                        case AuditLogJobStatus::IN_PROGRESS:
                            continue 1;
                        case AuditLogJobStatus::TIMEOUT:
                        case AuditLogJobStatus::SYSTEM_ERROR:
                            throw new Exception('AuditLog Job Status failed.');
                        case AuditLogJobStatus::COMPLETED:
                            $completedCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get AuditLog.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $completedCount) {
                return;
            }
        }

        throw new Exception('Fail to get AuditLog.');
    }

    /**
     * example AuditLogService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // AuditLogService addJob
            // =================================================================
            // create request.
            $addRequest = self::buildExampleAddJobRequest($accountId, [self::createAuditLogJob()]);

            // run
            $addResponse = self::addJob($addRequest);

            $jobId = null;
            foreach ($addResponse->getRval()->getValues() as $auditLogValues) {
                $jobId = $auditLogValues->getJob()->getJobId();
            }

            // =================================================================
            // AuditLogService GET
            // =================================================================
            // check job status
            self::checkStatus([$jobId]);

            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$jobId]);

            // run
            $getResponse = self::get($getRequest);

            $downloadUrl = null;
            foreach ($getResponse->getRval()->getValues() as $auditLogValues) {
                $downloadUrl = $auditLogValues->getJob()->getDownloadUrl();
            }

            // =================================================================
            // AuditLogService download (http request)
            // =================================================================
            SoapUtils::download($downloadUrl, 'auditLogDownloadSample.csv');

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $jobIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $jobIds): get
    {
        $selector = new AuditLogSelector();
        $selector->setAccountId($accountId);

        if (!is_null($jobIds)) {
            $selector->setJobIds($jobIds);
        }

        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param int $accountId
     * @param AuditLogJob[] $operand
     * @return addJob
     */
    public static function buildExampleAddJobRequest(int $accountId, array $operand): addJob
    {
        $operation = new AuditLogOperation();
        $operation->setAccountId($accountId);
        $operation->setOperand($operand);
        return new addJob($operation);
    }

    /**
     * example AuditLogJob request.
     *
     * @param int $accountId
     * @param string[] $exportFields
     * @return AuditLogJob
     */
    public static function createAuditLogJob(): AuditLogJob
    {
        $operand = new AuditLogJob();
        $operand->setJobName('sampleAuditLog');
        $operand->setLang(AuditLogLang::EN);
        $operand->setOutput(AuditLogOutput::CSV);
        $operand->setEncoding(AuditLogEncoding::UTF_8);

        $eventSelector = new EventSelector();
        $eventSelector->setEntityType('ALL');
        $eventSelector->setEventTypes([AuditLogEventType::ALL]);
        $operand->setEventSelector([$eventSelector]);

        $dateRange = new DateRange();
        $dateRange->setStartDate('20190101000000');
        $dateRange->setEndDate('20201231000000');
        $operand->setDateRange($dateRange);

        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AuditLogServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
