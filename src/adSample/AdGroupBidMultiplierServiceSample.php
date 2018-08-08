<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupServiceSample.php');

/**
 * Sample Program for AdGroupBidMultiplierServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupBidMultiplierServiceSample
{

    private $serviceName = 'AdGroupBidMultiplierService';

    /**
     * Sample Program for AdGroupBidMultiplierService MUTATE.
     *
     * @param array $operation AdGroupBidMultiplierOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupBidMultiplierValues entity.
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
            if (!isset($returnValue->adGroupBidMultiplier)) {
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
            if (!isset($returnValue->adGroupBidMultiplier)) {
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
    public function createSampleSetRequest($accountId, $campaignId, $adGroupId)
    {

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'SMART_PHONE',
                'bidMultiplier' => '3.2'
            ),
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'TABLET',
                'bidMultiplier' => '5.2'
            ),
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'DESKTOP',
                'bidMultiplier' => '9.2'
            )
        );

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
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @return AdGroupBidMultiplierOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $adGroupId)
    {

        // Create operands
        $operands = array(
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'SMART_PHONE',
            ),
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'TABLET',
            ),
            array(
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'platformType' => 'DESKTOP',
            )
        );

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
     * @param long $adGroupId AdGroupID
     * @return AdGroupBidMultiplierSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId)
    {

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
                'platformTypes' => array(
                    'SMART_PHONE',
                    'TABLET',
                    'DESKTOP',
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
 * execute AdGroupBidMultiplierServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupBidMultiplierServiceSample = new AdGroupBidMultiplierServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // =================================================================
    // CampaignService::mutate(ADD)
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcStandardCampaign($accountId));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // =================================================================
    // AdGroupService::mutate(ADD)
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

    // =================================================================
    // AdGroupBidMultiplierService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupBidMultiplierServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId);

    // Run
    $adGroupBidMultiplierValues = $adGroupBidMultiplierServiceSample->mutate($operation, 'REMOVE');

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
