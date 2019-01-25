<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class ConversionTrackerOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var ConversionTracker[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param ConversionTracker[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return ConversionTracker[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param ConversionTracker[] $operand
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
