<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/AccountSharedServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');

/**
 * Sample Program for CampaignSharedSetService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignSharedSetServiceSample
{

    /**
     * Service Name.
     */
    const SERVICE_NAME = 'CampaignSharedSetService';

    /**
     * Return Value Object Name.
     */
    const RETURN_VALUE_OBJECT_NAME = 'campaignSharedSet';

    /**
     * Sample Program for CampaignSharedSetService Mutate.
     *
     * @param array $operation CampaignSharedSetOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignSharedSetValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService(self::SERVICE_NAME);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of ' . $method . ' ' . self::SERVICE_NAME . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->{self::RETURN_VALUE_OBJECT_NAME})) {
                throw new Exception('Fail to ' . $method . ' ' . self::SERVICE_NAME . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for CampaignSharedSetService GET.
     *
     * @param array $selector CampaignSharedSetSelector entity.
     * @return array CampaignSharedSetValues entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $service = SoapUtils::getService(self::SERVICE_NAME);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of get ' . self::SERVICE_NAME . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->{self::RETURN_VALUE_OBJECT_NAME})) {
                throw new Exception('Fail to get ' . self::SERVICE_NAME . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param $accountId AccountID
     * @param $campaignId CampaignID
     * @param $sharedListIds SharedListIds
     */
    public function createSampleAddRequest($accountId, $campaignId, $sharedListIds)
    {

        // Create operand
        $operands = array();
        foreach ($sharedListIds as $sharedListId){
            $operand = array(
                'sharedListId' => $sharedListId,
                'campaignId' => $campaignId
            );
            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param $accountId AccountID
     * @param $campaignSharedSetValues CampaignSharedSetValues
     */
    public function createSampleRemoveRequest($accountId, $campaignSharedSetValues)
    {

        // Create operand
        $operands = array();
        foreach ($campaignSharedSetValues as $campaignSharedSetValue) {
            if (isset($campaignSharedSetValue->campaignSharedSet)) {
                $operand = array(
                    'sharedListId' => $campaignSharedSetValue->campaignSharedSet->sharedListId,
                    'campaignId' => $campaignSharedSetValue->campaignSharedSet->campaignId,
                );
                array_push($operands, $operand);
            }
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param $accountId AccountID
     * @param $campaignSharedSetValues CampaignSharedSetValues
     */
    public function createSampleGetRequest($accountId, $campaignSharedSetValues = null)
    {

        // Get SharedListId
        $campaignIds = array();
        if (!is_null($campaignSharedSetValues)) {
            foreach ($campaignSharedSetValues as $campaignSharedSetValue) {
                if (isset($campaignSharedSetValue->campaignSharedSet)) {
                    $campaignIds[] = $campaignSharedSetValue->campaignSharedSet->campaignId;
                }
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignIds,
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute CampaignSharedSetServiceSample.
 */
try {
    $accountSharedServiceSample = new AccountSharedServiceSample();
    $campaignSharedSetServiceSample = new CampaignSharedSetServiceSample();
    $campaignServiceSample = new CampaignServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();

    // =================================================================
    // AccountSharedService ADD
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleAddRequest($accountId);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'ADD');

    // Get SharedListId
    $sharedListIds = array();
    foreach ($accountSharedValues as $accountSharedValue) {
        if (isset($accountSharedValue->accountShared)) {
            $sharedListIds[] = $accountSharedValue->accountShared->sharedListId;
        }
    }

    // =================================================================
    // CampaignService ADD
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);

    // Run
    $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');

    // Get CampaignId
    $campaignId = null;
    foreach($campaignValues as $campaignValue){
        if($campaignValue->campaign->biddingStrategyConfiguration->biddingStrategyType === 'TARGET_SPEND'){
            switch($campaignValue->campaign->campaignType){
                default :
                    break;
                case 'STANDARD' :
                    $campaignId = $campaignValue->campaign->campaignId;
                    break 2;
            }
        }
    }

    // =================================================================
    // CampaignSharedSetService ADD
    // =================================================================
    // Create operands
    $operation = $campaignSharedSetServiceSample->createSampleAddRequest($accountId, $campaignId, $sharedListIds);

    // Run
    $campaignSharedSetValues = $campaignSharedSetServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // CampaignSharedSetService GET
    // =================================================================
    // Create selector
    $selector = $campaignSharedSetServiceSample->createSampleGetRequest($accountId, $campaignSharedSetValues);

    // Run
    $campaignSharedSetValues = $campaignSharedSetServiceSample->get($selector);

    // =================================================================
    // CampaignSharedSetService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignSharedSetServiceSample->createSampleRemoveRequest($accountId, $campaignSharedSetValues);

    // Run
    $campaignSharedSetValues = $campaignSharedSetServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // CampaignService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);

    // Run
    $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // AccountSharedService REMOVE
    // =================================================================
    // Create operands
    $operation = $accountSharedServiceSample->createSampleRemoveRequest($accountId, $accountSharedValues);

    // Run
    $accountSharedValues = $accountSharedServiceSample->mutate($operation, 'REMOVE');
} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
