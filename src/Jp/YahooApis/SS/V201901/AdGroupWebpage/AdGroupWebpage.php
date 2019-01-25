<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class AdGroupWebpage
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
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var int $adGroupTrackId
     */
    protected $adGroupTrackId = null;

    /**
     * @var UserStatus $userStatus
     */
    protected $userStatus = null;

    /**
     * @var ExcludedType $excludedType
     */
    protected $excludedType = null;

    /**
     * @var Webpage $webpage
     */
    protected $webpage = null;

    /**
     * @var Bid $bid
     */
    protected $bid = null;

    /**
     * @param int $campaignId
     * @param int $adGroupId
     * @param Webpage $webpage
     */
    public function __construct($campaignId, $adGroupId, $webpage)
    {
      $this->campaignId = $campaignId;
      $this->adGroupId = $adGroupId;
      $this->webpage = $webpage;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setCampaignTrackId($campaignTrackId)
    {
      $this->campaignTrackId = $campaignTrackId;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setAdGroupTrackId($adGroupTrackId)
    {
      $this->adGroupTrackId = $adGroupTrackId;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setUserStatus($userStatus)
    {
      $this->userStatus = $userStatus;
      return $this;
    }

    /**
     * @return ExcludedType
     */
    public function getExcludedType()
    {
      return $this->excludedType;
    }

    /**
     * @param ExcludedType $excludedType
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setExcludedType($excludedType)
    {
      $this->excludedType = $excludedType;
      return $this;
    }

    /**
     * @return Webpage
     */
    public function getWebpage()
    {
      return $this->webpage;
    }

    /**
     * @param Webpage $webpage
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setWebpage($webpage)
    {
      $this->webpage = $webpage;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpage
     */
    public function setBid($bid)
    {
      $this->bid = $bid;
      return $this;
    }

}
