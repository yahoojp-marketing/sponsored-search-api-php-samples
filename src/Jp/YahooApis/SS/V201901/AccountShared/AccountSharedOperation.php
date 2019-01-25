<?php

namespace Jp\YahooApis\SS\V201901\AccountShared;

class AccountSharedOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AccountShared[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AccountShared[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\AccountShared\AccountSharedOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AccountShared[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AccountShared[] $operand
     * @return \Jp\YahooApis\SS\V201901\AccountShared\AccountSharedOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
