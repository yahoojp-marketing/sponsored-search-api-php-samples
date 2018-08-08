<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/FeedFolderServiceSample.php');

/**
 * Sample Program for FeedItemServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class FeedItemServiceSample
{

    private $serviceName = 'FeedItemService';

    /**
     * Sample Program for FeedItemService MUTATE.
     *
     * @param array $operation FeedItemOperation entity.
     * @param string $method Operator enum.
     * @return array FeedItemReturnValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {
        // Call API
        $feedItemService = SoapUtils::getService($this->serviceName);
        $feedItemResponse = $feedItemService->invoke('mutate', $operation);

        // Response
        if (isset($feedItemResponse->rval->values)) {
            if (is_array($feedItemResponse->rval->values)) {
                $feedItemReturnValues = $feedItemResponse->rval->values;
            } else {
                $feedItemReturnValues = array(
                    $feedItemResponse->rval->values
                );
            }
        } else {
            throw new Exception("No response of " . $method . " FeedItemService.");
        }

        // Error
        foreach ($feedItemReturnValues as $feedItemReturnValue) {
            if (!isset($feedItemReturnValue->feedItem)) {
                throw new Exception("Fail to " . $method . " FeedItemService.");
            }
        }

        return $feedItemReturnValues;
    }

    /**
     * Sample Program for FeedItemService GET.
     *
     * @param array $selector FeedItemSelector entity.
     * @return array FeedItemReturnValue entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $feedItemService = SoapUtils::getService($this->serviceName);
        $feedItemResponse = $feedItemService->invoke('get', $selector);

        // Response
        if (isset($feedItemResponse->rval->values)) {
            if (is_array($feedItemResponse->rval->values)) {
                $feedItemReturnValues = $feedItemResponse->rval->values;
            } else {
                $feedItemReturnValues = array(
                    $feedItemResponse->rval->values
                );
            }
        } else {
            throw new Exception("No response of get FeedItemService.");
        }

        // Error
        foreach ($feedItemReturnValues as $feedItemReturnValue) {
            if (!isset($feedItemReturnValue->feedItem)) {
                throw new Exception("Fail to get FeedItemService.");
            }
        }

        return $feedItemReturnValues;
    }

    /**
     * Sample Program for FeedItemService(AD_CUSTOMIZER) ADD.
     *
     * @param string $accountId Account ID
     * @param string $campaignId Campaign ID
     * @param string $adGroupId AdGroup ID
     * @param string $feedFolderId FeedFolder ID
     * @param array $feedAttributeId FeedAttributeId ID
     * @return array FeedItemValues entity
     * @throws Exception
     */
    public function addFeedItem($accountId, $campaignId, $adGroupId, $feedFolderId, $feedAttributeId)
    {
        // Set Operand
        $operand = array(
            // Set AdCustomizer
            'accountId' => $accountId,
            'feedFolderId' => $feedFolderId,
            'feedItemAttribute' => array(
                array(
                    'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_INTEGER'],
                    'feedAttributeValue' => '1234567890'
                ),
                array(
                    'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_PRICE'],
                    'feedAttributeValue' => '9,999,999.99'
                ),
                array(
                    'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_DATE'],
                    'feedAttributeValue' => '20151231 235959'
                ),
                array(
                    'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_STRING'],
                    'feedAttributeValue' => 'sample Value'
                )
            ),
            'placeholderType' => 'AD_CUSTOMIZER',
            'startDate' => date('Ymd'),
            'endDate' => date("Ymd", strtotime("+1 month")),
            'scheduling' => array(
                'schedules' => array(
                    array(
                        'dayOfWeek' => 'SUNDAY',
                        'startHour' => 14,
                        'startMinute' => 'ZERO',
                        'endHour' => 15,
                        'endMinute' => 'THIRTY'
                    ),
                    array(
                        'dayOfWeek' => 'MONDAY',
                        'startHour' => 14,
                        'startMinute' => 'ZERO',
                        'endHour' => 15,
                        'endMinute' => 'THIRTY'
                    )
                )
            ),
            'targetingCampaign' => array(
                'targetingCampaignId' => $campaignId
            ),
            'targetingAdGroup' => array(
                'targetingAdGroupId' => $adGroupId
            ),
            'targetingKeyword' => array(
                'text' => 'sample keyword',
                'matchType' => 'EXACT'
            ),
            'geoTargeting' => array(
                'type' => 'LOCATION',
                'geoTargetingRestriction' => 'LOCATION_OF_PRESENCE',
                'targetId' => 'JP-01-0010'
            )
        );

        // Set Request
        $feedItemRequest = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'placeholderType' => 'AD_CUSTOMIZER',
                'operand' => $operand
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($feedItemRequest['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
        }

        return $this->mutate($feedItemRequest, 'ADD');
    }

    /**
     * Sample Program for FeedItemService(AD_CUSTOMIZER) Set.
     *
     * @param string $accountId Account ID
     * @param array $feedAttributeId FeedAttributeId ID
     * @param array $feedItemValues FeedItemValues entity for set.
     * @return array FeedItemValues entity
     * @throws Exception
     */
    public function setFeedItem($accountId, $feedAttributeId, $feedItemValues)
    {
        // Set Operand
        $operand = array();
        foreach ($feedItemValues as $feedItemValue) {

            $operand = array(
                // Set AdCustomizer
                'accountId' => $accountId,
                'feedItemId' => $feedItemValue->feedItem->feedItemId,
                'feedItemAttribute' => array(
                    array(
                        'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_INTEGER'],
                        'feedAttributeValue' => '2345678901'
                    ),
                    array(
                        'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_PRICE'],
                        'feedAttributeValue' => '1,111,111.11'
                    ),
                    array(
                        'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_DATE'],
                        'feedAttributeValue' => '20160101 235959'
                    ),
                    array(
                        'feedAttributeId' => $feedAttributeId['AD_CUSTOMIZER_STRING'],
                        'feedAttributeValue' => 'sample edit value'
                    )
                ),
                'placeholderType' => 'AD_CUSTOMIZER',
                'startDate' => '',
                'endDate' => '',
                'scheduling' => '',
                // delete GeoTargeting
                'geoTargeting' => array(
                    'isRemove' => 'TRUE'
                )
            );
        }

        // Set Request
        $feedItemRequest = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'placeholderType' => 'AD_CUSTOMIZER',
                'operand' => $operand
            )
        );

        //xsi:type for SimpleFeedItemAttribute
        foreach ($feedItemRequest['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute', 'FeedItem', 'feedItemAttribute');
        }

        return $this->mutate($feedItemRequest, 'SET');
    }

    /**
     * Sample Program for FeedItemService Remove.
     *
     * @param string $accountId Account ID
     * @param array $feedItemValues FeedItemValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    public function removeFeedItem($accountId, $feedItemValues)
    {
        // Set Operand
        $operand = array();
        foreach ($feedItemValues as $feedItemValue) {
            $operand = array(
                array(
                    'accountId' => $accountId,
                    'feedItemId' => $feedItemValue->feedItem->feedItemId,
                    'placeholderType' => $feedItemValue->feedItem->placeholderType
                )
            );
            $placeholderType = $feedItemValue->feedItem->placeholderType;
        }

        // Set Request
        $feedItemRequest = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'placeholderType' => $placeholderType,
                'operand' => $operand
            )
        );

        return $this->mutate($feedItemRequest, 'REMOVE');
    }

    /**
     * Sample Program for FeedItemService Get.
     *
     * @param string $accountId Account ID
     * @param array $feedItemValues FeedItemValues entity for set.
     * @return array FeedItemValues entity
     * @throws Exception
     */
    public function getFeedItem($accountId, $feedItemValues)
    {
        // Set feedItemIds
        $feedItemIds = array();
        foreach ($feedItemValues as $feedItemValue) {
            $feedItemIds[] = $feedItemValue->feedItem->feedItemId;
        }

        // Set Selector
        $feedItemRequest = array(
            'selector' => array(
                'accountId' => $accountId,
                'feedItemIds' => $feedItemIds,
                'placeholderTypes' => array(
                    'QUICKLINK',
                    'CALLEXTENSION',
                    'AD_CUSTOMIZER',
                    'CALLOUT',
                    'STRUCTURED_SNIPPET',
                ),
                'approvalStatuses' => array(
                    'APPROVED',
                    'REVIEW',
                    'PRE_DISAPPROVED',
                    'APPROVED_WITH_REVIEW',
                    'POST_DISAPPROVED'
                ),
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        return $this->get($feedItemRequest);
    }

    /**
     * Sample Program for FeedItemService Get.
     *
     * @param string $accountId Account ID
     * @param array $feedItemValues FeedItemValues entity for set.
     * @return array FeedItemValues entity
     * @throws Exception
     */
    public function checkApprovalStatus($accountId, $feedItemValues)
    {
        // call 30sec sleep * 30 = 15minute
        for ($i = 0; $i < 30; $i++) {
            // sleep 30 second.
            echo "\n***** sleep 30 seconds for Feed Item Review Status Check *****\n";
            sleep(30);

            // FeedItemServiceSample GET
            $feedItemValues = $this->getFeedItem($accountId, $feedItemValues);

            // status
            foreach ($feedItemValues as $feedItemValue) {
                if (isset($feedItemValue->feedItem->approvalStatus)) {
                    $approvalStatus = $feedItemValue->feedItem->approvalStatus;
                    if ($approvalStatus != 'APPROVED') {
                        if ($approvalStatus === 'PRE_DISAPPROVED' || $approvalStatus === 'POST_DISAPPROVED') {
                            echo 'Feed Item Review Status failed.';
                            exit();
                        } else {
                            continue 2;
                        }
                    } else {
                        return $feedItemValues;
                    }
                } else {
                    echo 'Fail to add FeedItemService.';
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
 * FeedItemServiceSample
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $feedFolderServiceSample = new FeedFolderServiceSample();
    $feedItemServiceSample = new FeedItemServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $feedFolderId = SoapUtils::getFeedFolderId();
    $feedAttributeIds = array(
        'AD_CUSTOMIZER_INTEGER' => SoapUtils::getIntegerFeedAttributeId(),
        'AD_CUSTOMIZER_PRICE' => SoapUtils::getPriceFeedAttributeId(),
        'AD_CUSTOMIZER_DATE' => SoapUtils::getDateFeedAttributeId(),
        'AD_CUSTOMIZER_STRING' => SoapUtils::getStringFeedAttributeId()
    );

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

    //=================================================================
    // FeedFolderService::mutate(ADD)
    //=================================================================
    $feedFolderValues = array();
    if ($feedFolderId === 'xxxxxxxx') {
        $feedFolderAddRequest = $feedFolderServiceSample->createMutateRequest('ADD', $accountId);
        array_push($feedFolderAddRequest['operations']['operand'], $feedFolderServiceSample->createAddAdCustomizerFeedFolder($accountId));
        $feedFolderValues = $feedFolderServiceSample->mutate($feedFolderAddRequest, 'ADD');
        foreach ($feedFolderValues as $feedFolderValue) {
            $feedFolderId = $feedFolderValue->feedFolder->feedFolderId;
            foreach ($feedFolderValue->feedFolder->feedAttribute as $feedAttribute) {
                $feedAttributeIds[$feedAttribute->placeholderField] = $feedAttribute->feedAttributeId;
            }
        }
    }

    //=================================================================
    // FeedItemServiceSample
    //=================================================================
    // ADD
    $feedItemValues = $feedItemServiceSample->addFeedItem($accountId, $campaignId, $adGroupId, $feedFolderId, $feedAttributeIds);

    // FeedItemServiceSample GET
    $feedItemServiceSample->checkApprovalStatus($accountId, $feedItemValues);

    // FeedItemServiceSample(AD_CUSTOMIZER) SET
    $feedItemServiceSample->setFeedItem($accountId, $feedAttributeIds, $feedItemValues);

    // FeedItemServiceSample REMOVE
    $feedItemServiceSample->removeFeedItem($accountId, $feedItemValues);

    // =================================================================
    // remove FeedFolder, AdGroup, Campaign
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

    // FeedFolderService
    if(count($feedFolderValues) > 0) {
        $feedFolderServiceSample->removeFeedFolder($accountId, $feedFolderValues);
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}