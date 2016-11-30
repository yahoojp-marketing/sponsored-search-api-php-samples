<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BidLandscapeService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class BidLandscapeServiceSample
{

    private $serviceName = 'BidLandscapeService';

    /**
     * Sample Program for BidLandscapeService GET.
     *
     * @param array $selector BidLandscapeSelector entity.
     * @return array BidLandscapeValues entity.
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
     * @param long $campaignId CampaignID
     * @param long $adGroupId AdGroupID
     * @param array $adGroupCriterionIds AdGroupCriterionIDs
     * @return AccountSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionIds)
    {

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionIds' => $adGroupCriterionIds,
                'simType' => 'CRITERION'
            )
        );

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute BidLandscapeServiceSample.
 */
try {
    $bidLandscapeServiceSample = new BidLandscapeServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $adGroupCriterionIds = explode(',', SoapUtils::getAdGroupCriterionIds());

    // =================================================================
    // BidLandscapeService
    // =================================================================
    // Create selector
    $selector = $bidLandscapeServiceSample->createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionIds);

    // Run
    $bidLandscapeServiceSample->get($selector);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
