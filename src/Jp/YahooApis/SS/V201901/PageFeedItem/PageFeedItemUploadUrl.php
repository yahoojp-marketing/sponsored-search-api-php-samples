<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemUploadUrl
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var PageFeedItemUploadType $uploadType
     */
    protected $uploadType = null;

    /**
     * @var int $feedFolderId
     */
    protected $feedFolderId = null;

    /**
     * @var string $url
     */
    protected $url = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrl
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return PageFeedItemUploadType
     */
    public function getUploadType()
    {
      return $this->uploadType;
    }

    /**
     * @param PageFeedItemUploadType $uploadType
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrl
     */
    public function setUploadType($uploadType)
    {
      $this->uploadType = $uploadType;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedFolderId()
    {
      return $this->feedFolderId;
    }

    /**
     * @param int $feedFolderId
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrl
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
      return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
      return $this->url;
    }

    /**
     * @param string $url
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrl
     */
    public function setUrl($url)
    {
      $this->url = $url;
      return $this;
    }

}
