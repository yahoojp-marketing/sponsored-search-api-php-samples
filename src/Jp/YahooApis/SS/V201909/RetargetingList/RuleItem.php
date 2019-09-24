<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RuleItem
{

    /**
     * @var RuleType $ruleType
     */
    protected $ruleType = null;

    /**
     * @var RuleOperator $operator
     */
    protected $operator = null;

    /**
     * @var string $value
     */
    protected $value = null;

    /**
     * @param RuleType $ruleType
     * @param RuleOperator $operator
     * @param string $value
     */
    public function __construct($ruleType, $operator, $value)
    {
      $this->ruleType = $ruleType;
      $this->operator = $operator;
      $this->value = $value;
    }

    /**
     * @return RuleType
     */
    public function getRuleType()
    {
      return $this->ruleType;
    }

    /**
     * @param RuleType $ruleType
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleItem
     */
    public function setRuleType($ruleType)
    {
      $this->ruleType = $ruleType;
      return $this;
    }

    /**
     * @return RuleOperator
     */
    public function getOperator()
    {
      return $this->operator;
    }

    /**
     * @param RuleOperator $operator
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleItem
     */
    public function setOperator($operator)
    {
      $this->operator = $operator;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param string $value
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleItem
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
