<?php

namespace Jp\YahooApis\SS\V201901\KeywordEstimator;

class CampaignEstimateRequest
{

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var adGroupEstimateRequest[] $adGroupEstimateRequests
     */
    protected $adGroupEstimateRequests = null;

    /**
     * @var string[] $provinces
     */
    protected $provinces = null;

    /**
     * @var int $dailyBudget
     */
    protected $dailyBudget = null;

    /**
     * @param adGroupEstimateRequest[] $adGroupEstimateRequests
     */
    public function __construct(array $adGroupEstimateRequests)
    {
      $this->adGroupEstimateRequests = $adGroupEstimateRequests;
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
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\CampaignEstimateRequest
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return adGroupEstimateRequest[]
     */
    public function getAdGroupEstimateRequests()
    {
      return $this->adGroupEstimateRequests;
    }

    /**
     * @param adGroupEstimateRequest[] $adGroupEstimateRequests
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\CampaignEstimateRequest
     */
    public function setAdGroupEstimateRequests(array $adGroupEstimateRequests)
    {
      $this->adGroupEstimateRequests = $adGroupEstimateRequests;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getProvinces()
    {
      return $this->provinces;
    }

    /**
     * @param string[] $provinces
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\CampaignEstimateRequest
     */
    public function setProvinces(array $provinces = null)
    {
      $this->provinces = $provinces;
      return $this;
    }

    /**
     * @return int
     */
    public function getDailyBudget()
    {
      return $this->dailyBudget;
    }

    /**
     * @param int $dailyBudget
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\CampaignEstimateRequest
     */
    public function setDailyBudget($dailyBudget)
    {
      $this->dailyBudget = $dailyBudget;
      return $this;
    }

}
