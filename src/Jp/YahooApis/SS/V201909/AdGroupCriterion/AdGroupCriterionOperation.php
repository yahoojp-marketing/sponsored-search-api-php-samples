<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class AdGroupCriterionOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupCriterion[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupCriterion[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterionOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupCriterion[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupCriterion[] $operand
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterionOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
