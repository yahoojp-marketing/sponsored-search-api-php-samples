<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');

/**
 * Sample Program for AdGroupServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupServiceSample
{

    private $serviceName = 'AdGroupService';

    /**
     * Sample Program for AdGroupService MUTATE.
     *
     * @param array $operation AdGroupOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupValues entity.
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
     * Sample Program for AdGroupService GET.
     *
     * @param array $selector AdGroupSelector entity.
     * @return array AdGroupValues entity.
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
     * Example Standard AdGroup entity.
     *
     * @param string $accountId Account ID
     * @param array $campaignId Campaign ID
     * @return  array AdGroup entity.
     */
    public function createAddStandardAdGroup($accountId, $campaignId)
    {
        return array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupName' => 'SampleStandardAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
            'customParameters' => array(
                'parameters' => array(
                    'key' => 'id1',
                    'value' => '1234'
                )
            ),
            'adGroupAdRotationMode' => array(
                'adRotationMode' => 'ROTATE_FOREVER'
            )
        );
    }

    /**
     * Example App AdGroup entity.
     *
     * @param string $accountId Account ID
     * @param array $campaignId Campaign ID
     * @return  array AdGroup entity.
     */
    public function createAddAppAdGroup($accountId, $campaignId)
    {
        return array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupName' => 'SampleAppAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'userStatus' => 'ACTIVE',
            'adGroupAdRotationMode' => array(
                'adRotationMode' => 'ROTATE_FOREVER'
            )
        );
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $appCampaignId AppCampaignID
     * @return array AdGroupOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $appCampaignId)
    {
        // Create operation
        $operation = $this->createMutateRequest('ADD', $accountId);
        array_push($operation['operations']['operand'], $this->createAddStandardAdGroup($accountId, $campaignId));
        array_push($operation['operations']['operand'], $this->createAddAppAdGroup($accountId, $appCampaignId));
        return $operation;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleSetRequest($accountId, $adGroupValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupValues as $adGroupValue) {

            // Create operand
            $operand = array(
                'accountId' => $adGroupValue->adGroup->accountId,
                'campaignId' => $adGroupValue->adGroup->campaignId,
                'adGroupId' => $adGroupValue->adGroup->adGroupId,
                'adGroupName' => 'Sample_UpdateOn_' . $adGroupValue->adGroup->adGroupId . '_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'adGroupAdRotationMode' => array(
                    'adRotationMode' => 'OPTIMIZE'
                )
            );

            if (!empty($adGroupValue->adGroup->trackingUrl)) {
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
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupValues as $adGroupValue) {

            // Create operand
            $operand = array(
                'accountId' => $adGroupValue->adGroup->accountId,
                'campaignId' => $adGroupValue->adGroup->campaignId,
                'adGroupId' => $adGroupValue->adGroup->adGroupId
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
     * @param array $adGroupValues AdGroupValues entity.
     * @return AdGroupSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues)
    {

        // Get adGroupIds
        $adGroupIds = array();
        foreach ($adGroupValues as $adGroupValue) {
            if (isset($adGroupValue->adGroup)) {
                $adGroupIds[] = $adGroupValue->adGroup->adGroupId;
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
                'adGroupIds' => $adGroupIds,
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
 * execute AdGroupServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();

    // =================================================================
    // CampaignService::mutate(ADD)
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcStandardCampaign($accountId));
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcMobileAppCampaignForIOS($accountId));
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
            }
        }
    }

    // =================================================================
    // AdGroupService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId);

    // Run
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupService SET
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleSetRequest($accountId, $adGroupValues);

    // Run
    $adGroupValues = $adGroupServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupService GET
    // =================================================================
    // Create selector
    $selector = $adGroupServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupValues);

    // Run
    $adGroupValues = $adGroupServiceSample->get($selector);

    // =================================================================
    // AdGroupService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);

    // Run
    $adGroupServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // remove Campaign
    // =================================================================
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
