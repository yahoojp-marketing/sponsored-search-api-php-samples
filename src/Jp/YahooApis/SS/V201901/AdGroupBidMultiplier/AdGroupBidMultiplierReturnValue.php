<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class AdGroupBidMultiplierReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupBidMultiplierValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupBidMultiplierValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupBidMultiplierValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplierReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
