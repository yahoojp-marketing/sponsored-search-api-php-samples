<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupAdServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupAdServiceSample{
    private $serviceName = 'AdGroupAdService';

    /**
     * Sample Program for AdGroupAdService MUTATE.
     *
     * @param array $operation AdGroupAdOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupAdValues entity.
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
            if(!isset($returnValue->adGroupAd)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupAdService GET.
     *
     * @param array $selector AdGroupAdSelector entity.
     * @return array AdGroupAdValues entity.
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
            if(!isset($returnValue->adGroupAd)){
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
     * @param long $appCampaignId AppCampaignID
     * @param long $adGroupId AdGroupID
     * @param long $appAdGroupId AppAdGroupID
     * @return AdGroupAdOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId){

        // Create operands
        $operands = array(

            // Set TextAd2
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'adName' => 'SampleTextAd2_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'TEXT_AD2',
                    'headline' => 'sample headline',
                    'description' => 'sample ad desc',
                    'description2' => 'sample ad desc2',
                    'url' => 'http://www.yahoo.co.jp/',
                    'displayUrl' => 'www.yahoo.co.jp',
                    'devicePreference' => 'SMART_PHONE'
                ),
                'userStatus' => 'ACTIVE'
            ),

            // Set AppAd
            array(
                'accountId' => $accountId,
                'campaignId' => $appCampaignId,
                'adGroupId' => $appAdGroupId,
                'adName' => 'SampleAppAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'APP_AD',
                    'headline' => 'sample',
                    'description' => 'sample ad desc',
                    'description2' => 'sample ad desc2',
                    'url' => 'http://www.yahoo.co.jp/',
                    'displayUrl' => 'www.yahoo.co.jp',
                    'devicePreference' => 'SMART_PHONE'
                ),
                'userStatus' => 'ACTIVE'
            )
        );

        // Set xsi:typ for ad of TextAd2
        $operands[0]['ad'] = new SoapVar($operands[0]['ad'], SOAP_ENC_OBJECT, 'TextAd2', API_NS, 'ad', XMLSCHEMANS);
        $operands[1]['ad'] = new SoapVar($operands[1]['ad'], SOAP_ENC_OBJECT, 'AppAd', API_NS, 'ad', XMLSCHEMANS);

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
     * @param array $adGroupAdlues AdGroupAdValues entity.
     * @return AdGroupAdOperation entity.
     */
    public function createSampleSetRequest($accountId, $adGroupAdValues){

        // Create operands
        $operands = array();
        foreach($adGroupAdValues as $adGroupAdValue){

            // Create operand
            $ad = array();

            // Set Ad
            if($adGroupAdValue->adGroupAd->ad->type === 'TEXT_AD2'){

                // Set TextAd2
                $ad = array(
                    'accountId' => $adGroupAdValue->adGroupAd->accountId,
                    'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                    'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                    'adId' => $adGroupAdValue->adGroupAd->adId,
                    'adName' => 'SampleTextAd2_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                    'ad' => array(
                        'type' => 'TEXT_AD2',
                        'headline' => 'mod sample headline',
                        'description' => 'mod sample ad desc',
                        'description2' => 'mod sample ad desc2',
                        'url' => 'http://www.yahoo.mod.co.jp/',
                        'displayUrl' => 'www.yahoo.mod.co.jp'
                    ),
                    'userStatus' => 'PAUSED'
                );

                // xsi:typ for ad of TextAd2
                $ad['ad'] = new SoapVar($ad['ad'], SOAP_ENC_OBJECT, 'TextAd2', API_NS, 'ad', XMLSCHEMANS);

            }else if($adGroupAdValue->adGroupAd->ad->type === 'APP_AD'){

                // Set AppAd
                $ad = array(
                    'accountId' => $adGroupAdValue->adGroupAd->accountId,
                    'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                    'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                    'adId' => $adGroupAdValue->adGroupAd->adId,
                    'adName' => 'SampleAppAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                    'ad' => array(
                        'type' => 'APP_AD',
                        'headline' => 'mod sample',
                        'description' => 'mod sample ad desc',
                        'description2' => 'mod sample ad desc2',
                        'url' => 'http://www.yahoo.mod.co.jp/',
                        'displayUrl' => 'www.yahoo.mod.co.jp'
                    ),
                    'userStatus' => 'PAUSED'
                );

                // xsi:typ for ad of AppAd
                $ad['ad'] = new SoapVar($ad['ad'], SOAP_ENC_OBJECT, 'AppAd', API_NS, 'ad', XMLSCHEMANS);
            }

            $operands[] = $ad;
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
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return AdGroupAdOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupAdValues){

        // Create operands
        $operands = array();
        foreach($adGroupAdValues as $adGroupAdValue){

            // Create operand
            $operand = array(
                'accountId' => $adGroupAdValue->adGroupAd->accountId,
                'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                'adId' => $adGroupAdValue->adGroupAd->adId
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
     * @param long $adGroupId AdGroupID
     * @param long $appAdGroupId AppAdGroupID
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return AdGroupAdSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $adGroupAdValues){

        // Get adGroupIds
        $adIds = array();
        foreach($adGroupAdValues as $adGroupAdValue){
            if(isset($adGroupAdValue->adGroupAd)){
                $adGroupIds[] = $adGroupAdValue->adGroupAd->adId;
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
                'adGroupIds' => array(
                    $adGroupId,
                    $appAdGroupId
                ),
                'adIds' => $adIds,
                'adTypes' => array(
                    'TEXT_AD2',
//                     'MOBILE_AD',
//                     'APP_AD'
                ),
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
 * execute AdGroupAdServiceSample.
 */
try{
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $appAdGroupId = SoapUtils::getAppAdGroupId();

    // =================================================================
    // AdGroupAdService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupAdService SET
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleSetRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupAdService GET
    // =================================================================
    // Create selector
    $selector = $adGroupAdServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->get($selector);

    // =================================================================
    // AdGroupAdService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'REMOVE');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
