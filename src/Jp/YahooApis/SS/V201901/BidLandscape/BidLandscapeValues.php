<?php

namespace Jp\YahooApis\SS\V201901\BidLandscape;

class BidLandscapeValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var BidLandscape $data
     */
    protected $data = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BidLandscape
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * @param BidLandscape $data
     * @return \Jp\YahooApis\SS\V201901\BidLandscape\BidLandscapeValues
     */
    public function setData($data)
    {
      $this->data = $data;
      return $this;
    }

}
