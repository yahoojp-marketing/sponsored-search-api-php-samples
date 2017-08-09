<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignRetargetingListServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignRetargetingListServiceSample
{

    private $serviceName = 'CampaignRetargetingListService';

    /**
     * Sample Program for CampaignRetargetingListService MUTATE.
     *
     * @param array $operation CampaignRetargetingListOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignRetargetingListValues entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValuesValues = array();
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValuesValues = $response->rval->values;
            } else {
                $returnValuesValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValuesValues as $returnValuesValue) {
            if (!isset($returnValuesValue->campaignRetargetingList)) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValuesValues;
    }

    /**
     * Sample Program for CampaignRetargetingListService GET.
     *
     * @param array $selector CampaignRetargetingListSelector entity.
     * @return array CampaignRetargetingListValues entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
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
            throw new Exception('No response of get ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->campaignRetargetingList)) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $targetListId TargetListID
     * @return CampaignRetargetingListOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $targetListId)
    {

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                ),
                'excludedType' => 'INCLUDED',
                'bidMultiplier' => '1.00'
            ),
            array(
                'campaignId' => $campaignId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                ),
                'excludedType' => 'EXCLUDED'
            )
        );

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
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $targetListId TargetListID
     * @return CampaignRetargetingListOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $targetListId)
    {

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                ),
                'excludedType' => 'INCLUDED'
            )
        );

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
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $targetListId TargetListID
     * @return CampaignRetargetingListSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $targetListId)
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignId,
                'targetListIds' => $targetListId,
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
 * execute CampaignRetargetingListServiceSample.
 */
try {
    $campaignRetargetingListServiceSample = new CampaignRetargetingListServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $targetListId = SoapUtils::getTargetListId();

    // =================================================================
    // CampaignRetargetingListService ADD
    // =================================================================
    // Create operands
    $operation = $campaignRetargetingListServiceSample->createSampleAddRequest($accountId, $campaignId, $targetListId);

    // Run
    $campaignRetargetingListServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // CampaignRetargetingListService GET
    // =================================================================
    // Create selector
    $selector = $campaignRetargetingListServiceSample->createSampleGetRequest($accountId, $campaignId, $targetListId);

    // Run
    $campaignRetargetingListValues = $campaignRetargetingListServiceSample->get($selector);

    // =================================================================
    // CampaignRetargetingListService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignRetargetingListServiceSample->createSampleRemoveRequest($accountId, $campaignId, $targetListId);

    // Run
    $campaignRetargetingListServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
