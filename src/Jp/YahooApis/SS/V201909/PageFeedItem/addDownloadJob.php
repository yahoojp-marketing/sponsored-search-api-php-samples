<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class addDownloadJob
{

    /**
     * @var PageFeedItemDownloadJobOperation $operations
     */
    protected $operations = null;

    /**
     * @param PageFeedItemDownloadJobOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return PageFeedItemDownloadJobOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param PageFeedItemDownloadJobOperation $operations
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\addDownloadJob
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
