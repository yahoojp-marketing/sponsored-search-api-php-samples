<?php

namespace Jp\YahooApis\SS\V201901\AdGroupAd;

class AdGroupAdReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupAdValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupAdValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupAdValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
