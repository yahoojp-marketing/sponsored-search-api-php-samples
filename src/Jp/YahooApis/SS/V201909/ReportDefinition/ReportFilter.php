<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class ReportFilter
{

    /**
     * @var string $field
     */
    protected $field = null;

    /**
     * @var ReportOperator $operator
     */
    protected $operator = null;

    /**
     * @var string[] $value
     */
    protected $value = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getField()
    {
      return $this->field;
    }

    /**
     * @param string $field
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportFilter
     */
    public function setField($field)
    {
      $this->field = $field;
      return $this;
    }

    /**
     * @return ReportOperator
     */
    public function getOperator()
    {
      return $this->operator;
    }

    /**
     * @param ReportOperator $operator
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportFilter
     */
    public function setOperator($operator)
    {
      $this->operator = $operator;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param string[] $value
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportFilter
     */
    public function setValue(array $value = null)
    {
      $this->value = $value;
      return $this;
    }

}
