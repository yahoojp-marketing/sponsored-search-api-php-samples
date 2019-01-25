<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class CampaignTarget
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
     * @var string $campaignName
     */
    protected $campaignName = null;

    /**
     * @var Target $target
     */
    protected $target = null;

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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

    /**
     * @return Target
     */
    public function getTarget()
    {
      return $this->target;
    }

    /**
     * @param Target $target
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget
     */
    public function setTarget($target)
    {
      $this->target = $target;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTarget
     */
    public function setBidMultiplier($bidMultiplier)
    {
      $this->bidMultiplier = $bidMultiplier;
      return $this;
    }

}
