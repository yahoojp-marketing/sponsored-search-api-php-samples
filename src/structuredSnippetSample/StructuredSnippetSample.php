<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/../adSample/BiddingStrategyServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/CampaignServiceSample.php');
require_once(dirname(__FILE__) . '/../adSample/AdGroupServiceSample.php');
require_once(dirname(__FILE__) . '/../adCustomizerSample/FeedItemServiceSample.php');
require_once(dirname(__FILE__) . '/../adDisplayOptionSample/AdDisplayOptionSample.php');

/**
 * Sample Program for StructuredSnippetSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class StructuredSnippetSample
{

    /**
     * create StructuredSnippet FeedItem sample request.
     *
     * @param long $accountId AccountID
     * @return FeedItemOperation entity.
     */
    public function createSampleStructuredSnippetFeedItemAddRequest($accountId) {
        $request = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'placeholderType' => 'STRUCTURED_SNIPPET',
                'operand' => array(
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'STRUCTURED_SNIPPET_HEADER',
                            'feedAttributeValue' => 'ブランド'
                        ),
                        array(
                            'placeholderField' => 'STRUCTURED_SNIPPET_VALUES',
                            'feedAttributeValues' => array(
                                array('feedAttributeValue' => 'SampleBrand1'),
                                array('feedAttributeValue' => 'SampleBrand2'),
                                array('feedAttributeValue' => 'SampleBrand3')
                            )
                        )
                    ),
                    'startDate' => '20200101',
                    'endDate' => '20251231',
                    'scheduling' => array(
                        'schedules' => array(
                            0 => array(
                                'dayOfWeek' => 'SUNDAY',
                                'startHour' => 14,
                                'startMinute' => 'ZERO',
                                'endHour' => 15,
                                'endMinute' => 'THIRTY'
                            )
                        )
                    )
                )
            )
        );

        //xsi:type
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            switch ($feedItemAttribute['placeholderField']) {
                default:
                case 'STRUCTURED_SNIPPET_HEADER':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute','FeedItem' , 'feedItemAttribute');
                    break;
                case 'STRUCTURED_SNIPPET_VALUES':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'MultipleFeedItemAttribute','FeedItem' , 'feedItemAttribute');
                    break;
            }
        }

        return $request;
    }

    /**
     * create StructuredSnippet FeedItem sample request.
     *
     * @param long $accountId AccountID
     * @param array $feedItemValues FeedItemValues entity.
     * @return FeedItemOperation entity.
     */
    public function createSampleStructuredSnippetFeedItemSetRequest($accountId, $feedItemValues) {
        $request = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'placeholderType' => 'STRUCTURED_SNIPPET',
                'operand' => array(
                    'feedItemId' => $feedItemValues[0]->feedItem->feedItemId,
                    'feedItemAttribute' => array(
                        array(
                            'placeholderField' => 'STRUCTURED_SNIPPET_HEADER',
                            'feedAttributeValue' => 'ブランド'
                        ),
                        array(
                            'placeholderField' => 'STRUCTURED_SNIPPET_VALUES',
                            'feedAttributeValues' => array(
                                array('feedAttributeValue' => 'SampleBrand4'),
                                array('feedAttributeValue' => 'SampleBrand5'),
                                array('feedAttributeValue' => 'SampleBrand6')
                            )
                        )
                    )
                )
            )
        );

        //xsi:type
        foreach ($request['operations']['operand']['feedItemAttribute'] as &$feedItemAttribute) {
            switch ($feedItemAttribute['placeholderField']) {
                default:
                case 'STRUCTURED_SNIPPET_HEADER':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'SimpleFeedItemAttribute','FeedItem' , 'feedItemAttribute');
                    break;
                case 'STRUCTURED_SNIPPET_VALUES':
                    $feedItemAttribute = SoapUtils::encodingSoapVar($feedItemAttribute, 'MultipleFeedItemAttribute','FeedItem' , 'feedItemAttribute');
                    break;
            }
        }

        return $request;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute StructuredSnippetSample.
 */
try {
    // =================================================================
    // Setting
    // =================================================================
    $biddingStrategyServiceSample = new BiddingStrategyServiceSample();
    $campaignServiceSample = new CampaignServiceSample();
    $adGroupServiceSample = new AdGroupServiceSample();
    $feedItemServiceSample = new FeedItemServiceSample();
    $structuredSnippetSample = new StructuredSnippetSample();
    $adDisplayOptionSample = new AdDisplayOptionSample();

    $accountId = SoapUtils::getAccountId();
    $biddingStrategyId = SoapUtils::getBiddingStrategyId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $feedItemId = null;
    $placeholderType = null;

    // =================================================================
    // BiddingStrategyService::mutate(ADD)
    // =================================================================
    $biddingStrategyValues = array();
    if ($biddingStrategyId === 'xxxxxxxx') {
        $operation = $biddingStrategyServiceSample->createSampleAddRequest($accountId);
        $biddingStrategyValues = $biddingStrategyServiceSample->mutate($operation, 'ADD');
        foreach ($biddingStrategyValues as $biddingStrategyValue) {
            switch ($biddingStrategyValue->biddingStrategy->biddingStrategyType) {
                default :
                    break;
                case 'PAGE_ONE_PROMOTED' :
                    $biddingStrategyId = $biddingStrategyValue->biddingStrategy->biddingStrategyId;
                    break 2;
            }
        }

        // sleep 30 second.
        sleep(30);
    }

    // =================================================================
    // CampaignService::mutate(ADD)
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $operation = $campaignServiceSample->createSampleAddRequest($accountId, $biddingStrategyId);
        $campaignValues = $campaignServiceSample->mutate($operation, 'ADD');
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
    // AdGroupService::mutate(ADD)
    // =================================================================
    $adGroupValues = array();
    if ($adGroupId === 'xxxxxxxx') {
        $operation = $adGroupServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId);
        $adGroupValues = $adGroupServiceSample->mutate($operation, 'ADD');
        foreach ($adGroupValues as $adGroupValue) {
            if ($adGroupValue->adGroup->campaignId === $campaignId) {
                $adGroupId = $adGroupValue->adGroup->adGroupId;
                break;
            }
        }
    }

    // =================================================================
    // FeedItemService
    // =================================================================
    // ADD
    $operation = $structuredSnippetSample->createSampleStructuredSnippetFeedItemAddRequest($accountId);
    $feedItemValues = $feedItemServiceSample->mutate($operation, 'ADD');

    // GET
    $feedItemValues = $feedItemServiceSample->getFeedItem($accountId, $feedItemValues);

    // SET
    $operation = $structuredSnippetSample->createSampleStructuredSnippetFeedItemSetRequest($accountId, $feedItemValues);
    $feedItemValues = $feedItemServiceSample->mutate($operation, 'SET');
    $feedItemId = $feedItemValues[0]->feedItem->feedItemId;
    $placeholderType = $feedItemValues[0]->feedItem->placeholderType;

    // =================================================================
    // CampaignFeedService
    // =================================================================
    // SET
    $operation = $adDisplayOptionSample->createCampaignFeedSampleSetRequest($accountId, $campaignId, $feedItemId, $placeholderType);
    $campaignFeedValues = $adDisplayOptionSample->mutate($operation, 'set', "CampaignFeedService");

    // GET
    $selector = $adDisplayOptionSample->createCampaignFeedSampleGetRequest($accountId, $campaignId, $feedItemId);
    $campaignFeedValues = $adDisplayOptionSample->get($selector, "CampaignFeedService");

    // =================================================================
    // AdGroupFeedService
    // =================================================================
    // SET
    $operation = $adDisplayOptionSample->createAdGroupFeedSampleSetRequest($accountId, $campaignId, $adGroupId, $feedItemId, $placeholderType);
    $adGroupFeedValues = $adDisplayOptionSample->mutate($operation, 'set', "AdGroupFeedService");

    // GET
    $selector = $adDisplayOptionSample->createAdGroupFeedSampleGetRequest($accountId, $campaignId, $adGroupId, $feedItemId);
    $campaignFeedValues = $adDisplayOptionSample->get($selector, 'AdGroupFeedService');

    // =================================================================
    // remove FeefItemService, AdGroupService, Campaign, BiddingStrategy
    // =================================================================
    // FeefItemService
    $operation = $feedItemServiceSample->removeFeedItem($accountId, $feedItemValues);

    // AdGroup
    if(count($adGroupValues) > 0) {
        $operation = $adGroupServiceSample->createSampleRemoveRequest($accountId, $adGroupValues);
        $adGroupServiceSample->mutate($operation, 'REMOVE');
    }

    // Campaign
    if(count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    }

    // BiddingStrategy
    if(count($biddingStrategyValues) > 0) {
        $operation = $biddingStrategyServiceSample->createSampleRemoveRequest($accountId, $biddingStrategyValues);
        $biddingStrategyServiceSample->mutate($operation, 'REMOVE');
    }
} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
