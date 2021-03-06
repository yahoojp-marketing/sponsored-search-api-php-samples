<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RetargetingListValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var TargetingList $targetList
     */
    protected $targetList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return TargetingList
     */
    public function getTargetList()
    {
      return $this->targetList;
    }

    /**
     * @param TargetingList $targetList
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListValues
     */
    public function setTargetList($targetList)
    {
      $this->targetList = $targetList;
      return $this;
    }

}
