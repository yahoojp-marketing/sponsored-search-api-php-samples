<?php

namespace Jp\YahooApis\SS\V201909\AdGroupFeed;

class AdGroupFeedSelector
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
     * @var long[] $feedItemIds
     */
    protected $feedItemIds = null;

    /**
     * @var AdGroupFeedPlaceholderType[] $placeholderTypes
     */
    protected $placeholderTypes = null;

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
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
     */
    public function setAdGroupIds(array $adGroupIds = null)
    {
      $this->adGroupIds = $adGroupIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getFeedItemIds()
    {
      return $this->feedItemIds;
    }

    /**
     * @param long[] $feedItemIds
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
     */
    public function setFeedItemIds(array $feedItemIds = null)
    {
      $this->feedItemIds = $feedItemIds;
      return $this;
    }

    /**
     * @return AdGroupFeedPlaceholderType[]
     */
    public function getPlaceholderTypes()
    {
      return $this->placeholderTypes;
    }

    /**
     * @param AdGroupFeedPlaceholderType[] $placeholderTypes
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
     */
    public function setPlaceholderTypes(array $placeholderTypes = null)
    {
      $this->placeholderTypes = $placeholderTypes;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupFeed\AdGroupFeedSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
