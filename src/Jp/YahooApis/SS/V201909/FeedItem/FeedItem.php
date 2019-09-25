<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItem
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $feedFolderId
     */
    protected $feedFolderId = null;

    /**
     * @var int $feedItemId
     */
    protected $feedItemId = null;

    /**
     * @var int $feedItemTrackId
     */
    protected $feedItemTrackId = null;

    /**
     * @var ApprovalStatus $approvalStatus
     */
    protected $approvalStatus = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    /**
     * @var TrademarkStatus $trademarkStatus
     */
    protected $trademarkStatus = null;

    /**
     * @var string[] $invalidedTrademarks
     */
    protected $invalidedTrademarks = null;

    /**
     * @var FeedItemAttribute[] $feedItemAttribute
     */
    protected $feedItemAttribute = null;

    /**
     * @var FeedItemPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    /**
     * @var DevicePreference $devicePreference
     */
    protected $devicePreference = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    /**
     * @var FeedItemScheduling $scheduling
     */
    protected $scheduling = null;

    /**
     * @var TargetingCampaign $targetingCampaign
     */
    protected $targetingCampaign = null;

    /**
     * @var TargetingAdGroup $targetingAdGroup
     */
    protected $targetingAdGroup = null;

    /**
     * @var TargetingKeyword $targetingKeyword
     */
    protected $targetingKeyword = null;

    /**
     * @var CustomParameters $customParameters
     */
    protected $customParameters = null;

    /**
     * @var CustomParameters $reviewCustomParameters
     */
    protected $reviewCustomParameters = null;

    /**
     * @var Location $geoTargeting
     */
    protected $geoTargeting = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedFolderId()
    {
      return $this->feedFolderId;
    }

    /**
     * @param int $feedFolderId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setFeedItemId($feedItemId)
    {
      $this->feedItemId = $feedItemId;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedItemTrackId()
    {
      return $this->feedItemTrackId;
    }

    /**
     * @param int $feedItemTrackId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setFeedItemTrackId($feedItemTrackId)
    {
      $this->feedItemTrackId = $feedItemTrackId;
      return $this;
    }

    /**
     * @return ApprovalStatus
     */
    public function getApprovalStatus()
    {
      return $this->approvalStatus;
    }

    /**
     * @param ApprovalStatus $approvalStatus
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setApprovalStatus($approvalStatus)
    {
      $this->approvalStatus = $approvalStatus;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getDisapprovalReasonCodes()
    {
      return $this->disapprovalReasonCodes;
    }

    /**
     * @param string[] $disapprovalReasonCodes
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

    /**
     * @return TrademarkStatus
     */
    public function getTrademarkStatus()
    {
      return $this->trademarkStatus;
    }

    /**
     * @param TrademarkStatus $trademarkStatus
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setTrademarkStatus($trademarkStatus)
    {
      $this->trademarkStatus = $trademarkStatus;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getInvalidedTrademarks()
    {
      return $this->invalidedTrademarks;
    }

    /**
     * @param string[] $invalidedTrademarks
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setInvalidedTrademarks(array $invalidedTrademarks = null)
    {
      $this->invalidedTrademarks = $invalidedTrademarks;
      return $this;
    }

    /**
     * @return FeedItemAttribute[]
     */
    public function getFeedItemAttribute()
    {
      return $this->feedItemAttribute;
    }

    /**
     * @param FeedItemAttribute[] $feedItemAttribute
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setFeedItemAttribute(array $feedItemAttribute = null)
    {
      $this->feedItemAttribute = $feedItemAttribute;
      return $this;
    }

    /**
     * @return FeedItemPlaceholderType
     */
    public function getPlaceholderType()
    {
      return $this->placeholderType;
    }

    /**
     * @param FeedItemPlaceholderType $placeholderType
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return DevicePreference
     */
    public function getDevicePreference()
    {
      return $this->devicePreference;
    }

    /**
     * @param DevicePreference $devicePreference
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setDevicePreference($devicePreference)
    {
      $this->devicePreference = $devicePreference;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

    /**
     * @return FeedItemScheduling
     */
    public function getScheduling()
    {
      return $this->scheduling;
    }

    /**
     * @param FeedItemScheduling $scheduling
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setScheduling($scheduling)
    {
      $this->scheduling = $scheduling;
      return $this;
    }

    /**
     * @return TargetingCampaign
     */
    public function getTargetingCampaign()
    {
      return $this->targetingCampaign;
    }

    /**
     * @param TargetingCampaign $targetingCampaign
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setTargetingCampaign($targetingCampaign)
    {
      $this->targetingCampaign = $targetingCampaign;
      return $this;
    }

    /**
     * @return TargetingAdGroup
     */
    public function getTargetingAdGroup()
    {
      return $this->targetingAdGroup;
    }

    /**
     * @param TargetingAdGroup $targetingAdGroup
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setTargetingAdGroup($targetingAdGroup)
    {
      $this->targetingAdGroup = $targetingAdGroup;
      return $this;
    }

    /**
     * @return TargetingKeyword
     */
    public function getTargetingKeyword()
    {
      return $this->targetingKeyword;
    }

    /**
     * @param TargetingKeyword $targetingKeyword
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setTargetingKeyword($targetingKeyword)
    {
      $this->targetingKeyword = $targetingKeyword;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setCustomParameters($customParameters)
    {
      $this->customParameters = $customParameters;
      return $this;
    }

    /**
     * @return CustomParameters
     */
    public function getReviewCustomParameters()
    {
      return $this->reviewCustomParameters;
    }

    /**
     * @param CustomParameters $reviewCustomParameters
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setReviewCustomParameters($reviewCustomParameters)
    {
      $this->reviewCustomParameters = $reviewCustomParameters;
      return $this;
    }

    /**
     * @return Location
     */
    public function getGeoTargeting()
    {
      return $this->geoTargeting;
    }

    /**
     * @param Location $geoTargeting
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItem
     */
    public function setGeoTargeting($geoTargeting)
    {
      $this->geoTargeting = $geoTargeting;
      return $this;
    }

}
