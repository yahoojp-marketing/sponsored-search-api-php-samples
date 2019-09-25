<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemDownloadJobValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var PageFeedItemDownloadJob $job
     */
    protected $job = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemDownloadJob
     */
    public function getJob()
    {
      return $this->job;
    }

    /**
     * @param PageFeedItemDownloadJob $job
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJobValues
     */
    public function setJob($job)
    {
      $this->job = $job;
      return $this;
    }

}
