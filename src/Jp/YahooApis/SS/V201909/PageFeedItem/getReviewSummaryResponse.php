<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class getReviewSummaryResponse
{

    /**
     * @var PageFeedItemReviewSummaryPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param PageFeedItemReviewSummaryPage $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return PageFeedItemReviewSummaryPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param PageFeedItemReviewSummaryPage $rval
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\getReviewSummaryResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201909\Error
     */
    public function getError()
    {
      return $this->error;
    }

    /**
     * @param \Jp\YahooApis\SS\V201909\Error $error
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\getReviewSummaryResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
