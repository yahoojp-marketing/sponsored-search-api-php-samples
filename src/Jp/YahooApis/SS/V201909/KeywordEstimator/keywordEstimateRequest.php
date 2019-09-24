<?php

namespace Jp\YahooApis\SS\V201909\KeywordEstimator;

class keywordEstimateRequest
{

    /**
     * @var EstimateKeyword $keyword
     */
    protected $keyword = null;

    /**
     * @var IsNegativeBool $isNegative
     */
    protected $isNegative = null;

    /**
     * @var int $maxCpc
     */
    protected $maxCpc = null;

    /**
     * @param EstimateKeyword $keyword
     */
    public function __construct($keyword)
    {
      $this->keyword = $keyword;
    }

    /**
     * @return EstimateKeyword
     */
    public function getKeyword()
    {
      return $this->keyword;
    }

    /**
     * @param EstimateKeyword $keyword
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\keywordEstimateRequest
     */
    public function setKeyword($keyword)
    {
      $this->keyword = $keyword;
      return $this;
    }

    /**
     * @return IsNegativeBool
     */
    public function getIsNegative()
    {
      return $this->isNegative;
    }

    /**
     * @param IsNegativeBool $isNegative
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\keywordEstimateRequest
     */
    public function setIsNegative($isNegative)
    {
      $this->isNegative = $isNegative;
      return $this;
    }

    /**
     * @return int
     */
    public function getMaxCpc()
    {
      return $this->maxCpc;
    }

    /**
     * @param int $maxCpc
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\keywordEstimateRequest
     */
    public function setMaxCpc($maxCpc)
    {
      $this->maxCpc = $maxCpc;
      return $this;
    }

}
