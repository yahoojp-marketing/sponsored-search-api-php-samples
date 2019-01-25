<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class getReviewSummary
{

    /**
     * @var PageFeedItemReviewSummarySelector $selector
     */
    protected $selector = null;

    /**
     * @param PageFeedItemReviewSummarySelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return PageFeedItemReviewSummarySelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param PageFeedItemReviewSummarySelector $selector
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\getReviewSummary
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
