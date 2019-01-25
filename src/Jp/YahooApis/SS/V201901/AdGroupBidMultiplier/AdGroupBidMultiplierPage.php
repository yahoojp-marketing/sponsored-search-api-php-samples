<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class AdGroupBidMultiplierPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\AdGroupBidMultiplierPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
