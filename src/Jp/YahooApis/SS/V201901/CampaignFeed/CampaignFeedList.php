<?php

namespace Jp\YahooApis\SS\V201901\CampaignFeed;

class CampaignFeedList
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
     * @var CampaignFeedPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    /**
     * @var CampaignFeed[] $campaignFeed
     */
    protected $campaignFeed = null;

    /**
     * @var DevicePlatform $devicePlatform
     */
    protected $devicePlatform = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList
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
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return CampaignFeed[]
     */
    public function getCampaignFeed()
    {
      return $this->campaignFeed;
    }

    /**
     * @param CampaignFeed[] $campaignFeed
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList
     */
    public function setCampaignFeed(array $campaignFeed = null)
    {
      $this->campaignFeed = $campaignFeed;
      return $this;
    }

    /**
     * @return DevicePlatform
     */
    public function getDevicePlatform()
    {
      return $this->devicePlatform;
    }

    /**
     * @param DevicePlatform $devicePlatform
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedList
     */
    public function setDevicePlatform($devicePlatform)
    {
      $this->devicePlatform = $devicePlatform;
      return $this;
    }

}
