<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

class ManualCpcBiddingScheme extends BiddingScheme
{

    /**
     * @var EnhancedCpcEnabled $enhancedCpcEnabled
     */
    protected $enhancedCpcEnabled = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return EnhancedCpcEnabled
     */
    public function getEnhancedCpcEnabled()
    {
      return $this->enhancedCpcEnabled;
    }

    /**
     * @param EnhancedCpcEnabled $enhancedCpcEnabled
     * @return \Jp\YahooApis\SS\V201909\Campaign\ManualCpcBiddingScheme
     */
    public function setEnhancedCpcEnabled($enhancedCpcEnabled)
    {
      $this->enhancedCpcEnabled = $enhancedCpcEnabled;
      return $this;
    }

}
