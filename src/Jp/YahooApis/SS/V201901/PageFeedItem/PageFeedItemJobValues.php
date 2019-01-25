<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemJobValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var PageFeedItemJob $job
     */
    protected $job = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemJob
     */
    public function getJob()
    {
      return $this->job;
    }

    /**
     * @param PageFeedItemJob $job
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobValues
     */
    public function setJob($job)
    {
      $this->job = $job;
      return $this;
    }

}
