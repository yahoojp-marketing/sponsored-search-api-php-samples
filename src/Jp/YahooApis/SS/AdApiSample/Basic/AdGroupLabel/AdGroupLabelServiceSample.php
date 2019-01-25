<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\AdGroupLabel;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\AdGroup\AdGroupServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\Label\LabelServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupLabel\{AdGroupLabel, AdGroupLabelOperation, AdGroupLabelService, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;

/**
 * example AdGroupLabelService operation and Utility method collection.
 */
class AdGroupLabelServiceSample
{

    const SERVICE_NAME = 'AdGroupLabelService';

    /**
     * @var AdGroupLabelService
     */
    private static $service = null;

    /**
     * AdGroupLabelServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AdGroupLabelService::class);
    }

    /**
     * example mutate adGroup labels.
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
        $adGroupValuesHolder = AdGroupServiceSample::create();
        $labelValuesHolder = LabelServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setFeedFolderValuesList($adGroupValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($adGroupValuesHolder->getCampaignValuesList());
        $selfValuesHolder->setAdGroupValuesList($adGroupValuesHolder->getAdGroupValuesList());
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
        AdGroupServiceSample::cleanup($valuesHolder);
    }

    /**
     * example AdGroupLabelService operation.
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
            $labelId = $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds()[0];

            // =================================================================
            // AdGroupLabelService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [self::createAdGroupLabel($campaignId, $adGroupId, $labelId)]
            );

            // run
            self::mutate($addRequest);

            // =================================================================
            // AdGroupLabelService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                [self::createAdGroupLabel($campaignId, $adGroupId, $labelId)]
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
     * @param AdGroupLabel[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new AdGroupLabelOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example adGroup label request.
     *
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $labelId
     * @return AdGroupLabel
     */
    public static function createAdGroupLabel(int $campaignId, int $adGroupId, int $labelId): AdGroupLabel
    {
        $operand = new AdGroupLabel();
        $operand->setCampaignId($campaignId);
        $operand->setAdGroupId($adGroupId);
        $operand->setLabelId($labelId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AdGroupLabelServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
