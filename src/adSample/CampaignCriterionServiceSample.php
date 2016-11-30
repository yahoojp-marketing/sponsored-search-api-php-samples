<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignCriterionServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignCriterionServiceSample
{

    private $serviceName = 'CampaignCriterionService';

    /**
     * Sample Program for CampaignCriterionService MUTATE.
     *
     * @param array $operation CampaignCriterionOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignCriterionReturnValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
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
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->campaignCriterion)) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for CampaignCriterionService GET.
     *
     * @param array $selector CampaignCriterionSelector entity.
     * @return array CampaignCriterionReturnValue entity.
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
            if (!isset($returnValue->campaignCriterion)) {
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
     * @return CampaignOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId)
    {

        // Create operands
        $operands = array(

            // Set ScheduleTarget
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'criterionUse' => 'NEGATIVE',
                'criterion' => array(
                    'type' => 'KEYWORD',
                    'text' => 'sample text',
                    'matchType' => 'PHRASE'
                )
            )
        );

        // Set xsi:type
        $operands[0]['criterion'] = new SoapVar($operands[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'NegativeCampaignCriterion', API_NS, 'operand', XMLSCHEMANS);

        // Set Request
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'criterionUse' => 'NEGATIVE',
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
     * @param long $campaignCriterionValues CampaignCriterionReturnValue entity.
     * @return CampaignOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $campaignCriterionValues)
    {

        // Create operands
        $operands = array();
        foreach ($campaignCriterionValues as $campaignCriterionValue) {
            $operands[] = array(
                'accountId' => $campaignCriterionValue->campaignCriterion->accountId,
                'campaignId' => $campaignCriterionValue->campaignCriterion->campaignId,
                'criterionUse' => $campaignCriterionValue->campaignCriterion->criterionUse,
                'criterion' => array(
                    'criterionId' => $campaignCriterionValue->campaignCriterion->criterion->criterionId,
                    'type' => $campaignCriterionValue->campaignCriterion->criterion->type
                )
            );
        }

        // Create Request
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'criterionUse' => 'NEGATIVE',
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
     * @param array $campaignCriterionValues CampaignCriterionReturnValue entity.
     * @return CampaignCriterionSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $campaignCriterionValues)
    {

        // Get campaignCriterionIds
        $campaignCriterionIds = array();
        foreach ($campaignCriterionValues as $campaignCriterionValue) {
            $campaignCriterionIds[] = $campaignCriterionValue->campaignCriterion->criterion->criterionId;
        }

        // Create Selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId
                ),
                'criterionIds' => $campaignCriterionIds,
                'criterionUse' => 'NEGATIVE',
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
 * execute CampaignServiceSample.
 */
try {
    $campaignCriterionServiceSample = new CampaignCriterionServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();

    // =================================================================
    // CampaignCriterionService ADD
    // =================================================================
    // Create operands
    $operation = $campaignCriterionServiceSample->createSampleAddRequest($accountId, $campaignId);

    // Run
    $campaignCriterionValues = $campaignCriterionServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // CampaignCriterionService GET
    // =================================================================
    // Create selector
    $selector = $campaignCriterionServiceSample->createSampleGetRequest($accountId, $campaignId, $campaignCriterionValues);

    // Run
    $campaignCriterionValues = $campaignCriterionServiceSample->get($selector);

    // =================================================================
    // CampaignCriterionService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $campaignCriterionValues);

    // Run
    $campaignCriterionValues = $campaignCriterionServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
