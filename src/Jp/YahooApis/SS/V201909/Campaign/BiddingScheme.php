<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

abstract class BiddingScheme
{

    /**
     * @var BiddingStrategyType $biddingStrategyType
     */
    protected $biddingStrategyType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return BiddingStrategyType
     */
    public function getBiddingStrategyType()
    {
      return $this->biddingStrategyType;
    }

    /**
     * @param BiddingStrategyType $biddingStrategyType
     * @return \Jp\YahooApis\SS\V201909\Campaign\BiddingScheme
     */
    public function setBiddingStrategyType($biddingStrategyType)
    {
      $this->biddingStrategyType = $biddingStrategyType;
      return $this;
    }

}
