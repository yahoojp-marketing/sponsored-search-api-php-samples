<?php

namespace Jp\YahooApis\SS\V201909\AdGroup;

class Bid
{

    /**
     * @var int $maxCpc
     */
    protected $maxCpc = null;

    /**
     * @var BidSource $bidSource
     */
    protected $bidSource = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getMaxCpc()
    {
      return $this->maxCpc;
    }

    /**
     * @param int $maxCpc
     * @return \Jp\YahooApis\SS\V201909\AdGroup\Bid
     */
    public function setMaxCpc($maxCpc)
    {
      $this->maxCpc = $maxCpc;
      return $this;
    }

    /**
     * @return BidSource
     */
    public function getBidSource()
    {
      return $this->bidSource;
    }

    /**
     * @param BidSource $bidSource
     * @return \Jp\YahooApis\SS\V201909\AdGroup\Bid
     */
    public function setBidSource($bidSource)
    {
      $this->bidSource = $bidSource;
      return $this;
    }

}
