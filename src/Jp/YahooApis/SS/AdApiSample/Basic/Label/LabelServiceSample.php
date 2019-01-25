<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Basic\Label;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\Label\{CountLabeledEntity, get, getResponse, Label, LabelOperation, LabelSelector, LabelService, mutate, mutateResponse, Operator};
use Jp\YahooApis\SS\V201901\Paging;

/**
 * example LabelService operation and Utility method collection.
 */
class LabelServiceSample
{

    const SERVICE_NAME = 'LabelService';

    /**
     * @var LabelService
     */
    private static $service = null;

    /**
     * LabelServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(LabelService::class);
    }

    /**
     * example get labels.
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
     * example mutate labels.
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
     * create basic Label.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $valuesHolder = new ValuesHolder();
        $addRequest = self::buildExampleMutateRequest(Operator::ADD, SoapUtils::getAccountId(), [self::createLabel()]);
        $addResponse = self::mutate($addRequest);
        $valuesHolder->setLabelValuesList($addResponse->getRval()->getValues());
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
        if (count($valuesHolder->getLabelValuesList()) > 0) {
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
            self::mutate(
                self::buildExampleMutateRequest(Operator::REMOVE, SoapUtils::getAccountId(),
                    $valuesRepositoryFacade->getLabelValuesRepository()->getLabels()
                )
            );
        }
    }

    /**
     * example LabelService operation.
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
            $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);

            // =================================================================
            // LabelService ADD
            // =================================================================
            // create request.
            $addRequest = self::buildExampleMutateRequest(Operator::ADD, $accountId, [self::createLabel()]);

            // run
            $addResponse = self::mutate($addRequest);
            $valuesHolder->setLabelValuesList($addResponse->getRval()->getValues());

            // =================================================================
            // LabelService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds());

            // run
            self::get($getRequest);

            // =================================================================
            // LabelService SET
            // =================================================================
            // create request.
            $setRequest = self::buildExampleMutateRequest(Operator::SET, $accountId,
                self::createExampleSetRequest($valuesRepositoryFacade->getLabelValuesRepository()->getLabels())
            );

            // run
            self::mutate($setRequest);

            // =================================================================
            // LabelService REMOVE
            // =================================================================
            // create request.
            $removeRequest = self::buildExampleMutateRequest(Operator::REMOVE, $accountId,
                $valuesRepositoryFacade->getLabelValuesRepository()->getLabels()
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
     * @param int[] $labelIds
     * @return get
     */
    public static function buildExampleGetRequest(int $accountId, array $labelIds): get
    {
        $selector = new LabelSelector($accountId);

        if (!is_null($labelIds)) {
            $selector->setLabelIds($labelIds);
        }
        $selector->setCountLabeledEntity(CountLabeledEntity::TRUE);

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * example mutate request.
     *
     * @param Operator $operator
     * @param int $accountId
     * @param Label[] $operand
     * @return mutate
     */
    public static function buildExampleMutateRequest(string $operator, int $accountId, array $operand): mutate
    {
        return new mutate(
            new LabelOperation($operator, $accountId, $operand)
        );
    }

    /**
     * example label request.
     *
     * @return Label
     */
    public static function createLabel(): Label
    {
        $operand = new Label();
        $operand->setLabelName('Sample_Label_' . SoapUtils::getCurrentTimestamp());
        $operand->setDescription('sample label');
        $operand->setColor('#000000');
        return $operand;
    }

    /**
     * example labels set request.
     *
     * @param Label[] $labels
     * @return Label[]
     */
    public static function createExampleSetRequest(array $labels): array
    {
        // create operands
        $operands = [];

        foreach ($labels as $label) {
            $operand = new Label();
            $operand->setLabelId($label->getLabelId());
            $operand->setLabelName('Sample_UpdateOn_' . SoapUtils::getCurrentTimestamp());
            $operand->setDescription('sample label update');
            $operand->setColor('#0000FF');
            $operands[] = $operand;
        }

        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    LabelServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
