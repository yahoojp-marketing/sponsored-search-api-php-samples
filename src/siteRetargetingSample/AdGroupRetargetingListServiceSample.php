<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupRetargetingListServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupRetargetingListServiceSample{
    private $serviceName = 'AdGroupRetargetingListService';

    /**
     * Sample Program for AdGroupRetargetingListService MUTATE.
     *
     * @param array $operation AdGroupRetargetingListOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupRetargetingListValues entity.
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
            if(!isset($returnValuesValue->adGroupRetargetingList)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValuesValues;
    }

    /**
     * Sample Program for AdGroupRetargetingListService GET.
     *
     * @param array $selector AdGroupRetargetingListSelector entity.
     * @return array AdGroupRetargetingListValues entity.
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
            if(!isset($returnValue->adGroupRetargetingList)){
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
     * @param long $adGroupId AdGroupID
     * @param long $targetListId TargetListID
     * @return NegativeCampaignRetargetingListOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $adGroupId, $targetListId){

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                ),
                'excludedType' => 'INCLUDED',
                'bidMultiplier' => '1.00',
                'targetAll' => 'ACTIVE'
            ),
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionTargetList' => array(
                    'targetListId' => $targetListId
                ),
                'excludedType' => 'EXCLUDED',
                'targetAll' => 'DEACTIVE'
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
     * @param array $adGroupRetargetingListValues AdGroupRetargetingListValues entity.
     * @return NegativeCampaignRetargetingListOperation entity.
     */
    public function createSampleSetRequest($accountId, $adGroupRetargetingListValues){

        // Create operands
        $operands = array();
        foreach($adGroupRetargetingListValues as $adGroupRetargetingListValue){
            $operand = array(
                'campaignId' => $adGroupRetargetingListValue->adGroupRetargetingList->campaignId,
                'adGroupId' => $adGroupRetargetingListValue->adGroupRetargetingList->adGroupId,
                'criterionTargetList' => array(
                    'targetListId' => $adGroupRetargetingListValue->adGroupRetargetingList->criterionTargetList->targetListId
                ),
                'excludedType' => $adGroupRetargetingListValue->adGroupRetargetingList->excludedType
            );

            if($adGroupRetargetingListValue->adGroupRetargetingList->excludedType === 'INCLUDED'){
                $operand['bidMultiplier'] = '10.00';
            }

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
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
     * @param array $adGroupRetargetingListValues AdGroupRetargetingListValues entity.
     * @return NegativeCampaignRetargetingListOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupRetargetingListValues){

        // Create operands
        $operands = array();
        foreach($adGroupRetargetingListValues as $adGroupRetargetingListValue){
            $operand = array(
                'campaignId' => $adGroupRetargetingListValue->adGroupRetargetingList->campaignId,
                'adGroupId' => $adGroupRetargetingListValue->adGroupRetargetingList->adGroupId,
                'criterionTargetList' => array(
                    'targetListId' => $adGroupRetargetingListValue->adGroupRetargetingList->criterionTargetList->targetListId
                ),
                'excludedType' => $adGroupRetargetingListValue->adGroupRetargetingList->excludedType
            );

            array_push($operands, $operand);
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
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @param long $targetListId TargetListID
     * @return NegativeCampaignRetargetingListSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId, $targetListId){

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignId,
                'targetListIds' => $targetListId,
                'adGroupIds' => $adGroupId,
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
 * execute AdGroupRetargetingListServiceSample.
 */
try{
    $adGroupRetargetingListServiceSample = new AdGroupRetargetingListServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $targetListId = SoapUtils::getTargetListId();
    $adGroupId = SoapUtils::getAdGroupId();

    // =================================================================
    // AdGroupRetargetingListService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupRetargetingListServiceSample->createSampleAddRequest($accountId, $campaignId, $adGroupId, $targetListId);

    // Run
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupRetargetingListService SET
    // =================================================================
    // Create operand
    $operation = $adGroupRetargetingListServiceSample->createSampleSetRequest($accountId, $adGroupRetargetingListValues);

    // Run
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupRetargetingListService GET
    // =================================================================
    // Create selector
    $selector = $adGroupRetargetingListServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId, $targetListId);

    // Run
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->get($selector);

    // =================================================================
    // AdGroupRetargetingListService REMOVE
    // =================================================================
    // Create operand
    $operation = $adGroupRetargetingListServiceSample->createSampleRemoveRequest($accountId, $adGroupRetargetingListValues);

    // Run
    $adGroupRetargetingListValues = $adGroupRetargetingListServiceSample->mutate($operation, 'REMOVE');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
