<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemUploadUrlValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var PageFeedItemUploadUrl $uploadUrl
     */
    protected $uploadUrl = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemUploadUrl
     */
    public function getUploadUrl()
    {
      return $this->uploadUrl;
    }

    /**
     * @param PageFeedItemUploadUrl $uploadUrl
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlValues
     */
    public function setUploadUrl($uploadUrl)
    {
      $this->uploadUrl = $uploadUrl;
      return $this;
    }

}
