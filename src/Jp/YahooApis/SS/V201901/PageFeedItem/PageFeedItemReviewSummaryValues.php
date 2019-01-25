<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemReviewSummaryValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var PageFeedItemReviewSummary $reviewSummary
     */
    protected $reviewSummary = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemReviewSummary
     */
    public function getReviewSummary()
    {
      return $this->reviewSummary;
    }

    /**
     * @param PageFeedItemReviewSummary $reviewSummary
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummaryValues
     */
    public function setReviewSummary($reviewSummary)
    {
      $this->reviewSummary = $reviewSummary;
      return $this;
    }

}
