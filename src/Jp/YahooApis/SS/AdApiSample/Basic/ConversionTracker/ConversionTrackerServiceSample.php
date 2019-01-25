<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\ConversionTracker;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201901\ConversionTracker\{AppConversion,
    AppConversionType,
    AppPlatform,
    AppPostbackUrl,
    AppPostbackUrlClearFlag,
    ConversionCountingType,
    ConversionTracker,
    ConversionTrackerCategory,
    ConversionTrackerOperation,
    ConversionTrackerSelector,
    ConversionTrackerService,
    ConversionTrackerStatus,
    ConversionTrackerType,
    ExcludeFromBidding,
    get,
    getResponse,
    MarkupLanguage,
    mutate,
    mutateResponse,
    Operator,
    TrackingCodeType,
    WebConversion};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example ConversionTrackerService operation and Utility method collection.
 */
class ConversionTrackerServiceSample
{

    const SERVICE_NAME = 'ConversionTrackerService';

    /**
     * @var ConversionTrackerService
     */
    private static $service = null;

    /**
     * ConversionTrackerServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(ConversionTrackerService::class);
    }

    /**
     * example get conversions.
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
     * example mutate conversions.
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
                    if ($values->getError()[0]->getCode() != '210804') {
                        throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
                    }
                }
            }
        }

        return $response;
    }

    /**
     * example CampaignService operation.
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
            // ConversionTrackerService ADD
            // =================================================================
            // create request.
            $appPostbackUrl = new AppPostbackUrl();
            $appPostbackUrl->setUrl('http://yahoo.co.jp?advertising_id={adid}&lat={lat}');
            $addRequest = self::buildExampleMutateRequest(
                Operator::ADD, $accountId, [
                    self::createWebConversionRequest(),
                    self::createAppConversionRequest(ConversionCountingType::ONE_PER_CLICK, ConversionTrackerCategory::DOWNLOAD, AppConversionType::DOWNLOAD),
                ]
            );

            // run
            $addResponse = self::mutate($addRequest);

            $conversionTrackers = [];
            $conversionTrackerIds = [];
            foreach ($addResponse->getRval()->getValues() as $conversionTrackerValues) {
                $conversionTrackers[] = $conversionTrackerValues->getConversionTracker();
                $conversionTrackerIds[] = $conversionTrackerValues->getConversionTracker()->getConversionTrackerId();
            }

            // =================================================================
            // ConversionTrackerService::get
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $conversionTrackerIds);

            // run
            self::get($getRequest);

            //waiting
            sleep(180);

            // =================================================================
            // ConversionTrackerService::mutate(SET)
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(
                Operator::SET, $accountId, self::createExampleSetRequest($conversionTrackers)
            );

            // run
            self::mutate($setRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @param int[] $conversionTrackerIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $conversionTrackerIds): get
    {
        $selector = new ConversionTrackerSelector($accountId);

        if (!is_null($conversionTrackerIds)) {
            $selector->setConversionTrackerIds($conversionTrackerIds);
        }

        $selector->setConversionTrackerTypes([
            ConversionTrackerType::WEB_CONVERSION,
            ConversionTrackerType::APP_CONVERSION,
        ]);

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param ConversionTracker[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new ConversionTrackerOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example WebConversion request.
     *
     * @return WebConversion
     */
    public static function createWebConversionRequest(): WebConversion
    {
        $operand = new WebConversion();
        $operand->setConversionTrackerName('SampleWebConversionTracker_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $operand->setStatus(ConversionTrackerStatus::ENABLED);
        $operand->setCategory(ConversionTrackerCategory::aDEFAULT);
        $operand->setConversionTrackerType(ConversionTrackerType::WEB_CONVERSION);
        $operand->setUserRevenueValue(100);
        $operand->setCountingType(ConversionCountingType::MANY_PER_CLICK);
        $operand->setExcludeFromBidding(ExcludeFromBidding::TRUE);
        $operand->setMeasurementPeriod(90);

        $operand->setMarkupLanguage(MarkupLanguage::HTML);
        $operand->setTrackingCodeType(TrackingCodeType::CLICK_TO_CALL);

        return $operand;
    }

    /**
     * example AppConversion request.
     *
     * @param ConversionCountingType $countingType
     * @param ConversionTrackerCategory $category
     * @param AppConversionType $appConversionType
     * @param AppPostbackUrl|null $appPostbackUrl
     * @return AppConversion
     */
    public static function createAppConversionRequest(string $countingType, string $category, string $appConversionType, AppPostbackUrl $appPostbackUrl = null): AppConversion
    {
        $operand = new AppConversion();
        $operand->setConversionTrackerName('SampleAppConversionTracker_' . $category . '_' . $appConversionType . '_CreateOn_' . SoapUtils::getCurrentTimestamp());
        $operand->setStatus(ConversionTrackerStatus::ENABLED);
        $operand->setCategory($category);
        $operand->setConversionTrackerType(ConversionTrackerType::APP_CONVERSION);
        $operand->setUserRevenueValue(100);
        $operand->setCountingType($countingType);
        $operand->setExcludeFromBidding(ExcludeFromBidding::TRUE);
        $operand->setMeasurementPeriod(90);

        $operand->setAppId('sample123_' . SoapUtils::getCurrentTimestamp());
        $operand->setAppPlatform(AppPlatform::ANDROID_MARKET);
        $operand->setAppConversionType($appConversionType);

        if (!is_null($appConversionType)) {
            $operand->setAppPostbackUrl($appConversionType);
        }

        return $operand;
    }

    /**
     * example conversionTracker set request.
     *
     * @param ConversionTracker[] $conversionTrackers
     * @return array entity.
     */
    public static function createExampleSetRequest(array $conversionTrackers): array
    {
        // create operands
        $operands = [];

        foreach ($conversionTrackers as $conversionTracker) {
            switch ($conversionTracker->getConversionTrackerType()) {
                default :
                case ConversionTrackerType::WEB_CONVERSION:
                    $operand = new WebConversion();
                    $operand->setConversionTrackerId($conversionTracker->getConversionTrackerId());
                    $operand->setConversionTrackerType($conversionTracker->getConversionTrackerType());
                    $operand->setConversionTrackerName('SampleWebConversionTracker_UpdateOn_' . $conversionTracker->getConversionTrackerId() . '_' . SoapUtils::getCurrentTimestamp());
                    $operand->setStatus(ConversionTrackerStatus::DISABLED);
                    break;

                case ConversionTrackerType::APP_CONVERSION:
                    $operand = new AppConversion();
                    $operand->setConversionTrackerId($conversionTracker->getConversionTrackerId());
                    $operand->setConversionTrackerType($conversionTracker->getConversionTrackerType());
                    $operand->setConversionTrackerName(
                        'SampleAppConversionTracker_' .
                        $operand->getCategory() . '_' . $conversionTracker->getAppConversionType() .
                        $conversionTracker->getConversionTrackerId() . '_UpdateOn_' . SoapUtils::getCurrentTimestamp()
                    );
                    $operand->setStatus(ConversionTrackerStatus::DISABLED);

                    switch ($conversionTracker->getAppConversionType()) {
                        default :
                        case AppConversionType::DOWNLOAD:
                            break;

                        case AppConversionType::FIRST_OPEN:
                            $appPostbackUrl = new AppPostbackUrl();
                            $appPostbackUrl->setClearFlag(AppPostbackUrlClearFlag::TRUE);
                            $operand->setAppPostbackUrl($appPostbackUrl);
                            break;

                        case AppConversionType::IN_APP_PURCHASE:
                            $operand->setCategory(ConversionTrackerCategory::PURCHASE);
                            $operand->setUserRevenueValue(300);
                            break;
                    }
                    break;
            }

            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    ConversionTrackerServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
