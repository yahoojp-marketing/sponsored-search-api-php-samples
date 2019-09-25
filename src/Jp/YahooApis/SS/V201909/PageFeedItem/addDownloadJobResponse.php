<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class addDownloadJobResponse
{

    /**
     * @var PageFeedItemDownloadJobReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param PageFeedItemDownloadJobReturnValue $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return PageFeedItemDownloadJobReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param PageFeedItemDownloadJobReturnValue $rval
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\addDownloadJobResponse
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\addDownloadJobResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
