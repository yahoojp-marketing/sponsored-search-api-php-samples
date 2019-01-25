<?php

namespace Jp\YahooApis\SS\V201901\BidLandscape;

class BidLandscapePage extends \Jp\YahooApis\SS\V201901\Page
{

    /**
     * @var BidLandscapeValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BidLandscapeValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param BidLandscapeValues[] $values
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapePage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
