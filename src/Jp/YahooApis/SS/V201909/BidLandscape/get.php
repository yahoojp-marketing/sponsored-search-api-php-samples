<?php

namespace Jp\YahooApis\SS\V201909\BidLandscape;

class get
{

    /**
     * @var BidLandscapeSelector $selector
     */
    protected $selector = null;

    /**
     * @param BidLandscapeSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return BidLandscapeSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param BidLandscapeSelector $selector
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
