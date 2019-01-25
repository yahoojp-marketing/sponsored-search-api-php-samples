<?php

namespace Jp\YahooApis\SS\V201901\AdGroupAd;

class AdGroupAdValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroupAd $adGroupAd
     */
    protected $adGroupAd = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupAd
     */
    public function getAdGroupAd()
    {
      return $this->adGroupAd;
    }

    /**
     * @param AdGroupAd $adGroupAd
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdValues
     */
    public function setAdGroupAd($adGroupAd)
    {
      $this->adGroupAd = $adGroupAd;
      return $this;
    }

}
