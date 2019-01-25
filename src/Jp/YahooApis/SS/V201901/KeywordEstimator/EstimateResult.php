<?php

namespace Jp\YahooApis\SS\V201901\KeywordEstimator;

class EstimateResult
{

    /**
     * @var float $clicks
     */
    protected $clicks = null;

    /**
     * @var float $rank
     */
    protected $rank = null;

    /**
     * @var float $cpc
     */
    protected $cpc = null;

    /**
     * @var float $cost
     */
    protected $cost = null;

    /**
     * @var float $impressions
     */
    protected $impressions = null;

    /**
     * @var float $ctr
     */
    protected $ctr = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return float
     */
    public function getClicks()
    {
      return $this->clicks;
    }

    /**
     * @param float $clicks
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setClicks($clicks)
    {
      $this->clicks = $clicks;
      return $this;
    }

    /**
     * @return float
     */
    public function getRank()
    {
      return $this->rank;
    }

    /**
     * @param float $rank
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setRank($rank)
    {
      $this->rank = $rank;
      return $this;
    }

    /**
     * @return float
     */
    public function getCpc()
    {
      return $this->cpc;
    }

    /**
     * @param float $cpc
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setCpc($cpc)
    {
      $this->cpc = $cpc;
      return $this;
    }

    /**
     * @return float
     */
    public function getCost()
    {
      return $this->cost;
    }

    /**
     * @param float $cost
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setCost($cost)
    {
      $this->cost = $cost;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpressions()
    {
      return $this->impressions;
    }

    /**
     * @param float $impressions
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setImpressions($impressions)
    {
      $this->impressions = $impressions;
      return $this;
    }

    /**
     * @return float
     */
    public function getCtr()
    {
      return $this->ctr;
    }

    /**
     * @param float $ctr
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\EstimateResult
     */
    public function setCtr($ctr)
    {
      $this->ctr = $ctr;
      return $this;
    }

}
