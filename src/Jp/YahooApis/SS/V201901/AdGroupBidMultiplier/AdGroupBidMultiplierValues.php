<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class AdGroupBidMultiplierValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroupBidMultiplier $adGroupBidMultiplier
     */
    protected $adGroupBidMultiplier = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupBidMultiplier
     */
    public function getAdGroupBidMultiplier()
    {
      return $this->adGroupBidMultiplier;
    }

    /**
     * @param AdGroupBidMultiplier $adGroupBidMultiplier
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplierValues
     */
    public function setAdGroupBidMultiplier($adGroupBidMultiplier)
    {
      $this->adGroupBidMultiplier = $adGroupBidMultiplier;
      return $this;
    }

}
