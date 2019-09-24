<?php

namespace Jp\YahooApis\SS\V201909\BidLandscape;

class AdGroupBidLandscape extends BidLandscape
{

    /**
     * @var AdGroupBidLandscapeType $type
     */
    protected $type = null;

    /**
     * @var boolean $landscapeCurrent
     */
    protected $landscapeCurrent = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupBidLandscapeType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param AdGroupBidLandscapeType $type
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\AdGroupBidLandscape
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getLandscapeCurrent()
    {
      return $this->landscapeCurrent;
    }

    /**
     * @param boolean $landscapeCurrent
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\AdGroupBidLandscape
     */
    public function setLandscapeCurrent($landscapeCurrent)
    {
      $this->landscapeCurrent = $landscapeCurrent;
      return $this;
    }

}
