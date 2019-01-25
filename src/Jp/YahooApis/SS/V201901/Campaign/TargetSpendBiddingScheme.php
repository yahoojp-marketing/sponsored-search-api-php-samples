<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class TargetSpendBiddingScheme extends BiddingScheme
{

    /**
     * @var int $bidCeiling
     */
    protected $bidCeiling = null;

    /**
     * @var int $spendTarget
     */
    protected $spendTarget = null;

    
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
     * @return \Jp\YahooApis\SS\V201901\Campaign\TargetSpendBiddingScheme
     */
    public function setBidCeiling($bidCeiling)
    {
      $this->bidCeiling = $bidCeiling;
      return $this;
    }

    /**
     * @return int
     */
    public function getSpendTarget()
    {
      return $this->spendTarget;
    }

    /**
     * @param int $spendTarget
     * @return \Jp\YahooApis\SS\V201901\Campaign\TargetSpendBiddingScheme
     */
    public function setSpendTarget($spendTarget)
    {
      $this->spendTarget = $spendTarget;
      return $this;
    }

}
