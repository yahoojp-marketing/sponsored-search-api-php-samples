<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class AdGroupWebpageReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupWebpageValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupWebpageValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupWebpageValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpageReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
