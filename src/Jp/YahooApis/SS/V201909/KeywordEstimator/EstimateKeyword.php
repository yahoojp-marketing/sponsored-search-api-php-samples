<?php

namespace Jp\YahooApis\SS\V201909\KeywordEstimator;

class EstimateKeyword
{

    /**
     * @var string $text
     */
    protected $text = null;

    /**
     * @var KeywordMatchType $matchType
     */
    protected $matchType = null;

    /**
     * @param string $text
     * @param KeywordMatchType $matchType
     */
    public function __construct($text, $matchType)
    {
      $this->text = $text;
      $this->matchType = $matchType;
    }

    /**
     * @return string
     */
    public function getText()
    {
      return $this->text;
    }

    /**
     * @param string $text
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\EstimateKeyword
     */
    public function setText($text)
    {
      $this->text = $text;
      return $this;
    }

    /**
     * @return KeywordMatchType
     */
    public function getMatchType()
    {
      return $this->matchType;
    }

    /**
     * @param KeywordMatchType $matchType
     * @return \Jp\YahooApis\SS\V201909\KeywordEstimator\EstimateKeyword
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

}
