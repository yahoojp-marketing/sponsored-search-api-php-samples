<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class PageOnePromotedBiddingScheme extends BiddingScheme
{

    /**
     * @var TargetPositionType $targetPositionType
     */
    protected $targetPositionType = null;

    /**
     * @var int $bidCeiling
     */
    protected $bidCeiling = null;

    /**
     * @var float $bidMultiplier
     */
    protected $bidMultiplier = null;

    /**
     * @var BidChangesForRaisesOnly $bidChangesForRaisesOnly
     */
    protected $bidChangesForRaisesOnly = null;

    /**
     * @var RaiseBidWhenBudgetConstrained $raiseBidWhenBudgetConstrained
     */
    protected $raiseBidWhenBudgetConstrained = null;

    /**
     * @var RaiseBidWhenLowQualityScore $raiseBidWhenLowQualityScore
     */
    protected $raiseBidWhenLowQualityScore = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return TargetPositionType
     */
    public function getTargetPositionType()
    {
      return $this->targetPositionType;
    }

    /**
     * @param TargetPositionType $targetPositionType
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setTargetPositionType($targetPositionType)
    {
      $this->targetPositionType = $targetPositionType;
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setBidCeiling($bidCeiling)
    {
      $this->bidCeiling = $bidCeiling;
      return $this;
    }

    /**
     * @return float
     */
    public function getBidMultiplier()
    {
      return $this->bidMultiplier;
    }

    /**
     * @param float $bidMultiplier
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setBidMultiplier($bidMultiplier)
    {
      $this->bidMultiplier = $bidMultiplier;
      return $this;
    }

    /**
     * @return BidChangesForRaisesOnly
     */
    public function getBidChangesForRaisesOnly()
    {
      return $this->bidChangesForRaisesOnly;
    }

    /**
     * @param BidChangesForRaisesOnly $bidChangesForRaisesOnly
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setBidChangesForRaisesOnly($bidChangesForRaisesOnly)
    {
      $this->bidChangesForRaisesOnly = $bidChangesForRaisesOnly;
      return $this;
    }

    /**
     * @return RaiseBidWhenBudgetConstrained
     */
    public function getRaiseBidWhenBudgetConstrained()
    {
      return $this->raiseBidWhenBudgetConstrained;
    }

    /**
     * @param RaiseBidWhenBudgetConstrained $raiseBidWhenBudgetConstrained
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setRaiseBidWhenBudgetConstrained($raiseBidWhenBudgetConstrained)
    {
      $this->raiseBidWhenBudgetConstrained = $raiseBidWhenBudgetConstrained;
      return $this;
    }

    /**
     * @return RaiseBidWhenLowQualityScore
     */
    public function getRaiseBidWhenLowQualityScore()
    {
      return $this->raiseBidWhenLowQualityScore;
    }

    /**
     * @param RaiseBidWhenLowQualityScore $raiseBidWhenLowQualityScore
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\PageOnePromotedBiddingScheme
     */
    public function setRaiseBidWhenLowQualityScore($raiseBidWhenLowQualityScore)
    {
      $this->raiseBidWhenLowQualityScore = $raiseBidWhenLowQualityScore;
      return $this;
    }

}
