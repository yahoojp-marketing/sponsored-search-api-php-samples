<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupAdLabel;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroupAd\AdGroupAdServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\Label\LabelServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupAd\AdType;
use Jp\YahooApis\SS\V201901\AdGroupAdLabel\{AdGroupAdLabel, AdGroupAdLabelOperation, AdGroupAdLabelService, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;

/**
 * example AdGroupAdLabelService operation and Utility method collection.
 */
class AdGroupAdLabelServiceSample
{

    const SERVICE_NAME = 'AdGroupAdLabelService';

    /**
     * @var AdGroupAdLabelService
     */
    private static $service = null;

    /**
     * AdGroupAdLabelServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupAdLabelService::class);
    }

    /**
     * example mutate adGroupAd labels.
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
     * check & create upper service object.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    private static function setup(): ValuesHolder
    {
        $adGroupAdValuesHolder = AdGroupAdServiceSample::create();
        $labelValuesHolder = LabelServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($adGroupAdValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($adGroupAdValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($adGroupAdValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($adGroupAdValuesHolder->getAdGroupValuesList());
        $selfValuesHolder->setAdGroupAdValuesList($adGroupAdValuesHolder->getAdGroupAdValuesList());
        $selfValuesHolder->setLabelValuesList($labelValuesHolder->getLabelValuesList());
        return $selfValuesHolder;
    }

    /**
     * cleanup service object.
     *
     * @param ValuesHolder $valuesHolder
     * @throws Exception
     */
    public static function cleanup(ValuesHolder $valuesHolder): void
    {
        LabelServiceSample::cleanup($valuesHolder);
        AdGroupAdServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupAdLabelService operation.
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
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);
            $adId = $valuesRepositoryFacade->getAdGroupAdValuesRepository()->findAdId($campaignId, $adGroupId, AdType::EXTENDED_TEXT_AD);
            $labelId = $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds()[0];

            // =================================================================
            // AdGroupAdLabelService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [self::createAdGroupAdLabel($campaignId, $adGroupId, $adId, $labelId)]
            );

            // run
            self::mutate($addRequest);

            // =================================================================
            // AdGroupAdLabelService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                [self::createAdGroupAdLabel($campaignId, $adGroupId, $adId, $labelId)]
            );

            // run
            self::mutate($removeRequest);

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
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupAdLabel[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupAdLabelOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example adGroupAd label request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $adId
     * @param int $labelId
     * @return AdGroupAdLabel
     */
    public static function createAdGroupAdLabel(int $campaignId, int $adGroupId, int $adId, int $labelId): AdGroupAdLabel
    {
        $operand = new AdGroupAdLabel();
        $operand->setCampaignId($campaignId);
        $operand->setAdGroupId($adGroupId);
        $operand->setAdId($adId);
        $operand->setLabelId($labelId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupAdLabelServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
