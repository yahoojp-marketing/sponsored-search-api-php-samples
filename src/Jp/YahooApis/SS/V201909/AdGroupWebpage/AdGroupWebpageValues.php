<?php

namespace Jp\YahooApis\SS\V201909\AdGroupWebpage;

class AdGroupWebpageValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var AdGroupWebpage $adGroupWebpage
     */
    protected $adGroupWebpage = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupWebpage
     */
    public function getAdGroupWebpage()
    {
      return $this->adGroupWebpage;
    }

    /**
     * @param AdGroupWebpage $adGroupWebpage
     * @return \Jp\YahooApis\SS\V201909\AdGroupWebpage\AdGroupWebpageValues
     */
    public function setAdGroupWebpage($adGroupWebpage)
    {
      $this->adGroupWebpage = $adGroupWebpage;
      return $this;
    }

}
