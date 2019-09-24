<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class SharedCriterionValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var SharedCriterion $sharedCriterion
     */
    protected $sharedCriterion = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return SharedCriterion
     */
    public function getSharedCriterion()
    {
      return $this->sharedCriterion;
    }

    /**
     * @param SharedCriterion $sharedCriterion
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionValues
     */
    public function setSharedCriterion($sharedCriterion)
    {
      $this->sharedCriterion = $sharedCriterion;
      return $this;
    }

}
