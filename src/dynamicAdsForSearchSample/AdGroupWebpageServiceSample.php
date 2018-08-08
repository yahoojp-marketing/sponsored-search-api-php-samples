<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');

/**
 * Sample Program for PageFeedItemServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupWebpageServiceSample
{

    private $serviceName = 'AdGroupWebpageService';

    /**
     * Sample Program for AdGroupWebpageService MUTATE.
     *
     * @param array $operation AdGroupWebpageOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupWebpageReturnValue entity.
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
     * Sample Program for AdGroupWebpageService GET.
     *
     * @param array $selector AdGroupWebpageSelector entity.
     * @return array AdGroupWebpageReturnValue entity.
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
     * Example AdGroup Webpage Add entity.
     *
     * @param string $accountId Account ID
     * @param string $campaignId Campaign ID
     * @param string $adGroupId AdGroup ID
     * @return array AdGroupWebpage entity.
     */
    public function createAddAdGroupWebpage($accountId, $campaignId, $adGroupId)
    {
        return array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'userStatus' => 'ACTIVE',
            'excludedType' => 'INCLUDED',
            'webpage' => array(
                'parameter' => array(
                    'conditions' => array(
                        array(
                            'type' => 'URL',
                            'argument' => 'yahoo.co.jp'
                        ),
                        array(
                            'type' => 'PAGE_TITLE',
                            'argument' => 'YahooJapan'
                        ),
                        array(
                            'type' => 'CUSTOM_LABEL',
                            'argument' => 'sample'
                        )
                    )
                )
            ),
            'bid' => array(
                'maxCpc' => 100
            )
        );
    }

    /**
     * Example AdGroup Webpage Set entity.
     *
     * @param array AdGroupWebpageValues entity.
     * @return array AdGroupWebpage entity.
     */
    public function createSetAdGroupWebpage($adGroupWebpageValues)
    {
        $operands = array();
        foreach ($adGroupWebpageValues as $value){
            array_push($operands, array(
                'campaignId' => $value->adGroupWebpage->campaignId,
                'adGroupId' => $value->adGroupWebpage->adGroupId,
                'webpage' => array(
                    'targetId' => $value->adGroupWebpage->webpage->targetId
                ),
                'bid' => array(
                    'maxCpc' => 150
                )
            ));
        }
        return $operands;
    }

    /**
     * Example AdGroup Webpage Remove entity.
     *
     * @param array AdGroupWebpageValues entity.
     * @return array AdGroupWebpage entity.
     */
    public function createRemoveCampaignWebpage($adGroupWebpageValues)
    {
        $operands = array();
        foreach ($adGroupWebpageValues as $value){
            array_push($operands, array(
                'campaignId' => $value->adGroupWebpage->campaignId,
                'adGroupId' => $value->adGroupWebpage->adGroupId,
                'webpage' => array(
                    'targetId' => $value->adGroupWebpage->webpage->targetId
                ),
                'bid' => array()
            ));
        }
        return $operands;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param array $adGroupWebpageValues AdGroupWebpageReturnValue entity.
     * @return array CampaignSelector entity.
     */
    public function createSampleGetRequest($accountId, $adGroupWebpageValues)
    {

        // Get campaignIds
        $campaignIds = array();
        $adGroupIds = array();
        $targetIds = array();
        foreach ($adGroupWebpageValues as $value) {
            if (isset($value->adGroupWebpage)) {
                $campaignIds[] = $value->adGroupWebpage->campaignId;
                $adGroupIds[] = $value->adGroupWebpage->adGroupId;
                $targetIds[] = $value->adGroupWebpage->webpage->targetId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignIds,
                'adGroupIds' => $adGroupIds,
                'targetIds' => $targetIds,
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
 * execute AdGroupWebpageServiceSample.
 */
try {
    $feedFolderService = new FeedFolderServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupWebpageServiceSample = new AdGroupWebpageServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getCampaignId();

    //=================================================================
    // FeedFolderService
    //=================================================================
    $feedFolderValues = array();
    if ($feedFolderId === 'xxxxxxxx') {
        $feedFolderAddRequest = $feedFolderService->createMutateRequest('ADD', $accountId);
        array_push($feedFolderAddRequest['operations']['operand'], $feedFolderService->createAddDynamicAdForSearchFeedFolder($accountId));
        $feedFolderValues = $feedFolderService->mutate($feedFolderAddRequest, 'ADD');
        foreach ($feedFolderValues as $feedFolderValue) {
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
        }
    }

    // =================================================================
    // CampaignService
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcDynamicAdsForSearchCampaign($accountId, array($feedFolderId)));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // =================================================================
    // AdGroupService
    // =================================================================
    $adGroupValues = array();
    if ($adGroupId === 'xxxxxxxx') {
        $addAdGroupRequest = $adGroupServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addAdGroupRequest['operations']['operand'], $adGroupServiceSample->createAddStandardAdGroup($accountId, $campaignId));
        $adGroupValues = $adGroupServiceSample->mutate($addAdGroupRequest, 'ADD');
        foreach ($adGroupValues as $adGroupValue) {
            $adGroupId = $adGroupValue->adGroup->adGroupId;
        }
    }

    // =================================================================
    // AdGroupWebpageService
    // =================================================================
    /*
     * add
     */
    $addAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('ADD', $accountId);
    array_push($addAdGroupWebpageRequest['operations']['operand'], $adGroupWebpageServiceSample->createAddAdGroupWebpage($accountId, $campaignId, $adGroupId));
    $adGroupWebpageValues = $adGroupWebpageServiceSample->mutate($addAdGroupWebpageRequest, 'ADD');

    /*
     * set
     */
    $setAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('SET', $accountId);
    $setAdGroupWebpageRequest['operations']['operand'] = $adGroupWebpageServiceSample->createSetAdGroupWebpage($adGroupWebpageValues);
    $adGroupWebpageServiceSample->mutate($setAdGroupWebpageRequest, 'SET');

    /*
     * remove
     */
    $removeAdGroupWebpageRequest = $adGroupWebpageServiceSample->createMutateRequest('REMOVE', $accountId);
    $removeAdGroupWebpageRequest['operations']['operand'] = $adGroupWebpageServiceSample->createRemoveCampaignWebpage($adGroupWebpageValues);
    $adGroupWebpageServiceSample->mutate($removeAdGroupWebpageRequest, 'REMOVE');

    //=================================================================
    // remove Campaign, FeedFolderService
    //=================================================================
    // Campaign
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignServiceSample->mutate($operation, 'REMOVE');
    }

    // FeedFolderService
    if (count($feedFolderValues) > 0) {
        $feedFolderService->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
