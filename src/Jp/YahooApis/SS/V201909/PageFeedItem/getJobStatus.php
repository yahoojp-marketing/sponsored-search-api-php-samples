<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class getJobStatus
{

    /**
     * @var PageFeedItemJobStatusSelector $selector
     */
    protected $selector = null;

    /**
     * @param PageFeedItemJobStatusSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return PageFeedItemJobStatusSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param PageFeedItemJobStatusSelector $selector
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\getJobStatus
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
