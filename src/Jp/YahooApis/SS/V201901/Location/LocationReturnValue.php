<?php

namespace Jp\YahooApis\SS\V201901\Location;

class LocationReturnValue extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var string $value
     */
    protected $value = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param string $value
     * @return \Jp\YahooApis\SS\V201901\Location\LocationReturnValue
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
