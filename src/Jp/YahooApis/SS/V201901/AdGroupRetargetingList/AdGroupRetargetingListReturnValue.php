<?php

namespace Jp\YahooApis\SS\V201901\AdGroupRetargetingList;

class AdGroupRetargetingListReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupRetargetingListValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupRetargetingListValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupRetargetingListValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
