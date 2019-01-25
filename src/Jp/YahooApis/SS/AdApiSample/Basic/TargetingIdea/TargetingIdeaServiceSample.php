<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\TargetingIdea;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\V201901\Paging;
use Jp\YahooApis\SS\V201901\TargetingIdea\CriterionType;
use Jp\YahooApis\SS\V201901\TargetingIdea\get;
use Jp\YahooApis\SS\V201901\TargetingIdea\getResponse;
use Jp\YahooApis\SS\V201901\TargetingIdea\KeywordMatchType;
use Jp\YahooApis\SS\V201901\TargetingIdea\ProposalKeyword;
use Jp\YahooApis\SS\V201901\TargetingIdea\RelatedToKeywordSearchParameter;
use Jp\YahooApis\SS\V201901\TargetingIdea\RelatedToUrlSearchParameter;
use Jp\YahooApis\SS\V201901\TargetingIdea\SearchParameterUse;
use Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaSelector;
use Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaService;

/**
 * example KeywordEstimatorService operation and Utility method collection.
 */
class TargetingIdeaServiceSample
{

    const SERVICE_NAME = 'TargetingIdeaService';

    /**
     * @var TargetingIdeaService
     */
    private static $service = null;

    /**
     * TargetingIdeaServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(TargetingIdeaService::class);
    }

    /**
     * example get targetingIdea.
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
        }

        return $response;
    }

    /**
     * example TargetingIdeaService operation.
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
            // TargetingIdeaService GET
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
        $proposalKeyword = new ProposalKeyword();
        $proposalKeyword->setType(CriterionType::KEYWORD);
        $proposalKeyword->setText('sample1');
        $proposalKeyword->setMatchType(KeywordMatchType::PHRASE);
        $relatedToKeywordSearchParameter = new RelatedToKeywordSearchParameter(
            SearchParameterUse::RELATED_TO_KEYWORD, [$proposalKeyword]
        );

        $relatedToUrlSearchParameter = new RelatedToUrlSearchParameter(
            SearchParameterUse::RELATED_TO_URL, 'http://yahoo.co.jp'
        );

        $selector = new TargetingIdeaSelector($accountId, [
            $relatedToKeywordSearchParameter,
            $relatedToUrlSearchParameter
        ]);

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    TargetingIdeaServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
