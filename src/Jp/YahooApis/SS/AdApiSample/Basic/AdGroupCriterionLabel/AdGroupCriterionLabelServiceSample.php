<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupCriterionLabel;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroupCriterion\AdGroupCriterionServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\Label\LabelServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterionUse;
use Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\{AdGroupCriterionLabel, AdGroupCriterionLabelOperation, AdGroupCriterionLabelService, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201909\Campaign\CampaignType;

/**
 * example AdGroupCriterionLabelService operation and Utility method collection.
 */
class AdGroupCriterionLabelServiceSample
{

    const SERVICE_NAME = 'AdGroupCriterionLabelService';

    /**
     * @var AdGroupCriterionLabelService
     */
    private static $service = null;

    /**
     * AdGroupCriterionLabelServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupCriterionLabelService::class);
    }

    /**
     * example mutate adGroupCriterion labels.
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
        $adGroupCriterionValuesHolder = AdGroupCriterionServiceSample::create();
        $labelValuesHolder = LabelServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setBiddingStrategyValuesList($adGroupCriterionValuesHolder->getBiddingStrategyValuesList());
        $selfValuesHolder->setFeedFolderValuesList($adGroupCriterionValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($adGroupCriterionValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($adGroupCriterionValuesHolder->getAdGroupValuesList());
        $selfValuesHolder->setAdGroupAdValuesList($adGroupCriterionValuesHolder->getAdGroupAdValuesList());
        $selfValuesHolder->setAdGroupCriterionValuesList($adGroupCriterionValuesHolder->getAdGroupCriterionValuesList());
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
        AdGroupCriterionServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupCriterionLabelService operation.
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
            $criterionId = $valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->findCriterionId($campaignId, $adGroupId, AdGroupCriterionUse::BIDDABLE);
            $labelId = $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds()[0];

            // =================================================================
            // AdGroupCriterionLabelService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [self::createAdGroupCriterionLabel($campaignId, $adGroupId, $criterionId, $labelId)]
            );

            // run
            self::mutate($addRequest);

            // =================================================================
            // AdGroupCriterionLabelService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                [self::createAdGroupCriterionLabel($campaignId, $adGroupId, $criterionId, $labelId)]
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
     * @param AdGroupCriterionLabel[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupCriterionLabelOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example adGroupCriterion label request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $criterionId
     * @param int $labelId
     * @return AdGroupCriterionLabel
     */
    public static function createAdGroupCriterionLabel(int $campaignId, int $adGroupId, int $criterionId, int $labelId): AdGroupCriterionLabel
    {
        $operand = new AdGroupCriterionLabel();
        $operand->setCampaignId($campaignId);
        $operand->setAdGroupId($adGroupId);
        $operand->setCriterionId($criterionId);
        $operand->setLabelId($labelId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupCriterionLabelServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
