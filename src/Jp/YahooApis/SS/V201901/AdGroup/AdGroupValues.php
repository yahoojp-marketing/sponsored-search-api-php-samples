<?php

namespace Jp\YahooApis\SS\V201901\AdGroup;

class AdGroupValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroup $adGroup
     */
    protected $adGroup = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroup
     */
    public function getAdGroup()
    {
      return $this->adGroup;
    }

    /**
     * @param AdGroup $adGroup
     * @return \Jp\YahooApis\SS\V201901\AdGroup\AdGroupValues
     */
    public function setAdGroup($adGroup)
    {
      $this->adGroup = $adGroup;
      return $this;
    }

}
