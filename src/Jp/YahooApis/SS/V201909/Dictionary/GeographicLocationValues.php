<?php

namespace Jp\YahooApis\SS\V201909\Dictionary;

class GeographicLocationValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var GeographicLocation $geographicLocation
     */
    protected $geographicLocation = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return GeographicLocation
     */
    public function getGeographicLocation()
    {
      return $this->geographicLocation;
    }

    /**
     * @param GeographicLocation $geographicLocation
     * @return \Jp\YahooApis\SS\V201909\Dictionary\GeographicLocationValues
     */
    public function setGeographicLocation($geographicLocation)
    {
      $this->geographicLocation = $geographicLocation;
      return $this;
    }

}
