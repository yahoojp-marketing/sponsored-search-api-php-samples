<?php

namespace Jp\YahooApis\SS\V201909\BidLandscape;

class LandscapePoints
{

    /**
     * @var int $bid
     */
    protected $bid = null;

    /**
     * @var int $clicks
     */
    protected $clicks = null;

    /**
     * @var int $cost
     */
    protected $cost = null;

    /**
     * @var int $marginalCpc
     */
    protected $marginalCpc = null;

    /**
     * @var int $impressions
     */
    protected $impressions = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getBid()
    {
      return $this->bid;
    }

    /**
     * @param int $bid
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints
     */
    public function setBid($bid)
    {
      $this->bid = $bid;
      return $this;
    }

    /**
     * @return int
     */
    public function getClicks()
    {
      return $this->clicks;
    }

    /**
     * @param int $clicks
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints
     */
    public function setClicks($clicks)
    {
      $this->clicks = $clicks;
      return $this;
    }

    /**
     * @return int
     */
    public function getCost()
    {
      return $this->cost;
    }

    /**
     * @param int $cost
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints
     */
    public function setCost($cost)
    {
      $this->cost = $cost;
      return $this;
    }

    /**
     * @return int
     */
    public function getMarginalCpc()
    {
      return $this->marginalCpc;
    }

    /**
     * @param int $marginalCpc
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints
     */
    public function setMarginalCpc($marginalCpc)
    {
      $this->marginalCpc = $marginalCpc;
      return $this;
    }

    /**
     * @return int
     */
    public function getImpressions()
    {
      return $this->impressions;
    }

    /**
     * @param int $impressions
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\LandscapePoints
     */
    public function setImpressions($impressions)
    {
      $this->impressions = $impressions;
      return $this;
    }

}
