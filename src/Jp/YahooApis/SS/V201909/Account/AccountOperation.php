<?php

namespace Jp\YahooApis\SS\V201909\Account;

class AccountOperation extends Operation
{

    /**
     * @var Account[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param Account[] $operand
     */
    public function __construct($operator, array $operand)
    {
      parent::__construct($operator);
      $this->operand = $operand;
    }

    /**
     * @return Account[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param Account[] $operand
     * @return \Jp\YahooApis\SS\V201909\Account\AccountOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
