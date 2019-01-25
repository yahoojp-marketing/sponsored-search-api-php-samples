<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Report;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\ReportDefinition\ReportDefinitionServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Paging;
use Jp\YahooApis\SS\V201901\Report\{get, getResponse, mutate, mutateResponse, Operator, ReportJobStatus, ReportOperation, ReportRecord, ReportSelector, ReportService};

/**
 * example ReportDefinitionService operation and Utility method collection.
 */
class ReportServiceSample
{

    const SERVICE_NAME = 'ReportService';

    /**
     * @var ReportService
     */
    private static $service = null;

    /**
     * ReportServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(ReportService::class);
    }

    /**
     * example get Reports.
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
     * example mutate Reports.
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
     * example check Report job status.
     *
     * @param int[] $reportIds
     * @param int[] $jobIds
     * @return void
     * @throws Exception
     */
    public static function checkStatus(array $reportIds ,array $jobIds): void
    {

        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {

            // sleep 30 second.
            print PHP_EOL . "***** sleep 30 seconds for Report Job Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $reportIds, $jobIds);
            $getResponse = self::get($getRequest);

            $completedCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $reportValues) {
                if (!is_null($reportValues->getReportRecord()->getReportJobStatus())) {
                    switch ($reportValues->getReportRecord()->getReportJobStatus()) {
                        default:
                        case ReportJobStatus::WAIT:
                        case ReportJobStatus::IN_PROGRESS:
                            continue 1;
                        case ReportJobStatus::FAILED:
                            throw new Exception('Report Job Status failed.');
                        case ReportJobStatus::COMPLETED:
                            $completedCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get Report.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $completedCount) {
                return;
            }
        }

        throw new Exception('Fail to get Report.');
    }

    /**
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        return ReportDefinitionServiceSample::create();
    }

    /**
     * example ReportDefinitionService operation.
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
            $reportId = $valuesRepositoryFacade->getReportDefinitionValuesRepository()->getReportIds()[0];

            // =================================================================
            // ReportService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createReportRecord($reportId)]);

            // run
            $addResponse = self::mutate($addRequest);

            $reportRecords = [];
            $jobIds = [];
            foreach ($addResponse->getRval()->getValues() as $reportValues) {
                $reportRecords[] = $reportValues->getReportRecord();
                $jobIds[] = $reportValues->getReportRecord()->getReportJobId();
            }

            // =================================================================
            // ReportService GET
            // =================================================================
            // check job status
            self::checkStatus([$reportId], $jobIds);

            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$reportId], $jobIds);

            // run
            $getResponse = self::get($getRequest);

            $downloadUrl = null;
            foreach ($getResponse->getRval()->getValues() as $reportValues) {
                $downloadUrl = $reportValues->getReportRecord()->getReportDownloadURL();
            }

            // =================================================================
            // ReportService download (http request)
            // =================================================================
            SoapUtils::download($downloadUrl, 'reportDownloadSample.csv');

            // =================================================================
            // ReportService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId, $reportRecords);

            // run
            self::mutate($removeRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            ReportDefinitionServiceSample::cleanup($valuesHolder);
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $reportIds
     * @param int[] $reportJobIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $reportIds, array $reportJobIds): get
    {
        $selector = new ReportSelector($accountId);

        if (!is_null($reportIds)) {
            $selector->setReportIds($reportIds);
        }
        if (!is_null($reportJobIds)) {
            $selector->setReportJobIds($reportJobIds);
        }

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param ReportRecord[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new ReportOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example ReportRecord request.
     *
     * @param int $reportId
     * @return ReportRecord
     */
    public static function createReportRecord(int $reportId):ReportRecord
    {
        $operand = new ReportRecord();
        $operand->setReportId($reportId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    ReportServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
