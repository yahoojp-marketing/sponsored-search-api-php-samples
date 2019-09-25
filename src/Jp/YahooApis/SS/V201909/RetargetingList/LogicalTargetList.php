<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class LogicalTargetList extends TargetingList
{

    /**
     * @var LogicalGroup[] $logicalGroup
     */
    protected $logicalGroup = null;

    /**
     * @param int $accountId
     * @param TargetListType $targetListType
     * @param LogicalGroup[] $logicalGroup
     */
    public function __construct($accountId, $targetListType, array $logicalGroup)
    {
      parent::__construct($accountId, $targetListType);
      $this->logicalGroup = $logicalGroup;
    }

    /**
     * @return LogicalGroup[]
     */
    public function getLogicalGroup()
    {
      return $this->logicalGroup;
    }

    /**
     * @param LogicalGroup[] $logicalGroup
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\LogicalTargetList
     */
    public function setLogicalGroup(array $logicalGroup)
    {
      $this->logicalGroup = $logicalGroup;
      return $this;
    }

}
