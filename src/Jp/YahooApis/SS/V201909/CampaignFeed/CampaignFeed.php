<?php

namespace Jp\YahooApis\SS\V201909\CampaignFeed;

class CampaignFeed
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
     * @var int $feedItemId
     */
    protected $feedItemId = null;

    /**
     * @var CampaignFeedPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeed
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
     * @return \Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeed
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedItemId()
    {
      return $this->feedItemId;
    }

    /**
     * @param int $feedItemId
     * @return \Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeed
     */
    public function setFeedItemId($feedItemId)
    {
      $this->feedItemId = $feedItemId;
      return $this;
    }

    /**
     * @return CampaignFeedPlaceholderType
     */
    public function getPlaceholderType()
    {
      return $this->placeholderType;
    }

    /**
     * @param CampaignFeedPlaceholderType $placeholderType
     * @return \Jp\YahooApis\SS\V201909\CampaignFeed\CampaignFeed
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

}
