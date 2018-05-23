<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignServiceSample
{

    private $serviceName = 'CampaignService';

    /**
     * Sample Program for CampaignService MUTATE.
     *
     * @param array $operation CampaignOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignReturnValue entity.
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
            if ($returnValue->operationSucceeded != true) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for CampaignService GET.
     *
     * @param array $selector CampaignSelector entity.
     * @return array CampaignReturnValue entity.
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
            if ($returnValue->operationSucceeded != true) {
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
     * @return CampaignOperation entity.
     */
    public function createSampleAddRequest($accountId, $biddingStrategyId)
    {

        // Create operands
        $operands = array(

            // Create AutoBidding Standard Campaign
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleAutoBiddingStandardCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'STANDARD',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create ManualCpc Standard Campaign
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleManualCpcStandardCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyType' => 'MANUAL_CPC'
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'STANDARD',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create AutoBidding MobileApp Campaign for IOS
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleAutoBiddingIOSCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'MOBILE_APP',
                'appStore' => 'IOS',
                'appId' => SoapUtils::getCurrentTimestamp(),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create ManualCpc MobileApp Campaign for IOS
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleManualCpcIOSCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyType' => 'MANUAL_CPC'
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'MOBILE_APP',
                'appStore' => 'IOS',
                'appId' => SoapUtils::getCurrentTimestamp(),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),

            // Create AutoBidding MobileApp Campaign for ANDROID
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleAutoBiddingAndroidCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'MOBILE_APP',
                'appStore' => 'ANDROID',
                'appId' => 'jp.co.yahoo.' . SoapUtils::getCurrentTimestamp()
            ),

            // Create ManualCpc MobileApp Campaign for ANDROID
            array(
                'accountId' => $accountId,
                'campaignName' => 'SampleManualCpcAndroidCampaign_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'period' => 'DAILY',
                    'amount' => 1000,
                    'deliveryMethod' => 'STANDARD'
                ),
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyType' => 'MANUAL_CPC'
                ),
                'settings' => array(
                    array(
                        'type' => 'GEO_TARGET_TYPE_SETTING',
                        'positiveGeoTargetType' => 'AREA_OF_INTENT'
                    ),
                    array(
                        'type' => 'TARGET_LIST_SETTING',
                        'targetAll' => 'ACTIVE'
                    )
                ),
                'campaignType' => 'MOBILE_APP',
                'appStore' => 'ANDROID',
                'appId' => 'jp.co.yahoo.' . SoapUtils::getCurrentTimestamp()
            )
        );

        // Set xsi:type
        foreach ($operands as &$operand){
            foreach ($operand['settings'] as &$setting){
                if($setting['type'] == 'GEO_TARGET_TYPE_SETTING'){
                    $setting = SoapUtils::encodingSoapVar($setting, 'GeoTargetTypeSetting','Campaign' , 'settings');
                }else if($setting['type'] == 'TARGET_LIST_SETTING'){
                    $setting = SoapUtils::encodingSoapVar($setting, 'TargetingSetting','Campaign' , 'settings');
                }
            }
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
     * @param long $accountId AccountID
     * @param long $biddingStrategyId BiddingStrategyID
     * @param array $campaignValues CampaignReturnValue entity.
     * @return CampaignOperation entity.
     */
    public function createSampleSetRequest($accountId, $biddingStrategyId, $campaignValues)
    {

        // Create operands
        $operands = array();
        foreach ($campaignValues as $campaignValue) {

            // Create operand
            $operand = array(
                'accountId' => $campaignValue->campaign->accountId,
                'campaignId' => $campaignValue->campaign->campaignId,
                'campaignName' => 'Sample_UpdateOn_' . $campaignValue->campaign->campaignId . '_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'amount' => 2000,
                    'deliveryMethod' => 'STANDARD'
                ),

                // Change Auto Bidding Strategy
                'biddingStrategyConfiguration' => array(
                    'biddingStrategyId' => $biddingStrategyId
                )
            );
            if ($campaignValue->campaign->campaignType == 'STANDARD') {
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
     * @param array $campaignValues CampaignReturnValue entity.
     * @return CampaignOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignValues)
    {

        // Create operands
        $operands = array();
        foreach ($campaignValues as $campaignValue) {

            // Create operand
            $operand = array(
                'accountId' => $campaignValue->campaign->accountId,
                'campaignId' => $campaignValue->campaign->campaignId
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
     * @param array $campaignValues CampaignReturnValue entity.
     * @return CampaignSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignValues)
    {

        // Get campaignIds
        $campaignIds = array();
        foreach ($campaignValues as $campaignValue) {
            if (isset($campaignValue->campaign)) {
                $campaignIds[] = $campaignValue->campaign->campaignId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignIds,
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

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute CampaignServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();

    // =================================================================
    // CampaignService ADD
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);

    // Run
    $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');

    // call 30sec sleep * 30 = 15minute
    for ($i = 0; $i < 30; $i++) {
        // sleep 30 second.
        echo "\n***** sleep 30 seconds for Campaign Review Status Check *****\n";
        sleep(30);

        // =================================================================
        // CampaignService GET
        // =================================================================
        // Create selector
        $selector = $campaignServiceSample->createSampleGetRequest($accountId, $campaignValues);

        // Run
        $campaignValues = $campaignServiceSample->get($selector);

        // status
        foreach ($campaignValues as $campaignValue) {
            if (isset($campaignValue->campaign->urlReviewData->urlApprovalStatus)) {
                $urlApprovalStatus = $campaignValue->campaign->urlReviewData->urlApprovalStatus;
                if ($urlApprovalStatus != 'APPROVED' && $urlApprovalStatus != 'NONE') {
                    if ($urlApprovalStatus === 'DISAPPROVED') {
                        echo 'Campaign Review Status failed.';
                        exit();
                    } else {
                        continue 2;
                    }
                }
            } else {
                echo 'Fail to add CampaignService.';
                exit();
            }
        }
        break;
    }

    // =================================================================
    // CampaignService SET
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleSetRequest($accountId, $biddingStrategyId, $campaignValues);

    // Run
    $campaignValues = $campaignServiceSample->mutate($operation, 'SET');

    // =================================================================
    // CampaignService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);

    // Run
    $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
