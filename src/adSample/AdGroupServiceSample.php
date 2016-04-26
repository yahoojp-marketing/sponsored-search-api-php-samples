<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupServiceSample{
    private $serviceName = 'AdGroupService';

    /**
     * Sample Program for AdGroupService MUTATE.
     *
     * @param array $operation AdGroupOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupValues entity.
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
            if(!isset($returnValue->adGroup)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupService GET.
     *
     * @param array $selector AdGroupSelector entity.
     * @return array AdGroupValues entity.
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
            if(!isset($returnValue->adGroup)){
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param long $biddingStrategyId BiddingStrategyID
     * @param long $campaignId CampaignID
     * @param long $appCampaignId AppCampaignID
     * @return AdGroupOperation entity.
     */
    public function createSampleAddRequest($accountId, $biddingStrategyId, $campaignId, $appCampaignId){

        // Create operands
        $operands = array(

            // Create AutoBidding AdGroup for Standard Campaign
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupName' => 'SampleAutoBiddingAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId,
                    'initialBid' => array(
                        'maxCpc' => 120
                    )
                ),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create ManualCpc AdGroup for Standard Campaign
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupName' => 'SampleManualCpcAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyType' => 'MANUAL_CPC',
                    'initialBid' => array(
                        'maxCpc' => 120
                    )
                ),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create AutoBidding AdGroup for MobileApp Campaign
            array(
                'accountId' => $accountId,
                'campaignId' => $appCampaignId,
                'adGroupName' => 'SampleAutoBiddingAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId,
                    'initialBid' => array(
                        'maxCpc' => 120
                    )
                )
            ),

            // Create ManualCpc AdGroup for MobileApp Campaign
            array(
                'accountId' => $accountId,
                'campaignId' => $appCampaignId,
                'adGroupName' => 'SampleManualCpcAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyType' => 'MANUAL_CPC',
                    'initialBid' => array(
                        'maxCpc' => 120
                    )
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
     * @param long $biddingStrategyId BiddingStrategyID
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleSetRequest($accountId, $biddingStrategyId, $adGroupValues){

        // Create operands
        $operands = array();
        foreach($adGroupValues as $adGroupValue){

            // Create operand
            $operand = array(
                'accountId' => $adGroupValue->adGroup->accountId,
                'campaignId' => $adGroupValue->adGroup->campaignId,
                'adGroupId' => $adGroupValue->adGroup->adGroupId,
                'adGroupName' => 'Sample_UpdateOn_' . $adGroupValue->adGroup->adGroupId . '_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'biddingStrategyConfiguration' => array(
                    'initialBid' => array(
                        'maxCpc' => 200
                    )
                )
            );

            // Create BiddingStrategyConfiguration
            if($adGroupValue->adGroup->biddingStrategyConfiguration->biddingStrategyType === 'MANUAL_CPC'){
                $operand['biddingStrategyConfiguration']['biddingStrategyId'] = $biddingStrategyId;
            }

            if(!empty($adGroupValue->adGroup->trackingUrl)){
                $operand['trackingUrl'] = 'http://yahoo.co.jp?url={lpurl}&amp;a={creative}&amp;pid={_id2}';
                $operand['customParameters'] = array(
                    'parameters' => array(
                        'key' => 'id2',
                        'value' => '5678'
                    )
                );
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
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupValues){

        // Create operands
        $operands = array();
        foreach($adGroupValues as $adGroupValue){

            // Create operand
            $operand = array(
                'accountId' => $adGroupValue->adGroup->accountId,
                'campaignId' => $adGroupValue->adGroup->campaignId,
                'adGroupId' => $adGroupValue->adGroup->adGroupId
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
     * @param long $appCampaignId AppCampaignID
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues){

        // Get adGroupIds
        $adGroupIds = array();
        foreach($adGroupValues as $adGroupValue){
            if(isset($adGroupValue->adGroup)){
                $adGroupIds[] = $adGroupValue->adGroup->adGroupId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId,
                    $appCampaignId
                ),
                'adGroupIds' => $adGroupIds,
                'userStatuses' => array(
                    'ACTIVE',
                    'PAUSED'
                ),
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
 * execute AdGroupServiceSample.
 */
try{
    $adGroupServiceSample = new AdGroupServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();

    // =================================================================
    // AdGroupService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $biddingStrategyId, $campaignId, $appCampaignId);

    // Run
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupService SET
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleSetRequest($accountId, $biddingStrategyId, $adGroupValues);

    // Run
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupService GET
    // =================================================================
    // Create selector
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);

    // Run
    $adGroupValues = $adGroupServiceSample->get($selector);

    // =================================================================
    // AdGroupService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);

    // Run
    $adGroupServiceSample->mutate($operation, 'REMOVE');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
