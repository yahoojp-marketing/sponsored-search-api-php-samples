<?php

namespace Jp\YahooApis\SS\V201901\AdGroup;

class AdGroup
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
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var int $adGroupTrackId
     */
    protected $adGroupTrackId = null;

    /**
     * @var string $adGroupName
     */
    protected $adGroupName = null;

    /**
     * @var UserStatus $userStatus
     */
    protected $userStatus = null;

    /**
     * @var Bid $bid
     */
    protected $bid = null;

    /**
     * @var AdGroupSettings $settings
     */
    protected $settings = null;

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
     * @var AdGroupAdRotationMode $adGroupAdRotationMode
     */
    protected $adGroupAdRotationMode = null;

    /**
     * @var Label[] $labels
     */
    protected $labels = null;

    /**
     * @param int $campaignId
     */
    public function __construct($campaignId)
    {
      $this->campaignId = $campaignId;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupTrackId()
    {
      return $this->adGroupTrackId;
    }

    /**
     * @param int $adGroupTrackId
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setAdGroupTrackId($adGroupTrackId)
    {
      $this->adGroupTrackId = $adGroupTrackId;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdGroupName()
    {
      return $this->adGroupName;
    }

    /**
     * @param string $adGroupName
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setAdGroupName($adGroupName)
    {
      $this->adGroupName = $adGroupName;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setUserStatus($userStatus)
    {
      $this->userStatus = $userStatus;
      return $this;
    }

    /**
     * @return Bid
     */
    public function getBid()
    {
      return $this->bid;
    }

    /**
     * @param Bid $bid
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setBid($bid)
    {
      $this->bid = $bid;
      return $this;
    }

    /**
     * @return AdGroupSettings
     */
    public function getSettings()
    {
      return $this->settings;
    }

    /**
     * @param AdGroupSettings $settings
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setSettings($settings)
    {
      $this->settings = $settings;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setUrlReviewData($urlReviewData)
    {
      $this->urlReviewData = $urlReviewData;
      return $this;
    }

    /**
     * @return AdGroupAdRotationMode
     */
    public function getAdGroupAdRotationMode()
    {
      return $this->adGroupAdRotationMode;
    }

    /**
     * @param AdGroupAdRotationMode $adGroupAdRotationMode
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setAdGroupAdRotationMode($adGroupAdRotationMode)
    {
      $this->adGroupAdRotationMode = $adGroupAdRotationMode;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroup
     */
    public function setLabels(array $labels = null)
    {
      $this->labels = $labels;
      return $this;
    }

}
