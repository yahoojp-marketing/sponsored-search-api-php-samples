<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class getUploadUrlResponse
{

    /**
     * @var PageFeedItemUploadUrlPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param PageFeedItemUploadUrlPage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return PageFeedItemUploadUrlPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param PageFeedItemUploadUrlPage $rval
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\getUploadUrlResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Error
     */
    public function getError()
    {
      return $this->error;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Error $error
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\getUploadUrlResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
