<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

class TargetRoasBiddingScheme extends BiddingScheme
{

    /**
     * @var float $targetRoas
     */
    protected $targetRoas = null;

    /**
     * @var int $bidCeiling
     */
    protected $bidCeiling = null;

    /**
     * @var int $bidFloor
     */
    protected $bidFloor = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return float
     */
    public function getTargetRoas()
    {
      return $this->targetRoas;
    }

    /**
     * @param float $targetRoas
     * @return \Jp\YahooApis\SS\V201909\Campaign\TargetRoasBiddingScheme
     */
    public function setTargetRoas($targetRoas)
    {
      $this->targetRoas = $targetRoas;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\Campaign\TargetRoasBiddingScheme
     */
    public function setBidCeiling($bidCeiling)
    {
      $this->bidCeiling = $bidCeiling;
      return $this;
    }

    /**
     * @return int
     */
    public function getBidFloor()
    {
      return $this->bidFloor;
    }

    /**
     * @param int $bidFloor
     * @return \Jp\YahooApis\SS\V201909\Campaign\TargetRoasBiddingScheme
     */
    public function setBidFloor($bidFloor)
    {
      $this->bidFloor = $bidFloor;
      return $this;
    }

}
