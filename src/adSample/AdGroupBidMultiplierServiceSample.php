<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupBidMultiplierServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupBidMultiplierServiceSample{
    private $serviceName = 'AdGroupBidMultiplierService';

    /**
     * Sample Program for AdGroupBidMultiplierService MUTATE.
     *
     * @param array $operation AdGroupBidMultiplierOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupBidMultiplierValues entity.
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
            if(!isset($returnValue->adGroupBidMultiplier)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupBidMultiplierService GET.
     *
     * @param array $selector AdGroupBidMultiplierSelector entity.
     * @return array AdGroupBidMultiplierValues entity.
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
            if(!isset($returnValue->adGroupBidMultiplier)){
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
     * @return AdGroupBidMultiplierOperation entity.
     */
    public function createSampleSetRequest($accountId, $campaignId, $adGroupId){

        // Create operands
        $operands = array(
            array(
                'adGroupId' => $adGroupId,
                'bidMultipliers' => array(
                    'type' => 'PLATFORM',
                    'bidMultipliers' => array(
                        'type' => 'PLATFORM',
                        'platformName' => 'SMART_PHONE',
                        'bidMultiplier' => '3.2'
                    )
                )
            )
        );

        // Set xsi:type
        $operands[0]['bidMultipliers'] = new SoapVar($operands[0]['bidMultipliers'], SOAP_ENC_OBJECT, 'PlatformBidMultiplierList', API_NS, 'bidMultipliers', XMLSCHEMANS);

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
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
     * @return AdGroupBidMultiplierSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId){

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
 * execute AdGroupBidMultiplierServiceSample.
 */
try{
    $adGroupBidMultiplierServiceSample = new AdGroupBidMultiplierServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // =================================================================
    // AdGroupBidMultiplierService SET
    // =================================================================
    // Create operands
    $operation = $adGroupBidMultiplierServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId);

    // Run
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupBidMultiplierService GET
    // =================================================================
    // Create operands
    $selector = $adGroupBidMultiplierServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId);

    // Run
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->get($selector);

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
