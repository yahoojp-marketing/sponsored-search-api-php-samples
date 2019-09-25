<?php

namespace Jp\YahooApis\SS\V201909\AdGroupWebpage;

class AdGroupWebpageOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupWebpage[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupWebpage[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupWebpage[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupWebpage[] $operand
     * @return \Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
