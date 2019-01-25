<?php

namespace Jp\YahooApis\SS\V201901\AccountTrackingUrl;

class AccountTrackingUrlOperation extends Operation
{

    /**
     * @var AccountTrackingUrl[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param AccountTrackingUrl[] $operand
     */
    public function __construct($operator, array $operand)
    {
      parent::__construct($operator);
      $this->operand = $operand;
    }

    /**
     * @return AccountTrackingUrl[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AccountTrackingUrl[] $operand
     * @return \Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
