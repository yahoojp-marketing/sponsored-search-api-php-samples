<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAd
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
     * @var int $adId
     */
    protected $adId = null;

    /**
     * @var int $adTrackId
     */
    protected $adTrackId = null;

    /**
     * @var string $adName
     */
    protected $adName = null;

    /**
     * @var UserStatus $userStatus
     */
    protected $userStatus = null;

    /**
     * @var TrademarkStatus $trademarkStatus
     */
    protected $trademarkStatus = null;

    /**
     * @var string[] $invalidedTrademarks
     */
    protected $invalidedTrademarks = null;

    /**
     * @var ApprovalStatus $approvalStatus
     */
    protected $approvalStatus = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    /**
     * @var Ad $ad
     */
    protected $ad = null;

    /**
     * @var int $feedFolderId
     */
    protected $feedFolderId = null;

    /**
     * @var Label[] $labels
     */
    protected $labels = null;

    /**
     * @param int $campaignId
     * @param int $adGroupId
     */
    public function __construct($campaignId, $adGroupId)
    {
      $this->campaignId = $campaignId;
      $this->adGroupId = $adGroupId;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setAdGroupName($adGroupName)
    {
      $this->adGroupName = $adGroupName;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdId()
    {
      return $this->adId;
    }

    /**
     * @param int $adId
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setAdId($adId)
    {
      $this->adId = $adId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdTrackId()
    {
      return $this->adTrackId;
    }

    /**
     * @param int $adTrackId
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setAdTrackId($adTrackId)
    {
      $this->adTrackId = $adTrackId;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdName()
    {
      return $this->adName;
    }

    /**
     * @param string $adName
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setAdName($adName)
    {
      $this->adName = $adName;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setUserStatus($userStatus)
    {
      $this->userStatus = $userStatus;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setInvalidedTrademarks(array $invalidedTrademarks = null)
    {
      $this->invalidedTrademarks = $invalidedTrademarks;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

    /**
     * @return Ad
     */
    public function getAd()
    {
      return $this->ad;
    }

    /**
     * @param Ad $ad
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setAd($ad)
    {
      $this->ad = $ad;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd
     */
    public function setLabels(array $labels = null)
    {
      $this->labels = $labels;
      return $this;
    }

}
