<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RetargetingListReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var RetargetingListValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return RetargetingListValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param RetargetingListValues[] $values
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
