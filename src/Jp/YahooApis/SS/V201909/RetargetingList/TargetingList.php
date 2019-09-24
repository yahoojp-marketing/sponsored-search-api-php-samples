<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class TargetingList
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var TargetListOwner $owner
     */
    protected $owner = null;

    /**
     * @var RetargetingAccountStatus $retargetingAccountStatus
     */
    protected $retargetingAccountStatus = null;

    /**
     * @var int $targetListId
     */
    protected $targetListId = null;

    /**
     * @var int $targetListTrackId
     */
    protected $targetListTrackId = null;

    /**
     * @var TargetListType $targetListType
     */
    protected $targetListType = null;

    /**
     * @var string $targetListName
     */
    protected $targetListName = null;

    /**
     * @var string $targetListDescription
     */
    protected $targetListDescription = null;

    /**
     * @var ClosingReason $closingReason
     */
    protected $closingReason = null;

    /**
     * @var ReachStorageStatus $reachStorageStatus
     */
    protected $reachStorageStatus = null;

    /**
     * @var int $reachStorageSpan
     */
    protected $reachStorageSpan = null;

    /**
     * @var int $reach
     */
    protected $reach = null;

    /**
     * @param int $accountId
     * @param TargetListType $targetListType
     */
    public function __construct($accountId, $targetListType)
    {
      $this->accountId = $accountId;
      $this->targetListType = $targetListType;
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
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
      return $this;
    }

    /**
     * @return RetargetingAccountStatus
     */
    public function getRetargetingAccountStatus()
    {
      return $this->retargetingAccountStatus;
    }

    /**
     * @param RetargetingAccountStatus $retargetingAccountStatus
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setRetargetingAccountStatus($retargetingAccountStatus)
    {
      $this->retargetingAccountStatus = $retargetingAccountStatus;
      return $this;
    }

    /**
     * @return int
     */
    public function getTargetListId()
    {
      return $this->targetListId;
    }

    /**
     * @param int $targetListId
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setTargetListId($targetListId)
    {
      $this->targetListId = $targetListId;
      return $this;
    }

    /**
     * @return int
     */
    public function getTargetListTrackId()
    {
      return $this->targetListTrackId;
    }

    /**
     * @param int $targetListTrackId
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setTargetListTrackId($targetListTrackId)
    {
      $this->targetListTrackId = $targetListTrackId;
      return $this;
    }

    /**
     * @return TargetListType
     */
    public function getTargetListType()
    {
      return $this->targetListType;
    }

    /**
     * @param TargetListType $targetListType
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setTargetListType($targetListType)
    {
      $this->targetListType = $targetListType;
      return $this;
    }

    /**
     * @return string
     */
    public function getTargetListName()
    {
      return $this->targetListName;
    }

    /**
     * @param string $targetListName
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setTargetListName($targetListName)
    {
      $this->targetListName = $targetListName;
      return $this;
    }

    /**
     * @return string
     */
    public function getTargetListDescription()
    {
      return $this->targetListDescription;
    }

    /**
     * @param string $targetListDescription
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setTargetListDescription($targetListDescription)
    {
      $this->targetListDescription = $targetListDescription;
      return $this;
    }

    /**
     * @return ClosingReason
     */
    public function getClosingReason()
    {
      return $this->closingReason;
    }

    /**
     * @param ClosingReason $closingReason
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setClosingReason($closingReason)
    {
      $this->closingReason = $closingReason;
      return $this;
    }

    /**
     * @return ReachStorageStatus
     */
    public function getReachStorageStatus()
    {
      return $this->reachStorageStatus;
    }

    /**
     * @param ReachStorageStatus $reachStorageStatus
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setReachStorageStatus($reachStorageStatus)
    {
      $this->reachStorageStatus = $reachStorageStatus;
      return $this;
    }

    /**
     * @return int
     */
    public function getReachStorageSpan()
    {
      return $this->reachStorageSpan;
    }

    /**
     * @param int $reachStorageSpan
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setReachStorageSpan($reachStorageSpan)
    {
      $this->reachStorageSpan = $reachStorageSpan;
      return $this;
    }

    /**
     * @return int
     */
    public function getReach()
    {
      return $this->reach;
    }

    /**
     * @param int $reach
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\TargetingList
     */
    public function setReach($reach)
    {
      $this->reach = $reach;
      return $this;
    }

}
