<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemUploadUrlPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrlPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
