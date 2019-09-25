<?php

namespace Jp\YahooApis\SS\V201909\KeywordEstimator;

class KeywordEstimateResult
{

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var string $keyword
     */
    protected $keyword = null;

    /**
     * @var EstimateResult $min
     */
    protected $min = null;

    /**
     * @var EstimateResult $max
     */
    protected $max = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->campaignId;
    }

    /**
     * @param int $campaignId
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->adGroupId;
    }

    /**
     * @param int $adGroupId
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
      return $this->keyword;
    }

    /**
     * @param string $keyword
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult
     */
    public function setKeyword($keyword)
    {
      $this->keyword = $keyword;
      return $this;
    }

    /**
     * @return EstimateResult
     */
    public function getMin()
    {
      return $this->min;
    }

    /**
     * @param EstimateResult $min
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult
     */
    public function setMin($min)
    {
      $this->min = $min;
      return $this;
    }

    /**
     * @return EstimateResult
     */
    public function getMax()
    {
      return $this->max;
    }

    /**
     * @param EstimateResult $max
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\KeywordEstimateResult
     */
    public function setMax($max)
    {
      $this->max = $max;
      return $this;
    }

}
