<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class getUploadUrl
{

    /**
     * @var PageFeedItemUploadUrlOperation $operations
     */
    protected $operations = null;

    /**
     * @param PageFeedItemUploadUrlOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return PageFeedItemUploadUrlOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param PageFeedItemUploadUrlOperation $operations
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\getUploadUrl
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
