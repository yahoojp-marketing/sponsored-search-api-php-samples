<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

class TargetSpendBiddingScheme extends BiddingScheme
{

    /**
     * @var int $bidCeiling
     */
    protected $bidCeiling = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getBidCeiling()
    {
      return $this->bidCeiling;
    }

    /**
     * @param int $bidCeiling
     * @return \Jp\YahooApis\SS\V201909\Campaign\TargetSpendBiddingScheme
     */
    public function setBidCeiling($bidCeiling)
    {
      $this->bidCeiling = $bidCeiling;
      return $this;
    }

}
