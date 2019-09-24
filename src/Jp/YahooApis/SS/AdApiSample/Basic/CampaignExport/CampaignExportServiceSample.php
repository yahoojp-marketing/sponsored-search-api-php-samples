<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignExport;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201909\CampaignExport\addJob;
use Jp\YahooApis\SS\V201909\CampaignExport\addJobResponse;
use Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportService;
use Jp\YahooApis\SS\V201909\CampaignExport\Encoding;
use Jp\YahooApis\SS\V201909\CampaignExport\EntityType;
use Jp\YahooApis\SS\V201909\CampaignExport\ExportSetting;
use Jp\YahooApis\SS\V201909\CampaignExport\get;
use Jp\YahooApis\SS\V201909\CampaignExport\getExportFields;
use Jp\YahooApis\SS\V201909\CampaignExport\getExportFieldsResponse;
use Jp\YahooApis\SS\V201909\CampaignExport\getResponse;
use Jp\YahooApis\SS\V201909\CampaignExport\JobSelector;
use Jp\YahooApis\SS\V201909\CampaignExport\JobStatus;
use Jp\YahooApis\SS\V201909\CampaignExport\Lang;
use Jp\YahooApis\SS\V201909\CampaignExport\Output;

/**
 * example CampaignExportService operation and Utility method collection.
 */
class CampaignExportSample
{

    const SERVICE_NAME = 'CampaignExportService';

    /**
     * @var CampaignExportService
     */
    private static $service = null;

    /**
     * CampaignExportSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignExportService::class);
    }

    /**
     * example get CampaignExport.
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
     * example get CampaignExport.
     *
     * @return getExportFieldsResponse
     * @throws Exception
     */
    public static function getExportFields(): getExportFieldsResponse
    {
        self::init();

        // Call API
        $response = self::$service->getExportFields(new getExportFields());

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/getExportFields.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getFields())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/getExportFields.' . PHP_EOL);
        }

        return $response;
    }

    /**
     * example addJob CampaignExport.
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
     * example check CampaignExport job status.
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
            print PHP_EOL . "***** sleep 30 seconds for CampaignExport Job Status Check *****" . PHP_EOL;
            sleep(30);

            // get
            $getRequest = self::buildExampleGetRequest(SoapUtils::getAccountId(), $jobIds);
            $getResponse = self::get($getRequest);

            $completedCount = 0;

            // check status
            foreach ($getResponse->getRval()->getValues() as $campaignExportValues) {
                if (!is_null($campaignExportValues->getJob()->getStatus())) {
                    switch ($campaignExportValues->getJob()->getStatus()) {
                        default:
                        case JobStatus::IN_PROGRESS:
                            continue 1;
                        case JobStatus::TIMEOUT:
                        case JobStatus::SYSTEM_ERROR:
                            throw new Exception('CampaignExport Job Status failed.');
                        case JobStatus::COMPLETED:
                            $completedCount++;
                            continue 1;
                    }
                } else {
                    throw new Exception('Fail to get CampaignExport.');
                }
            }

            if (count($getResponse->getRval()->getValues()) === $completedCount) {
                return;
            }
        }

        throw new Exception('Fail to get CampaignExport.');
    }

    /**
     * example CampaignExportService operation.
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
            // CampaignExportService getExportFields
            // =================================================================
            // run
            $ExportFieldsResponse = self::getExportFields();

            $exportFields = [];
            foreach ($ExportFieldsResponse->getRval()->getFields() as $campaignExportFieldAttribute) {
                $exportFields[] = $campaignExportFieldAttribute->getFieldName();
            }

            // =================================================================
            // CampaignExportService addJob
            // =================================================================
            // create request.
            $addRequest = self::buildExampleAddJobRequest(self::createExportSetting($accountId, $exportFields));

            // run
            $addResponse = self::addJob($addRequest);

            $jobId = null;
            foreach ($addResponse->getRval()->getValues() as $campaignExportValues) {
                $jobId = $campaignExportValues->getJob()->getJobId();
            }

            // =================================================================
            // CampaignExportService GET
            // =================================================================
            // check job status
            self::checkStatus([$jobId]);

            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, [$jobId]);

            // run
            $getResponse = self::get($getRequest);

            $downloadUrl = null;
            foreach ($getResponse->getRval()->getValues() as $campaignExportValues) {
                $downloadUrl = $campaignExportValues->getJob()->getDownloadUrl();
            }

            // =================================================================
            // CampaignExportService download (http request)
            // =================================================================
            SoapUtils::download($downloadUrl, 'campaignExportDownloadSample.csv');

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
        $selector = new JobSelector();
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
     * @param ExportSetting[] $exportSettings
     * @return addJob
     */
    public static function buildExampleAddJobRequest(ExportSetting $exportSettings): addJob
    {
        return new addJob($exportSettings);
    }

    /**
     * example ExportSetting request.
     *
     * @param int $accountId
     * @param string[] $exportFields
     * @return ExportSetting
     */
    public static function createExportSetting(int $accountId, array $exportFields): ExportSetting
    {
        $exportSetting = new ExportSetting();
        $exportSetting->setAccountId($accountId);
        $exportSetting->setJobName('sampleExport');
        $exportSetting->setLang(Lang::EN);
        $exportSetting->setOutput(Output::CSV);
        $exportSetting->setEncoding(Encoding::UTF8);

        $exportSetting->setEntityTypes(
            [
                EntityType::CAMPAIGN,
                EntityType::BIDDABLE_AD_GROUP_CRITERION,
            ]
        );

        $exportSetting->setExportFields($exportFields);

        return $exportSetting;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignExportSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
