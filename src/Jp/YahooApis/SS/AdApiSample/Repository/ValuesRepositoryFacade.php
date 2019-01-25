<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;

/**
 * Utility method collection for PHP Sample Program.
 */
class ValuesRepositoryFacade
{

    /**
     * @var ValuesHolder|null
     */
    private $valuesHolder;

    /**
     * @var AccountSharedValuesRepository
     */
    private $accountSharedValuesRepository;

    /**
     * @var RetargetingListValuesRepository
     */
    private $retargetingListValuesRepository;

    /**
     * @var FeedFolderValuesRepository
     */
    private $feedFolderValuesRepository;

    /**
     * @var LabelValuesRepository
     */
    private $labelValuesRepository;

    /**
     * @var BiddingStrategyValuesRepository
     */
    private $biddingStrategyValuesRepository;

    /**
     * @Var CampaignValuesRepository
     */
    private $campaignValuesRepository;

    /**
     * @Var AdGroupValuesRepository
     */
    private $adGroupValuesRepository;

    /**
     * @Var AdGroupAdValuesRepository
     */
    private $adGroupAdValuesRepository;

    /**
     * @Var AdGroupCriterionValuesRepository
     */
    private $adGroupCriterionValuesRepository;

    /**
     * @Var FeedItemValuesRepository
     */
    private $feedItemValuesRepository;

    /**
     * @Var ReportDefinitionValuesRepository
     */
    private $reportDefinitionValuesRepository;

    /**
     * ValuesRepositoryFacade constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
        $this->accountSharedValuesRepository = new AccountSharedValuesRepository($this->valuesHolder);
        $this->retargetingListValuesRepository = new RetargetingListValuesRepository($this->valuesHolder);
        $this->feedFolderValuesRepository = new FeedFolderValuesRepository($this->valuesHolder);
        $this->labelValuesRepository = new LabelValuesRepository($this->valuesHolder);
        $this->biddingStrategyValuesRepository = new BiddingStrategyValuesRepository($valuesHolder);
        $this->campaignValuesRepository = new CampaignValuesRepository($valuesHolder);
        $this->adGroupValuesRepository = new AdGroupValuesRepository($valuesHolder);
        $this->adGroupAdValuesRepository = new AdGroupAdValuesRepository($valuesHolder);
        $this->adGroupCriterionValuesRepository = new AdGroupCriterionValuesRepository($valuesHolder);
        $this->feedItemValuesRepository = new FeedItemValuesRepository($valuesHolder);
        $this->reportDefinitionValuesRepository = new ReportDefinitionValuesRepository($valuesHolder);
    }

    /**
     * @return ValuesHolder
     */
    public function getValuesHolder(): ValuesHolder
    {
        return $this->valuesHolder;
    }

    /**
     * @return AccountSharedValuesRepository
     */
    public function getAccountSharedValuesRepository(): AccountSharedValuesRepository
    {
        return $this->accountSharedValuesRepository;
    }

    /**
     * @return RetargetingListValuesRepository
     */
    public function getRetargetingListValuesRepository(): RetargetingListValuesRepository
    {
        return $this->retargetingListValuesRepository;
    }

    /**
     * @return FeedFolderValuesRepository
     */
    public function getFeedFolderValuesRepository(): FeedFolderValuesRepository
    {
        return $this->feedFolderValuesRepository;
    }

    /**
     * @return LabelValuesRepository
     */
    public function getLabelValuesRepository(): LabelValuesRepository
    {
        return $this->labelValuesRepository;
    }

    /**
     * @return BiddingStrategyValuesRepository
     */
    public function getBiddingStrategyValuesRepository(): BiddingStrategyValuesRepository
    {
        return $this->biddingStrategyValuesRepository;
    }

    /**
     * @return CampaignValuesRepository
     */
    public function getCampaignValuesRepository(): CampaignValuesRepository
    {
        return $this->campaignValuesRepository;
    }

    /**
     * @return AdGroupValuesRepository
     */
    public function getAdGroupValuesRepository(): AdGroupValuesRepository
    {
        return $this->adGroupValuesRepository;
    }

    /**
     * @return AdGroupAdValuesRepository
     */
    public function getAdGroupAdValuesRepository(): AdGroupAdValuesRepository
    {
        return $this->adGroupAdValuesRepository;
    }

    /**
     * @return AdGroupCriterionValuesRepository
     */
    public function getAdGroupCriterionValuesRepository(): AdGroupCriterionValuesRepository
    {
        return $this->adGroupCriterionValuesRepository;
    }

    /**
     * @return FeedItemValuesRepository
     */
    public function getFeedItemValuesRepository(): FeedItemValuesRepository
    {
        return $this->feedItemValuesRepository;
    }

    /**
     * @return ReportDefinitionValuesRepository
     */
    public function getReportDefinitionValuesRepository(): ReportDefinitionValuesRepository
    {
        return $this->reportDefinitionValuesRepository;
    }
}
