<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupServiceSample.php');

/**
 * Sample Program for AdGroupAdServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupAdServiceSample
{

    private $serviceName = 'AdGroupAdService';

    /**
     * Sample Program for AdGroupAdService MUTATE.
     *
     * @param array $operation AdGroupAdOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupAdValues entity.
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
     * Sample Program for AdGroupAdService GET.
     *
     * @param array $selector AdGroupAdSelector entity.
     * @return array AdGroupAdValues entity.
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
     * Example ExtendedText Ad entity.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @return array AdGroupAd entity.
     */
    public function createAddExtendedTextAd($accountId, $campaignId, $adGroupId)
    {
        $operand = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleExtendedTextAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'EXTENDED_TEXT_AD',
                'headline' => 'sample headline',
                'headline2' => 'sample headline2',
                'description' => 'sample ad desc',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'additionalAdvancedUrls' => array(
                    array('advancedUrl' => 'http://www1.yahoo.co.jp'),
                    array('advancedUrl' => 'http://www2.yahoo.co.jp'),
                    array('advancedUrl' => 'http://www3.yahoo.co.jp')
                ),
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'additionalAdvancedMobileUrls' => array(
                    array('advancedMobileUrl' => 'http://www1.yahoo.co.jp/mobile'),
                    array('advancedMobileUrl' => 'http://www2.yahoo.co.jp/mobile'),
                    array('advancedMobileUrl' => 'http://www3.yahoo.co.jp/mobile')
                ),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                ),
                'path1' => 'path1',
                'path2' => 'path2'
            ),
            'userStatus' => 'ACTIVE'
        );
        $operand['ad'] = SoapUtils::encodingSoapVar($operand['ad'], 'ExtendedTextAd', 'AdGroupAd', 'ad');
        return $operand;
    }

    /**
     * Example App Ad entity.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @return array AdGroupAd entity.
     */
    public function createAddAppAd($accountId, $campaignId, $adGroupId)
    {
        $operand = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleAppAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'APP_AD',
                'headline' => 'sample',
                'description' => 'sample ad desc',
                'description2' => 'sample ad desc2',
                'devicePreference' => 'SMART_PHONE',
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                )
            ),
            'userStatus' => 'ACTIVE'
        );
        $operand['ad'] = SoapUtils::encodingSoapVar($operand['ad'], 'AppAd', 'AdGroupAd', 'ad');
        return $operand;
    }

    /**
     * Example DynamicSearchLinkedAd entity.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @return array AdGroupAd entity.
     */
    public function createAddDynamicSearchLinkedAd($accountId, $campaignId, $adGroupId)
    {
        $operand = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleDynamicSearchLinkedAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'DYNAMIC_SEARCH_LINKED_AD',
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                ),
                'description' => 'sample ad desc',
            ),
            'userStatus' => 'ACTIVE'
        );
        $operand['ad'] = SoapUtils::encodingSoapVar($operand['ad'], 'DynamicSearchLinkedAd', 'AdGroupAd', 'ad');
        return $operand;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $appCampaignId AppCampaignID
     * @param string $adGroupId AdGroupID
     * @param string $appAdGroupId AppAdGroupID
     * @param string $dynamicAdsForSearchCampaignId DynamicAdsForSearchCampaignID
     * @param string $dynamicAdsForSearchAdGroupId DynamicAdsForSearchAdGroupID
     * @return array AdGroupAdOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $dynamicAdsForSearchCampaignId, $dynamicAdsForSearchAdGroupId)
    {
        // Create operation
        $operation = $this->createMutateRequest('ADD', $accountId);
        array_push($operation['operations']['operand'], $this->createAddExtendedTextAd($accountId,$campaignId,$adGroupId));
        array_push($operation['operations']['operand'], $this->createAddAppAd($accountId,$appCampaignId,$appAdGroupId));
        array_push($operation['operations']['operand'], $this->createAddDynamicSearchLinkedAd($accountId,$dynamicAdsForSearchCampaignId,$dynamicAdsForSearchAdGroupId));
        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param array $adGroupAdlues AdGroupAdValues entity.
     * @return array AdGroupAdOperation entity.
     */
    public function createSampleSetRequest($accountId, $adGroupAdValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {

            // Create operand
            $ad = array();

            // Set Ad
            switch ($adGroupAdValue->adGroupAd->ad->type) {
                default:
                    break;
                case 'APP_AD':
                    $ad = array(
                        'accountId' => $adGroupAdValue->adGroupAd->accountId,
                        'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                        'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                        'adId' => $adGroupAdValue->adGroupAd->adId,
                        'adName' => 'SampleAppAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                        'userStatus' => 'PAUSED'
                    );
                    break;
                case 'EXTENDED_TEXT_AD':
                    $ad = array(
                        'accountId' => $adGroupAdValue->adGroupAd->accountId,
                        'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                        'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                        'adId' => $adGroupAdValue->adGroupAd->adId,
                        'adName' => 'SampleExtendedTextAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                        'userStatus' => 'PAUSED'
                    );
                    break;
                case 'DYNAMIC_SEARCH_LINKED_AD':
                    $ad = array(
                        'accountId' => $adGroupAdValue->adGroupAd->accountId,
                        'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                        'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                        'adId' => $adGroupAdValue->adGroupAd->adId,
                        'adName' => 'SampleSampleDynamicSearchLinkedAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                        'userStatus' => 'PAUSED'
                    );
                    break;
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
     * @param string $accountId AccountID
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return array AdGroupAdOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupAdValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {

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
     * @param string $accountId AccountID
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return array AdGroupAdSelector entity.
     */
    public function createSampleGetRequest($accountId, $adGroupAdValues)
    {

        // Get adGroupIds
        $adIds = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {
            if (isset($adGroupAdValue->adGroupAd)) {
                $campaignIds[] = $adGroupAdValue->adGroupAd->campaignId;
                $adGroupIds[] = $adGroupAdValue->adGroupAd->adGroupId;
                $adIds[] = $adGroupAdValue->adGroupAd->adId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignIds,
                'adGroupIds' => $adGroupIds,
                'adIds' => $adIds,
                'adTypes' => array(
                    'TEXT_AD2',
                    'APP_AD',
                    'EXTENDED_TEXT_AD',
                    'DYNAMIC_SEARCH_LINKED_AD',
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

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute AdGroupAdServiceSample.
 */
try {
    $feedFolderServiceSample = new FeedFolderServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();
    $dynamicAdsForSearchCampaignId = 'xxxxxxxx';
    $adGroupId = SoapUtils::getAdGroupId();
    $appAdGroupId = SoapUtils::getAppAdGroupId();
    $dynamicAdsForSearchAdGroupId = 'xxxxxxxx';

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
    // CampaignService::mutate(ADD)
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcStandardCampaign($accountId));
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcMobileAppCampaignForIOS($accountId));
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcDynamicAdsForSearchCampaign($accountId, array($feedFolderId)));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            switch ($campaignValue->campaign->campaignType) {
                default :
                    break;
                case 'STANDARD' :
                    $campaignId = $campaignValue->campaign->campaignId;
                    break;
                case 'MOBILE_APP' :
                    $appCampaignId = $campaignValue->campaign->campaignId;
                    break;
                case 'DYNAMIC_ADS_FOR_SEARCH' :
                    $dynamicAdsForSearchCampaignId = $campaignValue->campaign->campaignId;
                    break;
            }
        }
    }

    // =================================================================
    // AdGroupService::mutate(ADD)
    // =================================================================
    $adGroupValues = array();
    if ($adGroupId === 'xxxxxxxx') {
        $addAdGroupRequest = $adGroupServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddStandardAdGroup($accountId, $campaignId));
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddStandardAdGroup($accountId, $dynamicAdsForSearchCampaignId));
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddAppAdGroup($accountId, $appCampaignId));
        $adGroupValues = $adGroupServiceSample->mutate($addAdGroupRequest, 'ADD');
        foreach ($adGroupValues as $adGroupValue) {
            if ($adGroupValue->adGroup->campaignId === $campaignId) {
                $adGroupId = $adGroupValue->adGroup->adGroupId;
            } elseif ($adGroupValue->adGroup->campaignId === $appCampaignId) {
                $appAdGroupId = $adGroupValue->adGroup->adGroupId;
            } elseif ($adGroupValue->adGroup->campaignId === $dynamicAdsForSearchCampaignId) {
                $dynamicAdsForSearchAdGroupId = $adGroupValue->adGroup->adGroupId;
            }
        }
    }

    // =================================================================
    // AdGroupAdService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $dynamicAdsForSearchCampaignId, $dynamicAdsForSearchAdGroupId);

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
    $selector = $adGroupAdServiceSample->createSampleGetRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->get($selector);

    // =================================================================
    // AdGroupAdService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // remove AdGroupService, Campaign
    // =================================================================
    // AdGroup
    if (count($adGroupValues) > 0) {
        $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
        $adGroupServiceSample->mutate($operation, 'REMOVE');
    }

    // Campaign
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
