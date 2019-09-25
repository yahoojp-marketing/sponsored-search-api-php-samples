<?php

namespace Jp\YahooApis\SS\V201909\ConversionTracker;

class ConversionTrackerReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var ConversionTrackerValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ConversionTrackerValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param ConversionTrackerValues[] $values
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
