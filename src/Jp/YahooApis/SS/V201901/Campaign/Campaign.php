<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class Campaign
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var int $campaignTrackId
     */
    protected $campaignTrackId = null;

    /**
     * @var string $campaignName
     */
    protected $campaignName = null;

    /**
     * @var UserStatus $userStatus
     */
    protected $userStatus = null;

    /**
     * @var CampaignServingStatus $servingStatus
     */
    protected $servingStatus = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    /**
     * @var Budget $budget
     */
    protected $budget = null;

    /**
     * @var CampaignBiddingStrategy $biddingStrategyConfiguration
     */
    protected $biddingStrategyConfiguration = null;

    /**
     * @var BiddingStrategyFailedReason $biddingStrategyFailedReason
     */
    protected $biddingStrategyFailedReason = null;

    /**
     * @var CampaignBiddingStrategy $failedBiddingStrategyConfiguration
     */
    protected $failedBiddingStrategyConfiguration = null;

    /**
     * @var ConversionOptimizerEligibility $conversionOptimizerEligibility
     */
    protected $conversionOptimizerEligibility = null;

    /**
     * @var CampaignSettings[] $settings
     */
    protected $settings = null;

    /**
     * @var CampaignType $campaignType
     */
    protected $campaignType = null;

    /**
     * @var AppStore $appStore
     */
    protected $appStore = null;

    /**
     * @var string $appId
     */
    protected $appId = null;

    /**
     * @var string $trackingUrl
     */
    protected $trackingUrl = null;

    /**
     * @var CustomParameters $customParameters
     */
    protected $customParameters = null;

    /**
     * @var UrlReviewData $urlReviewData
     */
    protected $urlReviewData = null;

    /**
     * @var Label[] $labels
     */
    protected $labels = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->campaignId;
    }

    /**
     * @param int $campaignId
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignTrackId()
    {
      return $this->campaignTrackId;
    }

    /**
     * @param int $campaignTrackId
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setCampaignTrackId($campaignTrackId)
    {
      $this->campaignTrackId = $campaignTrackId;
      return $this;
    }

    /**
     * @return string
     */
    public function getCampaignName()
    {
      return $this->campaignName;
    }

    /**
     * @param string $campaignName
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

    /**
     * @return UserStatus
     */
    public function getUserStatus()
    {
      return $this->userStatus;
    }

    /**
     * @param UserStatus $userStatus
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setUserStatus($userStatus)
    {
      $this->userStatus = $userStatus;
      return $this;
    }

    /**
     * @return CampaignServingStatus
     */
    public function getServingStatus()
    {
      return $this->servingStatus;
    }

    /**
     * @param CampaignServingStatus $servingStatus
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setServingStatus($servingStatus)
    {
      $this->servingStatus = $servingStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setStartDate($startDate)
    {
      $this->startDate = $startDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

    /**
     * @return Budget
     */
    public function getBudget()
    {
      return $this->budget;
    }

    /**
     * @param Budget $budget
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setBudget($budget)
    {
      $this->budget = $budget;
      return $this;
    }

    /**
     * @return CampaignBiddingStrategy
     */
    public function getBiddingStrategyConfiguration()
    {
      return $this->biddingStrategyConfiguration;
    }

    /**
     * @param CampaignBiddingStrategy $biddingStrategyConfiguration
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setBiddingStrategyConfiguration($biddingStrategyConfiguration)
    {
      $this->biddingStrategyConfiguration = $biddingStrategyConfiguration;
      return $this;
    }

    /**
     * @return BiddingStrategyFailedReason
     */
    public function getBiddingStrategyFailedReason()
    {
      return $this->biddingStrategyFailedReason;
    }

    /**
     * @param BiddingStrategyFailedReason $biddingStrategyFailedReason
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setBiddingStrategyFailedReason($biddingStrategyFailedReason)
    {
      $this->biddingStrategyFailedReason = $biddingStrategyFailedReason;
      return $this;
    }

    /**
     * @return CampaignBiddingStrategy
     */
    public function getFailedBiddingStrategyConfiguration()
    {
      return $this->failedBiddingStrategyConfiguration;
    }

    /**
     * @param CampaignBiddingStrategy $failedBiddingStrategyConfiguration
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setFailedBiddingStrategyConfiguration($failedBiddingStrategyConfiguration)
    {
      $this->failedBiddingStrategyConfiguration = $failedBiddingStrategyConfiguration;
      return $this;
    }

    /**
     * @return ConversionOptimizerEligibility
     */
    public function getConversionOptimizerEligibility()
    {
      return $this->conversionOptimizerEligibility;
    }

    /**
     * @param ConversionOptimizerEligibility $conversionOptimizerEligibility
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setConversionOptimizerEligibility($conversionOptimizerEligibility)
    {
      $this->conversionOptimizerEligibility = $conversionOptimizerEligibility;
      return $this;
    }

    /**
     * @return CampaignSettings[]
     */
    public function getSettings()
    {
      return $this->settings;
    }

    /**
     * @param CampaignSettings[] $settings
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setSettings(array $settings = null)
    {
      $this->settings = $settings;
      return $this;
    }

    /**
     * @return CampaignType
     */
    public function getCampaignType()
    {
      return $this->campaignType;
    }

    /**
     * @param CampaignType $campaignType
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setCampaignType($campaignType)
    {
      $this->campaignType = $campaignType;
      return $this;
    }

    /**
     * @return AppStore
     */
    public function getAppStore()
    {
      return $this->appStore;
    }

    /**
     * @param AppStore $appStore
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setAppStore($appStore)
    {
      $this->appStore = $appStore;
      return $this;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
      return $this->appId;
    }

    /**
     * @param string $appId
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setAppId($appId)
    {
      $this->appId = $appId;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
      return $this->trackingUrl;
    }

    /**
     * @param string $trackingUrl
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setTrackingUrl($trackingUrl)
    {
      $this->trackingUrl = $trackingUrl;
      return $this;
    }

    /**
     * @return CustomParameters
     */
    public function getCustomParameters()
    {
      return $this->customParameters;
    }

    /**
     * @param CustomParameters $customParameters
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setCustomParameters($customParameters)
    {
      $this->customParameters = $customParameters;
      return $this;
    }

    /**
     * @return UrlReviewData
     */
    public function getUrlReviewData()
    {
      return $this->urlReviewData;
    }

    /**
     * @param UrlReviewData $urlReviewData
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setUrlReviewData($urlReviewData)
    {
      $this->urlReviewData = $urlReviewData;
      return $this;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
      return $this->labels;
    }

    /**
     * @param Label[] $labels
     * @return \Jp\YahooApis\SS\V201901\Campaign\Campaign
     */
    public function setLabels(array $labels = null)
    {
      $this->labels = $labels;
      return $this;
    }

}
