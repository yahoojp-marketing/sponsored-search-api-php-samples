<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RetargetingListSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $targetListIds
     */
    protected $targetListIds = null;

    /**
     * @var TargetListType[] $targetListTypes
     */
    protected $targetListTypes = null;

    /**
     * @var TargetListOwner $owner
     */
    protected $owner = null;

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
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector
     */
    public function setTargetListIds(array $targetListIds = null)
    {
      $this->targetListIds = $targetListIds;
      return $this;
    }

    /**
     * @return TargetListType[]
     */
    public function getTargetListTypes()
    {
      return $this->targetListTypes;
    }

    /**
     * @param TargetListType[] $targetListTypes
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector
     */
    public function setTargetListTypes(array $targetListTypes = null)
    {
      $this->targetListTypes = $targetListTypes;
      return $this;
    }

    /**
     * @return TargetListOwner
     */
    public function getOwner()
    {
      return $this->owner;
    }

    /**
     * @param TargetListOwner $owner
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
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
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
