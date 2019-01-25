<?php

namespace Jp\YahooApis\SS\V201901\KeywordEstimator;

class get
{

    /**
     * @var KeywordEstimatorSelector $selector
     */
    protected $selector = null;

    /**
     * @param KeywordEstimatorSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return KeywordEstimatorSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param KeywordEstimatorSelector $selector
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
