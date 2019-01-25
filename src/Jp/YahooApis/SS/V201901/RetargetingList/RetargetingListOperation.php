<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class RetargetingListOperation extends Operation
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
     * @var TargetingList[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param TargetingList[] $operand
     */
    public function __construct($operator, $accountId, array $operand)
    {
      parent::__construct($operator);
      $this->accountId = $accountId;
      $this->operand = $operand;
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
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListOperation
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
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListOperation
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
      return $this;
    }

    /**
     * @return TargetingList[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param TargetingList[] $operand
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingListOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
