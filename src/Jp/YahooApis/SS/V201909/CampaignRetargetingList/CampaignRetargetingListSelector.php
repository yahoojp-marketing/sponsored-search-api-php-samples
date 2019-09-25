<?php

namespace Jp\YahooApis\SS\V201909\CampaignRetargetingList;

class CampaignRetargetingListSelector
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
     * @var long[] $targetListIds
     */
    protected $targetListIds = null;

    /**
     * @var ExcludedType $excludedType
     */
    protected $excludedType = null;

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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getTargetListIds()
    {
      return $this->targetListIds;
    }

    /**
     * @param long[] $targetListIds
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector
     */
    public function setTargetListIds(array $targetListIds = null)
    {
      $this->targetListIds = $targetListIds;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector
     */
    public function setExcludedType($excludedType)
    {
      $this->excludedType = $excludedType;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
