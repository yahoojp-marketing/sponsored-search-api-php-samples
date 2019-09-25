<?php

namespace Jp\YahooApis\SS\V201909\ConversionTracker;

class ConversionTrackerValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var ConversionTracker $conversionTracker
     */
    protected $conversionTracker = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ConversionTracker
     */
    public function getConversionTracker()
    {
      return $this->conversionTracker;
    }

    /**
     * @param ConversionTracker $conversionTracker
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerValues
     */
    public function setConversionTracker($conversionTracker)
    {
      $this->conversionTracker = $conversionTracker;
      return $this;
    }

}
