<?php

namespace Jp\YahooApis\SS\V201909\BiddingStrategy;

class BiddingStrategyOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var BiddingStrategy[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param BiddingStrategy[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return BiddingStrategy[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param BiddingStrategy[] $operand
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
