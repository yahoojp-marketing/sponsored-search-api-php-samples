<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class AdGroupFeedList
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
     * @var AdGroupFeedPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    /**
     * @var AdGroupFeed[] $adGroupFeed
     */
    protected $adGroupFeed = null;

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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return AdGroupFeedPlaceholderType
     */
    public function getPlaceholderType()
    {
      return $this->placeholderType;
    }

    /**
     * @param AdGroupFeedPlaceholderType $placeholderType
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return AdGroupFeed[]
     */
    public function getAdGroupFeed()
    {
      return $this->adGroupFeed;
    }

    /**
     * @param AdGroupFeed[] $adGroupFeed
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
     */
    public function setAdGroupFeed(array $adGroupFeed = null)
    {
      $this->adGroupFeed = $adGroupFeed;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedList
     */
    public function setDevicePlatform($devicePlatform)
    {
      $this->devicePlatform = $devicePlatform;
      return $this;
    }

}
