<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class TargetCpaBiddingScheme extends BiddingScheme
{

    /**
     * @var int $targetCpa
     */
    protected $targetCpa = null;

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
     * @return int
     */
    public function getTargetCpa()
    {
      return $this->targetCpa;
    }

    /**
     * @param int $targetCpa
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\TargetCpaBiddingScheme
     */
    public function setTargetCpa($targetCpa)
    {
      $this->targetCpa = $targetCpa;
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\TargetCpaBiddingScheme
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\TargetCpaBiddingScheme
     */
    public function setBidFloor($bidFloor)
    {
      $this->bidFloor = $bidFloor;
      return $this;
    }

}
