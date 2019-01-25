<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class get
{

    /**
     * @var BiddingStrategySelector $selector
     */
    protected $selector = null;

    /**
     * @param BiddingStrategySelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return BiddingStrategySelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param BiddingStrategySelector $selector
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
