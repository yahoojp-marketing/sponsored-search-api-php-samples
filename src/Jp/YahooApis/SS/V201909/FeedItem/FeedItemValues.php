<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var FeedItem $feedItem
     */
    protected $feedItem = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return FeedItem
     */
    public function getFeedItem()
    {
      return $this->feedItem;
    }

    /**
     * @param FeedItem $feedItem
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemValues
     */
    public function setFeedItem($feedItem)
    {
      $this->feedItem = $feedItem;
      return $this;
    }

}
