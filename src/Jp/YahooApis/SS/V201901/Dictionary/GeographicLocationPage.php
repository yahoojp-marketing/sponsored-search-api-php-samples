<?php

namespace Jp\YahooApis\SS\V201901\Dictionary;

class GeographicLocationPage extends \Jp\YahooApis\SS\V201901\Page
{

    /**
     * @var GeographicLocationValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return GeographicLocationValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param GeographicLocationValues[] $values
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocationPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
