<?php

namespace Jp\YahooApis\SS\V201901\KeywordEstimator;

class KeywordEstimatorSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignEstimateRequest $campaignEstimateRequest
     */
    protected $campaignEstimateRequest = null;

    /**
     * @param int $accountId
     * @param CampaignEstimateRequest $campaignEstimateRequest
     */
    public function __construct($accountId, $campaignEstimateRequest)
    {
      $this->accountId = $accountId;
      $this->campaignEstimateRequest = $campaignEstimateRequest;
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
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\KeywordEstimatorSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignEstimateRequest
     */
    public function getCampaignEstimateRequest()
    {
      return $this->campaignEstimateRequest;
    }

    /**
     * @param CampaignEstimateRequest $campaignEstimateRequest
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\KeywordEstimatorSelector
     */
    public function setCampaignEstimateRequest($campaignEstimateRequest)
    {
      $this->campaignEstimateRequest = $campaignEstimateRequest;
      return $this;
    }

}
