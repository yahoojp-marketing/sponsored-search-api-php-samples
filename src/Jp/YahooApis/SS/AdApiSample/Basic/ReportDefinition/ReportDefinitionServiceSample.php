<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\ReportDefinition;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Label\Operator;
use Jp\YahooApis\SS\V201901\Paging;
use Jp\YahooApis\SS\V201901\ReportDefinition\{get,
    getReportFields,
    getReportFieldsResponse,
    getResponse,
    mutate,
    mutateResponse,
    ReportCompressType,
    ReportDateRangeType,
    ReportDefinition,
    ReportDefinitionOperation,
    ReportDefinitionSelector,
    ReportDefinitionService,
    ReportDownloadEncode,
    ReportDownloadFormat,
    ReportIncludeDeleted,
    ReportIncludeZeroImpressions,
    ReportIntervalType,
    ReportIsTemplate,
    ReportLanguage,
    ReportSortField,
    ReportSortType,
    ReportType};

/**
 * example ReportDefinitionService operation and Utility method collection.
 */
class ReportDefinitionServiceSample
{

    const SERVICE_NAME = 'ReportDefinitionService';

    /**
     * example report fields.
     */
    const CAMPAIGN_REPORT_FIELDS = [
        "CAMPAIGN_ID",
        "CAMPAIGN_NAME",
        "CAMPAIGN_DISTRIBUTION_SETTINGS",
        "CAMPAIGN_DISTRIBUTION_STATUS",
        "DAILY_SPENDING_LIMIT",
        "CAMPAIGN_START_DATE",
        "CAMPAIGN_END_DATE",
        "TRACKING_URL",
        "CUSTOM_PARAMETERS",
        "CAMPAIGN_TRACKING_ID",
        "CONVERSIONS",
        "CONV_VALUE",
        "VALUE_PER_CONV",
        "CAMPAIGN_MOBILE_BID_MODIFIER",
        "NETWORK",
        "CLICK_TYPE",
        "DEVICE",
        "DAY",
        "DAY_OF_WEEK",
        "QUARTER",
        "YEAR",
        "MONTH",
        "MONTH_OF_YEAR",
        "WEEK",
        "HOUR_OF_DAY",
        "OBJECT_OF_CONVERSION_TRACKING",
        "CONVERSION_NAME",
        "CAMPAIGN_TYPE",
    ];

    /**
     * @var ReportDefinitionService
     */
    private static $service = null;

    /**
     * ReportDefinitionServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(ReportDefinitionService::class);
    }

    /**
     * example get ReportDefinitions.
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
     * example getReportFields ReportDefinitions.
     *
     * @param getReportFields $request
     * @return getReportFieldsResponse
     * @throws Exception
     */
    public static function getReportFields(getReportFields $request): getReportFieldsResponse
    {
        self::init();

        // Call API
        $response = self::$service->getReportFields($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getFields())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        }

        return $response;
    }

    /**
     * example mutate ReportDefinitions.
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
     * create basic FeedFolder.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();
        $accountId = SoapUtils::getAccountId();
        $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createExampleReportDefinition($accountId)]);
        $addResponse = self::mutate($addRequest);
        $valuesHolder->setReportDefinitionValuesList($addResponse->getRval()->getValues());
        return $valuesHolder;
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        if (count($valuesHolder->getReportDefinitionValuesList()) === 0) {
            return;
        }
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        self::mutate(
            self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                $valuesRepositoryFacade->getReportDefinitionValuesRepository()->getReportDefinitions()
            )
        );
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
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        $accountId = SoapUtils::getAccountId();

        try {

            // =================================================================
            // ReportDefinitionService getReportFields
            // =================================================================
            // create request.
            $getReportFieldsRequest = self::buildGetReportFieldsRequest(ReportType::CAMPAIGN);

            // run
            self::getReportFields($getReportFieldsRequest);

            // =================================================================
            // ReportDefinitionService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createExampleReportDefinition($accountId)]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesHolder->setReportDefinitionValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // ReportDefinitionService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getReportDefinitionValuesRepository()->getReportIds());

            // run
            self::get($getRequest);

            // =================================================================
            // ReportDefinitionService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getReportDefinitionValuesRepository()->getReportDefinitions()
            );

            // run
            self::mutate($removeRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $reportIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $reportIds): get
    {
        $selector = new ReportDefinitionSelector($accountId);

        if (!is_null($reportIds)) {
            $selector->setReportIds($reportIds);
        }

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example getReportFields request.
     *
     * @param ReportType $reportType
     * @return getReportFields
     */
    public static function buildGetReportFieldsRequest(string $reportType): getReportFields
    {
        return new getReportFields($reportType);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param ReportDefinition[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new ReportDefinitionOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example ReportDefinition request.
     *
     * @param int $accountId
     * @return ReportDefinition
     */
    public static function createExampleReportDefinition(int $accountId): ReportDefinition
    {
        $operand = new ReportDefinition();
        $operand->setAccountId($accountId);
        $operand->setReportName('sampleReport');
        $operand->setReportType(ReportType::CAMPAIGN);
        $operand->setDateRangeType(ReportDateRangeType::YESTERDAY);
        $operand->setFields(self::CAMPAIGN_REPORT_FIELDS);

        $reportSortField = new ReportSortField();
        $reportSortField->setType(ReportSortType::ASC);
        $reportSortField->setField(self::CAMPAIGN_REPORT_FIELDS[0]);
        $operand->setSortFields($reportSortField);

        $operand->setIsTemplate(ReportIsTemplate::TRUE);
        $operand->setIntervalType(ReportIntervalType::ONETIME);
        $operand->setFormat(ReportDownloadFormat::CSV);
        $operand->setEncode(ReportDownloadEncode::UTF8);
        $operand->setLanguage(ReportLanguage::EN);
        $operand->setCompress(ReportCompressType::NONE);
        $operand->setIncludeZeroImpressions(ReportIncludeZeroImpressions::TRUE);
        $operand->setIncludeDeleted(ReportIncludeDeleted::TRUE);

        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    ReportDefinitionServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage();
}
