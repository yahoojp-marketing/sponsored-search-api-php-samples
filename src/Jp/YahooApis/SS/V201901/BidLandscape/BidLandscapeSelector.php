<?php

namespace Jp\YahooApis\SS\V201901\BidLandscape;

class BidLandscapeSelector
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
     * @var long[] $criterionIds
     */
    protected $criterionIds = null;

    /**
     * @var SimType $simType
     */
    protected $simType = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     * @param int $campaignId
     * @param int $adGroupId
     * @param long[] $criterionIds
     * @param SimType $simType
     */
    public function __construct($accountId, $campaignId, $adGroupId, array $criterionIds, $simType)
    {
      $this->accountId = $accountId;
      $this->campaignId = $campaignId;
      $this->adGroupId = $adGroupId;
      $this->criterionIds = $criterionIds;
      $this->simType = $simType;
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
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
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
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
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
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCriterionIds()
    {
      return $this->criterionIds;
    }

    /**
     * @param long[] $criterionIds
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
     */
    public function setCriterionIds(array $criterionIds)
    {
      $this->criterionIds = $criterionIds;
      return $this;
    }

    /**
     * @return SimType
     */
    public function getSimType()
    {
      return $this->simType;
    }

    /**
     * @param SimType $simType
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
     */
    public function setSimType($simType)
    {
      $this->simType = $simType;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Paging $paging
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
