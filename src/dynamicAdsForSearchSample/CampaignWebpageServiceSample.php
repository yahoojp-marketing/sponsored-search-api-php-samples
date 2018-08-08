<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedFolderServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');

/**
 * Sample Program for PageFeedItemServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignWebpageServiceSample
{

    private $serviceName = 'CampaignWebpageService';

    /**
     * Sample Program for CampaignWebpageService MUTATE.
     *
     * @param array $operation CampaignWebpageOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignWebpageReturnValue entity.
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
     * Example Campaign Webpage Add entity.
     *
     * @param string $accountId Account ID
     * @param string $campaignId Campaign ID
     * @return array CampaignWebpage entity.
     */
    public function createAddCampaignWebpage($accountId, $campaignId)
    {
        return array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
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
            )
        );
    }

    /**
     * Example Campaign Webpage Remove entity.
     *
     * @param array CampaignWebpageValues entity.
     * @return array CampaignWebpage entity.
     */
    public function createRemoveCampaignWebpage($campaignWebpageValues)
    {
        $operands = array();
        foreach ($campaignWebpageValues as $value){
            array_push($operands, array(
                'campaignId' => $value->campaignWebpage->campaignId,
                'webpage' => array(
                    'targetId' => $value->campaignWebpage->webpage->targetId
                )
            ));
        }
        return $operands;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute CampaignWebpageServiceSample.
 */
try {
    $feedFolderService = new FeedFolderServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $campaignWebpageServiceSample = new CampaignWebpageServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $campaignId = SoapUtils::getCampaignId();

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
    // CampaignWebpageService
    // =================================================================
    /*
     * add
     */
    $addCampaignWebpageRequest = $campaignWebpageServiceSample->createMutateRequest('ADD', $accountId);
    array_push($addCampaignWebpageRequest['operations']['operand'], $campaignWebpageServiceSample->createAddCampaignWebpage($accountId, $campaignId));
    $campaignWebpageValues = $campaignWebpageServiceSample->mutate($addCampaignWebpageRequest, 'ADD');

    /*
     * remove
     */
    $removeCampaignWebpageRequest = $campaignWebpageServiceSample->createMutateRequest('REMOVE', $accountId);
    $removeCampaignWebpageRequest['operations']['operand'] = $campaignWebpageServiceSample->createRemoveCampaignWebpage($campaignWebpageValues);
    $campaignWebpageServiceSample->mutate($removeCampaignWebpageRequest, 'REMOVE');

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
