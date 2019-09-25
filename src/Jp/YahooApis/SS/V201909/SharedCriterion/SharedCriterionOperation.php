<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class SharedCriterionOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var SharedCriterion[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param SharedCriterion[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return SharedCriterion[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param SharedCriterion[] $operand
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
