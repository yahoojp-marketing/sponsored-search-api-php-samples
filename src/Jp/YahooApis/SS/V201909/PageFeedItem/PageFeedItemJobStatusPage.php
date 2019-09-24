<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemJobStatusPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var PageFeedItemJobValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemJobValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param PageFeedItemJobValues[] $values
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJobStatusPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
