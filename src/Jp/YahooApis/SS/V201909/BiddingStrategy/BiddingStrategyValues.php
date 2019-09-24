<?php

namespace Jp\YahooApis\SS\V201909\BiddingStrategy;

class BiddingStrategyValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var BiddingStrategy $biddingStrategy
     */
    protected $biddingStrategy = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BiddingStrategy
     */
    public function getBiddingStrategy()
    {
      return $this->biddingStrategy;
    }

    /**
     * @param BiddingStrategy $biddingStrategy
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategyValues
     */
    public function setBiddingStrategy($biddingStrategy)
    {
      $this->biddingStrategy = $biddingStrategy;
      return $this;
    }

}
