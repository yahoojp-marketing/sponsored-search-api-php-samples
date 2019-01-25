<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class AdGroupBidMultiplier
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
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var PlatformType $platformType
     */
    protected $platformType = null;

    /**
     * @var float $bidMultiplier
     */
    protected $bidMultiplier = null;

    
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplier
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplier
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->adGroupId;
    }

    /**
     * @param int $adGroupId
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplier
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return PlatformType
     */
    public function getPlatformType()
    {
      return $this->platformType;
    }

    /**
     * @param PlatformType $platformType
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplier
     */
    public function setPlatformType($platformType)
    {
      $this->platformType = $platformType;
      return $this;
    }

    /**
     * @return float
     */
    public function getBidMultiplier()
    {
      return $this->bidMultiplier;
    }

    /**
     * @param float $bidMultiplier
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplier
     */
    public function setBidMultiplier($bidMultiplier)
    {
      $this->bidMultiplier = $bidMultiplier;
      return $this;
    }

}
