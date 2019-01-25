<?php

namespace Jp\YahooApis\SS\V201901\Label;

abstract class Operation
{

    /**
     * @var Operator $operator
     */
    protected $operator = null;

    /**
     * @param Operator $operator
     */
    public function __construct($operator)
    {
      $this->operator = $operator;
    }

    /**
     * @return Operator
     */
    public function getOperator()
    {
      return $this->operator;
    }

    /**
     * @param Operator $operator
     * @return \Jp\YahooApis\SS\V201901\Label\Operation
     */
    public function setOperator($operator)
    {
      $this->operator = $operator;
      return $this;
    }

}
