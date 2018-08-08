<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/AdGroupServiceSample.php');

/**
 * Sample Program for AdGroupCriterionServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupCriterionServiceSample
{

    private $serviceName = 'AdGroupCriterionService';

    /**
     * Sample Program for AdGroupCriterionService MUTATE.
     *
     * @param array $operation AdGroupCriterionOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupCriterionValues entity.
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
            if (!isset($returnValue->adGroupCriterion)) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupCriterionService GET.
     *
     * @param array $selector AdGroupCriterionSelector entity.
     * @return array AdGroupCriterionValues entity.
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
            if (!isset($returnValue->adGroupCriterion)) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @return array AdGroupOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $adGroupId)
    {

        // Create operands
        $operands = array(
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
                'criterion' => array(
                    'type' => 'KEYWORD',
                    'text' => 'sample text',
                    'matchType' => 'PHRASE'
                ),
                'userStatus' => 'ACTIVE',
                'destinationUrl' => 'http://www.yahoo.co.jp/',
                'biddingStrategyConfiguration' => array(
                    'bid' => array(
                        'maxCpc' => 100
                    )
                ),
                'advancedUrl' => 'http://www.yahoo.co.jp',
                'additionalAdvancedUrls' => array(
                    'additionalAdvancedUrl' => array(
                        array('url' => 'http://www1.yahoo.co.jp'),
                        array('url' => 'http://www2.yahoo.co.jp'),
                        array('url' => 'http://www3.yahoo.co.jp')
                    ),
                ),
                'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                'additionalAdvancedMobileUrls' => array(
                    'additionalAdvancedMobileUrl' => array(
                        array('url' => 'http://www1.yahoo.co.jp/mobile'),
                        array('url' => 'http://www2.yahoo.co.jp/mobile'),
                        array('url' => 'http://www3.yahoo.co.jp/mobile')
                    ),
                ),
                'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '1234'
                    )
                ),
            )
        );

        // Set xsi:type
        $operands[0]['criterion'] = SoapUtils::encodingSoapVar($operands[0]['criterion'], 'Keyword','AdGroupCriterion' , 'criterion');
        $operands[0] = SoapUtils::encodingSoapVar($operands[0], 'BiddableAdGroupCriterion','AdGroupCriterion' , 'operand');

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return array AdGroupOperation entity.
     */
    public function createSampleSetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupCriterionValues as $adGroupCriterionValue) {

            // Create operand
            $operand = array(
                'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
                'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
                'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
                'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
                'criterion' => array(
                    'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                    'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type
                ),
                'userStatus' => 'PAUSED',
                'biddingStrategyConfiguration' => array(
                    'bid' => array(
                        'maxCpc' => 150
                    )
                ),
                'destinationUrl' => 'http://www.yahoo2.co.jp/',
                'advancedUrl' => 'http://www.yahoo2.co.jp',
                'additionalAdvancedUrls' => array(
                    'additionalAdvancedUrl' => array(
                        array('url' => 'http://www1.yahoo2.co.jp'),
                        array('url' => 'http://www2.yahoo2.co.jp'),
                        array('url' => 'http://www3.yahoo2.co.jp')
                    ),
                ),
                'advancedMobileUrl' => 'http://www.yahoo2.co.jp/mobile',
                'additionalAdvancedMobileUrls' => array(
                    'additionalAdvancedMobileUrl' => array(
                        array('url' => 'http://www1.yahoo2.co.jp/mobile'),
                        array('url' => 'http://www2.yahoo2.co.jp/mobile'),
                        array('url' => 'http://www3.yahoo2.co.jp/mobile')
                    ),
                ),
                'trackingUrl' => 'http://www.yahoo2.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                'customParameters' => array(
                    'parameters' => array(
                        'key' => 'id1',
                        'value' => '5678'
                    )
                )
            );

            // Set xsi:type
            $operand['criterion'] = SoapUtils::encodingSoapVar($operand['criterion'], 'Keyword','AdGroupCriterion' , 'criterion');
            $operand = SoapUtils::encodingSoapVar($operand, 'BiddableAdGroupCriterion','AdGroupCriterion' , 'operand');

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return array AdGroupOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupCriterionValues as $adGroupCriterionValue) {

            // Create operand
            $operand = array(
                'accountId' => $adGroupCriterionValue->adGroupCriterion->accountId,
                'campaignId' => $adGroupCriterionValue->adGroupCriterion->campaignId,
                'adGroupId' => $adGroupCriterionValue->adGroupCriterion->adGroupId,
                'criterionUse' => $adGroupCriterionValue->adGroupCriterion->criterionUse,
                'criterion' => array(
                    'criterionId' => $adGroupCriterionValue->adGroupCriterion->criterion->criterionId,
                    'type' => $adGroupCriterionValue->adGroupCriterion->criterion->type
                )
            );

            array_push($operands, $operand);
        }

        // Set xsi:type
        $operands[0]['criterion'] = SoapUtils::encodingSoapVar($operands[0]['criterion'], 'Keyword','AdGroupCriterion' , 'criterion');
        $operands[0] = SoapUtils::encodingSoapVar($operands[0], 'BiddableAdGroupCriterion','AdGroupCriterion' , 'operand');

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'criterionUse' => 'BIDDABLE',
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return array AdGroupCriterionSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
    {

        // Get criterionIds
        $criterionIds = array();
        foreach ($adGroupCriterionValues as $adGroupCriterionValue) {
            if (isset($adGroupCriterionValue->adGroupCriterion)) {
                $criterionIds[] = $adGroupCriterionValue->adGroupCriterion->criterion->criterionId;
            }
        }

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
                'criterionIds' => $criterionIds,
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

    /**
     * Sample Program for FeedItemService Get.
     *
     * @param string $accountId AccountID
     * @param string $campaignId CampaignID
     * @param string $adGroupId AdGroupID
     * @param array $adGroupCriterionValues AdGroupCriterionValues entity.
     * @return array AdGroupOperation entity.
     * @throws Exception
     */
    public function checkApprovalStatus($accountId, $campaignId, $adGroupId, $adGroupCriterionValues)
    {
        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {
            // sleep 30 second.
            echo "\n***** sleep 30 seconds for AdGroupCriterion Review Status Check *****\n";
            sleep(30);

            // =================================================================
            // AdGroupCriterionService GET
            // =================================================================
            // Create selector
            $selector = $this->createSampleGetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

            // Run
            $adGroupCriterionValues = $this->get($selector);

            // status
            foreach ($adGroupCriterionValues as $adGroupCriterionValue) {
                if (isset($adGroupCriterionValue->adGroupCriterion->approvalStatus)) {
                    $approvalStatus = $adGroupCriterionValue->adGroupCriterion->approvalStatus;
                    if ($approvalStatus != 'APPROVED') {
                        if ($approvalStatus === 'PRE_DISAPPROVED' || $approvalStatus === 'POST_DISAPPROVED') {
                            echo 'AdGroupCriterion Review Status failed.';
                            exit();
                        } else {
                            continue 2;
                        }
                    }else{
                        return $adGroupCriterionValues;
                    }
                } else {
                    echo 'Fail to add AdGroupCriterionService.';
                    exit();
                }
            }
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute AdGroupCriterionServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $adGroupCriterionServiceSample = new AdGroupCriterionServiceSample();

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
    // AdGroupCriterionService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleAddRequest($accountId, $campaignId, $adGroupId);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupCriterionService GET
    // =================================================================
    $adGroupCriterionServiceSample->checkApprovalStatus($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // =================================================================
    // AdGroupCriterionService SET
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleSetRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupCriterionService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupCriterionServiceSample->createSampleRemoveRequest($accountId, $campaignId, $adGroupId, $adGroupCriterionValues);

    // Run
    $adGroupCriterionValues = $adGroupCriterionServiceSample->mutate($operation, 'REMOVE');

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

