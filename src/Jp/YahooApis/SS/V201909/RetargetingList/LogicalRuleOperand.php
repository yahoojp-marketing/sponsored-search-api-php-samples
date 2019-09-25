<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class LogicalRuleOperand
{

    /**
     * @var int $targetListId
     */
    protected $targetListId = null;

    /**
     * @param int $targetListId
     */
    public function __construct($targetListId)
    {
      $this->targetListId = $targetListId;
    }

    /**
     * @return int
     */
    public function getTargetListId()
    {
      return $this->targetListId;
    }

    /**
     * @param int $targetListId
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\LogicalRuleOperand
     */
    public function setTargetListId($targetListId)
    {
      $this->targetListId = $targetListId;
      return $this;
    }

}
