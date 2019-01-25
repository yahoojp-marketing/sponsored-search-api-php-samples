<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class LogicalGroup
{

    /**
     * @var LogicalCondition $condition
     */
    protected $condition = null;

    /**
     * @var LogicalRuleOperand[] $logicalOperand
     */
    protected $logicalOperand = null;

    /**
     * @param LogicalRuleOperand[] $logicalOperand
     */
    public function __construct(array $logicalOperand)
    {
      $this->logicalOperand = $logicalOperand;
    }

    /**
     * @return LogicalCondition
     */
    public function getCondition()
    {
      return $this->condition;
    }

    /**
     * @param LogicalCondition $condition
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\LogicalGroup
     */
    public function setCondition($condition)
    {
      $this->condition = $condition;
      return $this;
    }

    /**
     * @return LogicalRuleOperand[]
     */
    public function getLogicalOperand()
    {
      return $this->logicalOperand;
    }

    /**
     * @param LogicalRuleOperand[] $logicalOperand
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\LogicalGroup
     */
    public function setLogicalOperand(array $logicalOperand)
    {
      $this->logicalOperand = $logicalOperand;
      return $this;
    }

}
