<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class get
{

    /**
     * @var PageFeedItemSelector $selector
     */
    protected $selector = null;

    /**
     * @param PageFeedItemSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return PageFeedItemSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param PageFeedItemSelector $selector
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
