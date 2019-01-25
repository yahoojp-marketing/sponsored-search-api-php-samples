<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\CampaignLabel;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\Campaign\CampaignServiceSample;
use Jp\YahooApis\SS\AdApiSample\Basic\Label\LabelServiceSample;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Campaign\CampaignType;
use Jp\YahooApis\SS\V201901\CampaignLabel\{CampaignLabel, CampaignLabelOperation, CampaignLabelService, mutate, mutateResponse, Operator};

/**
 * example CampaignLabelService operation and Utility method collection.
 */
class CampaignLabelServiceSample
{

    const SERVICE_NAME = 'CampaignLabelService';

    /**
     * @var CampaignLabelService
     */
    private static $service = null;

    /**
     * CampaignLabelServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(CampaignLabelService::class);
    }

    /**
     * example mutate campaign labels.
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
        $campaignValuesHolder = CampaignServiceSample::create();
        $labelValuesHolder = LabelServiceSample::create();
        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setFeedFolderValuesList($campaignValuesHolder->getFeedFolderValuesList());
        $selfValuesHolder->setCampaignValuesList($campaignValuesHolder->getCampaignValuesList());
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
        CampaignServiceSample::cleanup($valuesHolder);
    }

    /**
     * example CampaignLabelService operation.
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
            $labelId = $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds()[0];

            // =================================================================
            // CampaignLabelService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId,
                [self::createCampaignLabel($campaignId, $labelId)]
            );

            // run
            self::mutate($addRequest);

            // =================================================================
            // CampaignLabelService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                [self::createCampaignLabel($campaignId, $labelId)]
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
     * @param CampaignLabel[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new CampaignLabelOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example campaign label request.
     *
     * @param int $campaignId
     * @param int $labelId
     * @return CampaignLabel
     */
    public static function createCampaignLabel(int $campaignId, int $labelId): CampaignLabel
    {
        $operand = new CampaignLabel();
        $operand->setCampaignId($campaignId);
        $operand->setLabelId($labelId);
        return $operand;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    CampaignLabelServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
