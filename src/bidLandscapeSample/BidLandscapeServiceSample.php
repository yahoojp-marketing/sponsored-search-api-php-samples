<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BidLandscapeService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class BidLandscapeServiceSample{
    private $serviceName = 'BidLandscapeService';

    /**
     * Sample Program for BidLandscapeService GET.
     *
     * @param array $selector BidLandscapeSelector entity.
     * @return array BidLandscapeValues entity.
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
            if(!isset($returnValue->data)){
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }
}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * execute RetargetingListServiceSample.
 */
try{
    $bidLandscapeServiceSample = new BidLandscapeServiceSample();

    $accountId = SoapUtils::getAccountId();
    $adGroupCriterionIds = explode(',', SoapUtils::getAdGroupCriterionIds());

    // =================================================================
    // BidLandscapeService
    // =================================================================
    // Create selector
    $selector = array();
    if(count($adGroupCriterionIds) > 0 && $adGroupCriterionIds[0] != 'ADGROUPCRITERIONIDS'){
        $selector = array(
            'selector' => array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => SoapUtils::getCampaignId(),
                'adGroupId' => SoapUtils::getAdGroupId(),
                'criterionIds' => $adGroupCriterionIds,
                'simType' => 'CRITERION'
            )
        );
    }else{
        $selector = array(
            'selector' => array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => SoapUtils::getCampaignId(),
                'adGroupId' => SoapUtils::getAdGroupId(),
                'simType' => 'ADGROUP'
            )
        );
    }

    // Run
    $bidLandscapeServiceSample->get($selector);

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
