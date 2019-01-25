<?php

namespace Jp\YahooApis\SS\V201901\AdGroupRetargetingList;

class AdGroupRetargetingListValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroupRetargetingList $adGroupRetargetingList
     */
    protected $adGroupRetargetingList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupRetargetingList
     */
    public function getAdGroupRetargetingList()
    {
      return $this->adGroupRetargetingList;
    }

    /**
     * @param AdGroupRetargetingList $adGroupRetargetingList
     * @return \Jp\YahooApis\SS\V201901\AdGroupRetargetingList\AdGroupRetargetingListValues
     */
    public function setAdGroupRetargetingList($adGroupRetargetingList)
    {
      $this->adGroupRetargetingList = $adGroupRetargetingList;
      return $this;
    }

}
