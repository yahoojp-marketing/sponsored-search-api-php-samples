<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\KeywordEstimator;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201909\KeywordEstimator\adGroupEstimateRequest;
use Jp\YahooApis\SS\V201909\KeywordEstimator\CampaignEstimateRequest;
use Jp\YahooApis\SS\V201909\KeywordEstimator\EstimateKeyword;
use Jp\YahooApis\SS\V201909\KeywordEstimator\get;
use Jp\YahooApis\SS\V201909\KeywordEstimator\getResponse;
use Jp\YahooApis\SS\V201909\KeywordEstimator\IsNegativeBool;
use Jp\YahooApis\SS\V201909\KeywordEstimator\keywordEstimateRequest;
use Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimatorSelector;
use Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimatorService;
use Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordMatchType;

/**
 * example KeywordEstimatorService operation and Utility method collection.
 */
class KeywordEstimatorServiceSample
{

    const SERVICE_NAME = 'KeywordEstimatorService';

    /**
     * @var KeywordEstimatorService
     */
    private static $service = null;

    /**
     * KeywordEstimatorServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(KeywordEstimatorService::class);
    }

    /**
     * example get keywordEstimator.
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
     * example KeywordEstimatorService operation.
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
            // KeywordEstimatorService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId);

            // run
            self::get($getRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @param int $accountId
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId): get
    {
        $estimateKeyword1 = new EstimateKeyword('sample1', KeywordMatchType::EXACT);
        $keywordEstimateRequest1 = new keywordEstimateRequest($estimateKeyword1);
        $keywordEstimateRequest1->setMaxCpc(100);
        $keywordEstimateRequest1->setIsNegative(IsNegativeBool::FALSE);
        $adGroupEstimateRequest1 = new adGroupEstimateRequest([$keywordEstimateRequest1]);
        $adGroupEstimateRequest1->setMaxCpc(500);

        $estimateKeyword2 = new EstimateKeyword('sample2', KeywordMatchType::PHRASE);
        $keywordEstimateRequest2 = new keywordEstimateRequest($estimateKeyword2);
        $keywordEstimateRequest2->setMaxCpc(150);
        $keywordEstimateRequest2->setIsNegative(IsNegativeBool::FALSE);
        $adGroupEstimateRequest2 = new adGroupEstimateRequest([$keywordEstimateRequest2]);
        $adGroupEstimateRequest2->setMaxCpc(300);

        $campaignEstimateRequest = new CampaignEstimateRequest([$adGroupEstimateRequest1, $adGroupEstimateRequest2]);
        $selector = new KeywordEstimatorSelector($accountId, $campaignEstimateRequest);
        return new get($selector);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    KeywordEstimatorServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
