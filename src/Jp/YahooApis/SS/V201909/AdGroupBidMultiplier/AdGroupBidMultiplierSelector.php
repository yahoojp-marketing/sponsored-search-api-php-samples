<?php

namespace Jp\YahooApis\SS\V201909\AdGroupBidMultiplier;

class AdGroupBidMultiplierSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $campaignIds
     */
    protected $campaignIds = null;

    /**
     * @var long[] $adGroupIds
     */
    protected $adGroupIds = null;

    /**
     * @var PlatformType[] $platformTypes
     */
    protected $platformTypes = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
     */
    protected $paging = null;

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
     * @return \Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->campaignIds;
    }

    /**
     * @param long[] $campaignIds
     * @return \Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdGroupIds()
    {
      return $this->adGroupIds;
    }

    /**
     * @param long[] $adGroupIds
     * @return \Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector
     */
    public function setAdGroupIds(array $adGroupIds = null)
    {
      $this->adGroupIds = $adGroupIds;
      return $this;
    }

    /**
     * @return PlatformType[]
     */
    public function getPlatformTypes()
    {
      return $this->platformTypes;
    }

    /**
     * @param PlatformType[] $platformTypes
     * @return \Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector
     */
    public function setPlatformTypes(array $platformTypes = null)
    {
      $this->platformTypes = $platformTypes;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201909\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201909\Paging $paging
     * @return \Jp\YahooApis\SS\V201909\AdGroupBidMultiplier\AdGroupBidMultiplierSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
