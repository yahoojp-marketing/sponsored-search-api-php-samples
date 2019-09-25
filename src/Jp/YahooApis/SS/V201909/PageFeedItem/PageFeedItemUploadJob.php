<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemUploadJob extends PageFeedItemJob
{

    /**
     * @var PageFeedItemUploadJobStatus $uploadJobStatus
     */
    protected $uploadJobStatus = null;

    /**
     * @var int $errorCount
     */
    protected $errorCount = null;

    /**
     * @var string $errorFileUrl
     */
    protected $errorFileUrl = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemUploadJobStatus
     */
    public function getUploadJobStatus()
    {
      return $this->uploadJobStatus;
    }

    /**
     * @param PageFeedItemUploadJobStatus $uploadJobStatus
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadJob
     */
    public function setUploadJobStatus($uploadJobStatus)
    {
      $this->uploadJobStatus = $uploadJobStatus;
      return $this;
    }

    /**
     * @return int
     */
    public function getErrorCount()
    {
      return $this->errorCount;
    }

    /**
     * @param int $errorCount
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadJob
     */
    public function setErrorCount($errorCount)
    {
      $this->errorCount = $errorCount;
      return $this;
    }

    /**
     * @return string
     */
    public function getErrorFileUrl()
    {
      return $this->errorFileUrl;
    }

    /**
     * @param string $errorFileUrl
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadJob
     */
    public function setErrorFileUrl($errorFileUrl)
    {
      $this->errorFileUrl = $errorFileUrl;
      return $this;
    }

}
