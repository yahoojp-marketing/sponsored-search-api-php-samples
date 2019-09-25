<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemSetTrademarkStatus
{

    /**
     * @var int $feedItemId
     */
    protected $feedItemId = null;

    /**
     * @param int $feedItemId
     */
    public function __construct($feedItemId)
    {
      $this->feedItemId = $feedItemId;
    }

    /**
     * @return int
     */
    public function getFeedItemId()
    {
      return $this->feedItemId;
    }

    /**
     * @param int $feedItemId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatus
     */
    public function setFeedItemId($feedItemId)
    {
      $this->feedItemId = $feedItemId;
      return $this;
    }

}
