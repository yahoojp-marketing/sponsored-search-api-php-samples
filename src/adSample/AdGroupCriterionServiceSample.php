<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupCriterionServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupCriterionServiceSample{
    private $serviceName = 'AdGroupCriterionService';

    /**
     * Sample Program for AdGroupCriterionService MUTATE.
     *
     * @param array $operation AdGroupCriterionOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupCriterionValues entity.
     * @throws Exception
     */
    public function mutate($operation, $method){

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach($returnValues as $returnValue){
            if(!isset($returnValue->adGroupCriterion)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupCriterionService GET.
     *
     * @param array $selector AdGroupCriterionSelector entity.
     * @return array AdGroupCriterionValues entity.
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
            if(!isset($returnValue->adGroupCriterion)){
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
     * @return AdGroupOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $adGroupId){

        // Create operands
        $operands = array(
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
                'criterion' => array(
                    'type' => 'KEYWORD',
                    'text' => 'sample text',
                    'matchType' => 'PHRASE'
                ),
                'userStatus' => 'ACTIVE',
                'destinationUrl' => 'http://www.yahoo.co.jp/',
                'biddingStrategyConfiguration' => array(
                    'bid' => array(
                        'maxCpc' => 100
                    )
                ),
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                ),
                'advanced' => 'TRUE'
            )
        );

        // Set xsi:type
        $operands[0]['criterion'] = new SoapVar($operands[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
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
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleSetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues){

        // Create operands
        $operands = array();
        foreach($adGroupCriterionValues as $adGroupCriterionValue){

            // Create operand
            $operand = array(
                'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
                'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
                'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
                'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
                'criterion' => array(
                    'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                    'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type
                ),
                'userStatus' => 'PAUSED',
                'biddingStrategyConfiguration' => array(
                    'bid' => array(
                        'maxCpc' => 150
                    )
                ),
                'destinationUrl' => 'http://www.yahoo2.co.jp/',
                'advancedUrl' => 'http://www.yahoo2.co.jp',
                'advancedMobileUrl' => 'http://www.yahoo2.co.jp/mobile',
                'trackingUrl' => 'http://www.yahoo2.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '5678'
                    )
                )
            );

            // Set xsi:type
            $operand['criterion'] = new SoapVar($operand['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
            $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
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
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues){

        // Create operands
        $operands = array();
        foreach($adGroupCriterionValues as $adGroupCriterionValue){

            // Create operand
            $operand = array(
                'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
                'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
                'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
                'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
                'criterion' => array(
                    'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                    'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type
                )
            );

            array_push($operands, $operand);
        }

        // Set xsi:type
        $operands[0]['criterion'] = new SoapVar($operands[0]['criterion'], SOAP_ENC_OBJECT, 'Keyword', API_NS, 'criterion', XMLSCHEMANS);
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'BiddableAdGroupCriterion', API_NS, 'operand', XMLSCHEMANS);

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
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
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return AdGroupCriterionSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues){

        // Get criterionIds
        $criterionIds = array();
        foreach($adGroupCriterionValues as $adGroupCriterionValue){
            if(isset($adGroupCriterionValue->adGroupCriterion)){
                $criterionIds[] = $adGroupCriterionValue->adGroupCriterion->criterion->criterionId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId
                ),
                'adGroupIds' => array(
                    $adGroupId
                ),
                'criterionIds' => $criterionIds,
                'userStatuses' => array(
                    'ACTIVE',
                    'PAUSED'
                ),
                'criterionUse' => 'BIDDABLE',
                'approvalStatuses' => array(
                    'APPROVED',
                    'APPROVED_WITH_REVIEW',
                    'REVIEW',
                    'PRE_DISAPPROVED',
                    'POST_DISAPPROVED'
                ),
                'advanced' => 'TRUE',
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
 * execute AdGroupCriterionServiceSample.
 */
try{
    $adGroupCriterionServiceSample = new AdGroupCriterionServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // =================================================================
    // AdGroupCriterionService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleAddRequest($accountId, $campaignId, $adGroupId);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupCriterionService SET
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupCriterionService GET
    // =================================================================
    // Create selector
    $selector = $adGroupCriterionServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->get($selector);

    // =================================================================
    // AdGroupCriterionService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'REMOVE');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}

