<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/BiddingStrategyServiceSample.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');


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
     * Example Mutate Request Base.
     *
     * @param string $operator Operator
     * @param string $accountId Account ID
     * @return array Mutate entity.
     */
    public function createMutateRequest($operator, $accountId)
    {
        return array(
            'operations' => array(
                'operator' => $operator,
                'accountId' => $accountId,
                'operand' => array()
            )
        );
    }

    /**
     * Example AutoBidding Standard Campaign entity.
     *
     * @param string $accountId Account ID
     * @param string $biddingStrategyId Bidding Strategy ID
     * @return  array Campaign entity.
     */
    public function createAddAutoBiddingStandardCampaign($accountId, $biddingStrategyId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example ManualCpc Standard Campaign entity.
     *
     * @param string $accountId Account ID
     * @return  array Campaign entity.
     */
    public function createAddManualCpcStandardCampaign($accountId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example AutoBidding MobileApp Campaign for IOS entity.
     *
     * @param string $accountId Account ID
     * @param string $biddingStrategyId Bidding Strategy ID
     * @return  array Campaign entity.
     */
    public function createAddAutoBiddingMobileAppCampaignForIOS($accountId, $biddingStrategyId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example ManualCpc MobileApp Campaign for IOS entity.
     *
     * @param string $accountId Account ID
     * @return  array Campaign entity.
     */
    public function createAddManualCpcMobileAppCampaignForIOS($accountId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example AutoBidding MobileApp Campaign for ANDROID entity.
     *
     * @param string $accountId Account ID
     * @param string $biddingStrategyId Bidding Strategy ID
     * @return  array Campaign entity.
     */
    public function createAddAutoBiddingMobileAppCampaignForANDROID($accountId, $biddingStrategyId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example ManualCpc MobileApp Campaign for ANDROID entity.
     *
     * @param string $accountId Account ID
     * @return  array Campaign entity.
     */
    public function createAddManualCpcMobileAppCampaignForANDROID($accountId)
    {
        $operand = array(
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
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'GeoTargetTypeSetting', 'Campaign', 'settings');
        $operand['settings'][1] = SoapUtils::encodingSoapVar($operand['settings'][1], 'TargetingSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * Example ManualCpc Dynamic Ads for Search Campaign entity.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderIds FeedFolderIds
     * @return  array Campaign entity.
     */
    public function createAddManualCpcDynamicAdsForSearchCampaign($accountId, array $feedFolderIds)
    {
        $operand = array(
            'accountId' => $accountId,
            'campaignName' => 'SampleManualCpcDynamicAdsForSearchCampaign_' . SoapUtils::getCurrentTimestamp(),
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
                    'type' => 'DYNAMIC_ADS_FOR_SEARCH_SETTING',
                    'feedFolderIds' => $feedFolderIds
                )
            ),
            'campaignType' => 'DYNAMIC_ADS_FOR_SEARCH'
        );
        $operand['settings'][0] = SoapUtils::encodingSoapVar($operand['settings'][0], 'DynamicAdsForSearchSetting', 'Campaign', 'settings');
        return $operand;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $biddingStrategyId BiddingStrategyID
     * @param array $feedFolderIds FeedFolderIds
     * @return array CampaignOperation entity.
     */
    public function createSampleAddRequest($accountId, $biddingStrategyId, $feedFolderIds)
    {
        // Create operation
        $operation = $this->createMutateRequest('ADD', $accountId);
        array_push($operation['operations']['operand'], $this->createAddAutoBiddingStandardCampaign($accountId, $biddingStrategyId));
        array_push($operation['operations']['operand'], $this->createAddManualCpcStandardCampaign($accountId));
        array_push($operation['operations']['operand'], $this->createAddAutoBiddingMobileAppCampaignForIOS($accountId, $biddingStrategyId));
        array_push($operation['operations']['operand'], $this->createAddManualCpcMobileAppCampaignForIOS($accountId));
        array_push($operation['operations']['operand'], $this->createAddAutoBiddingMobileAppCampaignForANDROID($accountId, $biddingStrategyId));
        array_push($operation['operations']['operand'], $this->createAddManualCpcMobileAppCampaignForANDROID($accountId));
        array_push($operation['operations']['operand'], $this->createAddManualCpcDynamicAdsForSearchCampaign($accountId, $feedFolderIds));
        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $biddingStrategyId BiddingStrategyID
     * @param array $campaignValues CampaignReturnValue entity.
     * @return array CampaignOperation entity.
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
     * @param string $accountId AccountID
     * @param array $campaignValues CampaignReturnValue entity.
     * @return array CampaignOperation entity.
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
     * @param string $accountId AccountID
     * @param array $campaignValues CampaignReturnValue entity.
     * @return array CampaignSelector entity.
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
    // =================================================================
    // Setting
    // =================================================================
    $biddingStrategyServiceSample = new BiddingStrategyServiceSample();
    $feedFolderServiceSample = new FeedFolderServiceSample();
    $campaignServiceSample = new CampaignServiceSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();
    $feedFolderId = SoapUtils::getFeedFolderId();

    // =================================================================
    // BiddingStrategyService::mutate(ADD)
    // =================================================================
    $biddingStrategyValues = array();
    if ($biddingStrategyId === 'xxxxxxxx') {
        $addBiddingStrategyRequest = $biddingStrategyServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addBiddingStrategyRequest['operations']['operand'], $biddingStrategyServiceSample->createPageOnePromotedBidding($accountId));
        $biddingStrategyValues = $biddingStrategyServiceSample->mutate($addBiddingStrategyRequest, 'ADD');
        foreach ($biddingStrategyValues as $biddingStrategyValue) {
            $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
        }

        // sleep 30 second.
        sleep(30);
    }

    // =================================================================
    // FeedFolderService::mutate(ADD)
    // =================================================================
    $feedFolderValues = array();
    if ($feedFolderId === 'xxxxxxxx') {
        $feedFolderAddRequest = $feedFolderServiceSample->createMutateRequest('ADD', $accountId);
        array_push($feedFolderAddRequest['operations']['operand'], $feedFolderServiceSample->createAddDynamicAdForSearchFeedFolder($accountId));
        $feedFolderValues = $feedFolderServiceSample->mutate($feedFolderAddRequest, 'ADD');
        foreach ($feedFolderValues as $feedFolderValue) {
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
        }
    }

    // =================================================================
    // CampaignService ADD
    // =================================================================
    // Create operands
    $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId, array($feedFolderId));

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

    // =================================================================
    // remove BiddingStrategy, FeedFolder
    // =================================================================
    if (count($biddingStrategyValues) > 0) {
        $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);
        $biddingStrategyServiceSample->mutate($operation, 'REMOVE');
    }
    if (count($feedFolderValues) > 0) {
        $feedFolderServiceSample->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
