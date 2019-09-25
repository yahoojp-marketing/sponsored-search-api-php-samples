<?php

namespace Jp\YahooApis\SS\V201909\AccountShared;

class AccountShared
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $sharedListId
     */
    protected $sharedListId = null;

    /**
     * @var string $name
     */
    protected $name = null;

    /**
     * @var int $memberCount
     */
    protected $memberCount = null;

    /**
     * @var int $referenceCount
     */
    protected $referenceCount = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountShared
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getSharedListId()
    {
      return $this->sharedListId;
    }

    /**
     * @param int $sharedListId
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountShared
     */
    public function setSharedListId($sharedListId)
    {
      $this->sharedListId = $sharedListId;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param string $name
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountShared
     */
    public function setName($name)
    {
      $this->name = $name;
      return $this;
    }

    /**
     * @return int
     */
    public function getMemberCount()
    {
      return $this->memberCount;
    }

    /**
     * @param int $memberCount
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountShared
     */
    public function setMemberCount($memberCount)
    {
      $this->memberCount = $memberCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getReferenceCount()
    {
      return $this->referenceCount;
    }

    /**
     * @param int $referenceCount
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountShared
     */
    public function setReferenceCount($referenceCount)
    {
      $this->referenceCount = $referenceCount;
      return $this;
    }

}
