<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for NegativeCampaignRetargetingListServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class NegativeCampaignRetargetingListServiceSample{
    private $serviceName = 'NegativeCampaignRetargetingListService';

    /**
     * Sample Program for NegativeCampaignRetargetingListService MUTATE.
     *
     * @param array $operation NegativeCampaignRetargetingListOperation entity.
     * @param string $method Operator enum.
     * @return array NegativeCampaignRetargetingListValues entity.
     * @throws Exception
     */
    public function mutate($operation, $method){

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValuesValues = array();
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValuesValues = $response->rval->values;
            }else{
                $returnValuesValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach($returnValuesValues as $returnValuesValue){
            if(!isset($returnValuesValue->negativeCampaignRetargetingList)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValuesValues;
    }

    /**
     * Sample Program for NegativeCampaignRetargetingListService GET.
     *
     * @param array $selector NegativeCampaignRetargetingListSelector entity.
     * @return array NegativeCampaignRetargetingListValues entity.
     * @throws Exception
     */
    public function get($selector){

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of get ' . $this->serviceName . '.');
        }

        // Error
        foreach($returnValues as $returnValue){
            if(!isset($returnValue->negativeCampaignRetargetingList)){
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
     * @return NegativeCampaignRetargetingListOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $targetListId){

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                )
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
     * @return NegativeCampaignRetargetingListOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $targetListId){

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                )
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
     * @return NegativeCampaignRetargetingListSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $targetListId){

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

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * execute NegativeCampaignRetargetingListServiceSample.
 */
try{
    $negativeCampaignRetargetingListServiceSample = new NegativeCampaignRetargetingListServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $targetListId = SoapUtils::getTargetListId();

    // =================================================================
    // NegativeCampaignRetargetingListService ADD
    // =================================================================
    // Create operands
    $operation = $negativeCampaignRetargetingListServiceSample->createSampleAddRequest($accountId, $campaignId, $targetListId);

    // Run
    $negativeCampaignRetargetingListServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // NegativeCampaignRetargetingListService GET
    // =================================================================
    // Create selector
    $selector = $negativeCampaignRetargetingListServiceSample->createSampleGetRequest($accountId, $campaignId, $targetListId);

    // Run
    $negativeCampaignRetargetingListValues = $negativeCampaignRetargetingListServiceSample->get($selector);

    // =================================================================
    // NegativeCampaignRetargetingListService REMOVE
    // =================================================================
    // Create operands
    $operation = $negativeCampaignRetargetingListServiceSample->createSampleRemoveRequest($accountId, $campaignId, $targetListId);

    // Run
    $negativeCampaignRetargetingListServiceSample->mutate($operation, 'REMOVE');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
