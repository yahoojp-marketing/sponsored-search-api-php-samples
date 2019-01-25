<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemReturnValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var PageFeedItem $pageFeedItem
     */
    protected $pageFeedItem = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItem
     */
    public function getPageFeedItem()
    {
      return $this->pageFeedItem;
    }

    /**
     * @param PageFeedItem $pageFeedItem
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReturnValues
     */
    public function setPageFeedItem($pageFeedItem)
    {
      $this->pageFeedItem = $pageFeedItem;
      return $this;
    }

}
