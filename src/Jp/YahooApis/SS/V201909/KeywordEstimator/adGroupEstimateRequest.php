<?php

namespace Jp\YahooApis\SS\V201909\KeywordEstimator;

class adGroupEstimateRequest
{

    /**
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var keywordEstimateRequest[] $keywordEstimateRequests
     */
    protected $keywordEstimateRequests = null;

    /**
     * @var int $maxCpc
     */
    protected $maxCpc = null;

    /**
     * @param keywordEstimateRequest[] $keywordEstimateRequests
     */
    public function __construct(array $keywordEstimateRequests)
    {
      $this->keywordEstimateRequests = $keywordEstimateRequests;
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
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\adGroupEstimateRequest
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return keywordEstimateRequest[]
     */
    public function getKeywordEstimateRequests()
    {
      return $this->keywordEstimateRequests;
    }

    /**
     * @param keywordEstimateRequest[] $keywordEstimateRequests
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\adGroupEstimateRequest
     */
    public function setKeywordEstimateRequests(array $keywordEstimateRequests)
    {
      $this->keywordEstimateRequests = $keywordEstimateRequests;
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
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\adGroupEstimateRequest
     */
    public function setMaxCpc($maxCpc)
    {
      $this->maxCpc = $maxCpc;
      return $this;
    }

}
