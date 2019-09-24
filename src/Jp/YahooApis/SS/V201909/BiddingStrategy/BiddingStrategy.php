<?php

namespace Jp\YahooApis\SS\V201909\BiddingStrategy;

class BiddingStrategy
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $biddingStrategyId
     */
    protected $biddingStrategyId = null;

    /**
     * @var string $biddingStrategyName
     */
    protected $biddingStrategyName = null;

    /**
     * @var BiddingStrategyType $biddingStrategyType
     */
    protected $biddingStrategyType = null;

    /**
     * @var BiddingScheme $biddingScheme
     */
    protected $biddingScheme = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getBiddingStrategyId()
    {
      return $this->biddingStrategyId;
    }

    /**
     * @param int $biddingStrategyId
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy
     */
    public function setBiddingStrategyId($biddingStrategyId)
    {
      $this->biddingStrategyId = $biddingStrategyId;
      return $this;
    }

    /**
     * @return string
     */
    public function getBiddingStrategyName()
    {
      return $this->biddingStrategyName;
    }

    /**
     * @param string $biddingStrategyName
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy
     */
    public function setBiddingStrategyName($biddingStrategyName)
    {
      $this->biddingStrategyName = $biddingStrategyName;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy
     */
    public function setBiddingStrategyType($biddingStrategyType)
    {
      $this->biddingStrategyType = $biddingStrategyType;
      return $this;
    }

    /**
     * @return BiddingScheme
     */
    public function getBiddingScheme()
    {
      return $this->biddingScheme;
    }

    /**
     * @param BiddingScheme $biddingScheme
     * @return \Jp\YahooApis\SS\V201909\BiddingStrategy\BiddingStrategy
     */
    public function setBiddingScheme($biddingScheme)
    {
      $this->biddingScheme = $biddingScheme;
      return $this;
    }

}
