<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

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

    /**
     * @var int $adGroupMaxCpc
     */
    protected $adGroupMaxCpc = null;

    /**
     * @var int $keywordMaxCpc
     */
    protected $keywordMaxCpc = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\Bid
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\Bid
     */
    public function setBidSource($bidSource)
    {
      $this->bidSource = $bidSource;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupMaxCpc()
    {
      return $this->adGroupMaxCpc;
    }

    /**
     * @param int $adGroupMaxCpc
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\Bid
     */
    public function setAdGroupMaxCpc($adGroupMaxCpc)
    {
      $this->adGroupMaxCpc = $adGroupMaxCpc;
      return $this;
    }

    /**
     * @return int
     */
    public function getKeywordMaxCpc()
    {
      return $this->keywordMaxCpc;
    }

    /**
     * @param int $keywordMaxCpc
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\Bid
     */
    public function setKeywordMaxCpc($keywordMaxCpc)
    {
      $this->keywordMaxCpc = $keywordMaxCpc;
      return $this;
    }

}
