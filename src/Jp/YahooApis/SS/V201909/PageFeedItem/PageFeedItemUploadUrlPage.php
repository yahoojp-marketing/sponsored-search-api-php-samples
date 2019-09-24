<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemUploadUrlPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var PageFeedItemUploadUrlValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemUploadUrlValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param PageFeedItemUploadUrlValues[] $values
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
