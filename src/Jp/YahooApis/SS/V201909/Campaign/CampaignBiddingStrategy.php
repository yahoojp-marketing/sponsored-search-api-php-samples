<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

class CampaignBiddingStrategy
{

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
     * @var BiddingStrategySource $biddingStrategySource
     */
    protected $biddingStrategySource = null;

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
    public function getBiddingStrategyId()
    {
      return $this->biddingStrategyId;
    }

    /**
     * @param int $biddingStrategyId
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy
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
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy
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
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy
     */
    public function setBiddingStrategyType($biddingStrategyType)
    {
      $this->biddingStrategyType = $biddingStrategyType;
      return $this;
    }

    /**
     * @return BiddingStrategySource
     */
    public function getBiddingStrategySource()
    {
      return $this->biddingStrategySource;
    }

    /**
     * @param BiddingStrategySource $biddingStrategySource
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy
     */
    public function setBiddingStrategySource($biddingStrategySource)
    {
      $this->biddingStrategySource = $biddingStrategySource;
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
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignBiddingStrategy
     */
    public function setBiddingScheme($biddingScheme)
    {
      $this->biddingScheme = $biddingScheme;
      return $this;
    }

}
