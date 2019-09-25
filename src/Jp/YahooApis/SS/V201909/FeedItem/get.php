<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class get
{

    /**
     * @var FeedItemSelector $selector
     */
    protected $selector = null;

    /**
     * @param FeedItemSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return FeedItemSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param FeedItemSelector $selector
     * @return \Jp\YahooApis\SS\V201909\FeedItem\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
