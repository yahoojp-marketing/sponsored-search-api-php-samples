<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class GetCustomKeySelector
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
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\GetCustomKeySelector
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
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\GetCustomKeySelector
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
      return $this;
    }

}
