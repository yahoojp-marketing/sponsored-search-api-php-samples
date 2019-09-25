<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAdLabel;

class AdGroupAdLabelOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupAdLabel[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupAdLabel[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupAdLabel[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupAdLabel[] $operand
     * @return \Jp\YahooApis\SS\V201909\AdGroupAdLabel\AdGroupAdLabelOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
