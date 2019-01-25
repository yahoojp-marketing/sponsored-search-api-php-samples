<?php

namespace Jp\YahooApis\SS\V201901\AdGroupLabel;

class AdGroupLabelOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupLabel[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupLabel[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupLabel[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupLabel[] $operand
     * @return \Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
