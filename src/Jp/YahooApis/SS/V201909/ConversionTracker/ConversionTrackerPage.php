<?php

namespace Jp\YahooApis\SS\V201909\ConversionTracker;

class ConversionTrackerPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var int $totalConversions
     */
    protected $totalConversions = null;

    /**
     * @var int $totalAllConversions
     */
    protected $totalAllConversions = null;

    /**
     * @var string $totalConversionValue
     */
    protected $totalConversionValue = null;

    /**
     * @var string $totalAllConversionValue
     */
    protected $totalAllConversionValue = null;

    /**
     * @var ConversionTrackerValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getTotalConversions()
    {
      return $this->totalConversions;
    }

    /**
     * @param int $totalConversions
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage
     */
    public function setTotalConversions($totalConversions)
    {
      $this->totalConversions = $totalConversions;
      return $this;
    }

    /**
     * @return int
     */
    public function getTotalAllConversions()
    {
      return $this->totalAllConversions;
    }

    /**
     * @param int $totalAllConversions
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage
     */
    public function setTotalAllConversions($totalAllConversions)
    {
      $this->totalAllConversions = $totalAllConversions;
      return $this;
    }

    /**
     * @return string
     */
    public function getTotalConversionValue()
    {
      return $this->totalConversionValue;
    }

    /**
     * @param string $totalConversionValue
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage
     */
    public function setTotalConversionValue($totalConversionValue)
    {
      $this->totalConversionValue = $totalConversionValue;
      return $this;
    }

    /**
     * @return string
     */
    public function getTotalAllConversionValue()
    {
      return $this->totalAllConversionValue;
    }

    /**
     * @param string $totalAllConversionValue
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage
     */
    public function setTotalAllConversionValue($totalAllConversionValue)
    {
      $this->totalAllConversionValue = $totalAllConversionValue;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTrackerPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
