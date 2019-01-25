<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Util;

use Jp\YahooApis\SS\V201901\{AccountShared\AccountSharedValues,
    AdGroup\AdGroupValues,
    AdGroupAd\AdGroupAdValues,
    AdGroupCriterion\AdGroupCriterionValues,
    BiddingStrategy\BiddingStrategyValues,
    Campaign\CampaignValues,
    FeedFolder\FeedFolderValues,
    FeedItem\FeedItemValues,
    Label\LabelValues,
    ReportDefinition\ReportDefinitionValues,
    RetargetingList\RetargetingListValues};

/**
 * Utility method collection for PHP Sample Program.
 */
class ValuesHolder
{

    /**
     * @var AccountSharedValues[] $accountSharedValuesList
     */
    private $accountSharedValuesList = [];

    /**
     * @return AccountSharedValues[]
     */
    public function getAccountSharedValuesList(): array
    {
        return $this->accountSharedValuesList;
    }

    /**
     * @param AccountSharedValues[] $accountSharedValuesList
     */
    public function setAccountSharedValuesList(array $accountSharedValuesList): void
    {
        $this->accountSharedValuesList = array_merge($this->accountSharedValuesList, $accountSharedValuesList);
    }

    /**
     * @var RetargetingListValues[] $retargetingListValuesList
     */
    private $retargetingListValuesList = [];

    /**
     * @return RetargetingListValues[]
     */
    public function getRetargetingListValuesList(): array
    {
        return $this->retargetingListValuesList;
    }

    /**
     * @param RetargetingListValues[] $retargetingListValuesList
     */
    public function setRetargetingListValuesList(array $retargetingListValuesList): void
    {
        $this->retargetingListValuesList = array_merge($this->retargetingListValuesList, $retargetingListValuesList);
    }

    /**
     * @var FeedFolderValues[] $feedFolderValuesList
     */
    private $feedFolderValuesList = [];

    /**
     * @return FeedFolderValues[]
     */
    public function getFeedFolderValuesList(): array
    {
        return $this->feedFolderValuesList;
    }

    /**
     * @param FeedFolderValues[] $feedFolderValuesList
     */
    public function setFeedFolderValuesList(array $feedFolderValuesList): void
    {
        $this->feedFolderValuesList = array_merge($this->feedFolderValuesList, $feedFolderValuesList);
    }

    /**
     * @var LabelValues[] $labelValuesList
     */
    private $labelValuesList = [];

    /**
     * @return LabelValues[]
     */
    public function getLabelValuesList(): array
    {
        return $this->labelValuesList;
    }

    /**
     * @param LabelValues[] $labelValuesList
     */
    public function setLabelValuesList(array $labelValuesList): void
    {
        $this->labelValuesList = array_merge($this->labelValuesList, $labelValuesList);
    }

    /**
     * @var BiddingStrategyValues[]
     */
    private $biddingStrategyValuesList = [];

    /**
     * @return BiddingStrategyValues[]
     */
    public function getBiddingStrategyValuesList(): array
    {
        return $this->biddingStrategyValuesList;
    }

    /**
     * @param BiddingStrategyValues[] $biddingStrategyValuesList
     */
    public function setBiddingStrategyValuesList(array $biddingStrategyValuesList): void
    {
        $this->biddingStrategyValuesList = array_merge($this->biddingStrategyValuesList, $biddingStrategyValuesList);
    }

    /**
     * @var CampaignValues[] $campaignValuesList
     */
    private $campaignValuesList = [];

    /**
     * @return CampaignValues[]
     */
    public function getCampaignValuesList(): array
    {
        return $this->campaignValuesList;
    }

    /**
     * @param CampaignValues[] $campaignValuesList
     */
    public function setCampaignValuesList(array $campaignValuesList): void
    {
        if (count($campaignValuesList) > 0) {
            $this->campaignValuesList = array_merge($this->campaignValuesList, $campaignValuesList);
        } else {
            $this->campaignValuesList = $campaignValuesList;
        }
    }

    /**
     * @var AdGroupValues[] $adGroupValuesList
     */
    private $adGroupValuesList = [];

    /**
     * @return AdGroupValues[]
     */
    public function getAdGroupValuesList(): array
    {
        return $this->adGroupValuesList;
    }

    /**
     * @param AdGroupValues[] $adGroupValuesList
     */
    public function setAdGroupValuesList(array $adGroupValuesList): void
    {
        $this->adGroupValuesList = array_merge($this->adGroupValuesList, $adGroupValuesList);
    }

    /**
     * @var AdGroupAdValues[] $adGroupAdValuesList
     */
    private $adGroupAdValuesList = [];

    /**
     * @return AdGroupAdValues[]
     */
    public function getAdGroupAdValuesList(): array
    {
        return $this->adGroupAdValuesList;
    }

    /**
     * @param AdGroupAdValues[] $adGroupAdValuesList
     */
    public function setAdGroupAdValuesList(array $adGroupAdValuesList): void
    {
        $this->adGroupAdValuesList = array_merge($this->adGroupAdValuesList, $adGroupAdValuesList);
    }

    /**
     * @var AdGroupCriterionValues[] $adGroupCriterionValuesList
     */
    private $adGroupCriterionValuesList = [];

    /**
     * @return AdGroupCriterionValues[]
     */
    public function getAdGroupCriterionValuesList(): array
    {
        return $this->adGroupCriterionValuesList;
    }

    /**
     * @param AdGroupCriterionValues[] $adGroupCriterionValuesList
     */
    public function setAdGroupCriterionValuesList(array $adGroupCriterionValuesList): void
    {
        $this->adGroupCriterionValuesList = array_merge($this->adGroupCriterionValuesList, $adGroupCriterionValuesList);
    }

    /**
     * @var FeedItemValues[] $feedItemValuesList
     */
    private $feedItemValuesList = [];

    /**
     * @return FeedItemValues[]
     */
    public function getFeedItemValuesList(): array
    {
        return $this->feedItemValuesList;
    }

    /**
     * @param FeedItemValues[] $feedItemValuesList
     */
    public function setFeedItemValuesList(array $feedItemValuesList): void
    {
        $this->feedItemValuesList = array_merge($this->feedItemValuesList, $feedItemValuesList);
    }

    /**
     * @var ReportDefinitionValues[] $reportDefinitionValuesList
     */
    private $reportDefinitionValuesList = [];

    /**
     * @return ReportDefinitionValues[]
     */
    public function getReportDefinitionValuesList(): array
    {
        return $this->reportDefinitionValuesList;
    }

    /**
     * @param ReportDefinitionValues[] $reportDefinitionValuesList
     */
    public function setReportDefinitionValuesList(array $reportDefinitionValuesList): void
    {
        $this->reportDefinitionValuesList = array_merge($this->reportDefinitionValuesList, $reportDefinitionValuesList);
    }
}
