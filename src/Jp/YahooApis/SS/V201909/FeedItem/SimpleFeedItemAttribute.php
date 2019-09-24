<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class SimpleFeedItemAttribute extends FeedItemAttribute
{

    /**
     * @var string $feedAttributeValue
     */
    protected $feedAttributeValue = null;

    /**
     * @var string $reviewFeedAttributeValue
     */
    protected $reviewFeedAttributeValue = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getFeedAttributeValue()
    {
      return $this->feedAttributeValue;
    }

    /**
     * @param string $feedAttributeValue
     * @return \Jp\YahooApis\SS\V201909\FeedItem\SimpleFeedItemAttribute
     */
    public function setFeedAttributeValue($feedAttributeValue)
    {
      $this->feedAttributeValue = $feedAttributeValue;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewFeedAttributeValue()
    {
      return $this->reviewFeedAttributeValue;
    }

    /**
     * @param string $reviewFeedAttributeValue
     * @return \Jp\YahooApis\SS\V201909\FeedItem\SimpleFeedItemAttribute
     */
    public function setReviewFeedAttributeValue($reviewFeedAttributeValue)
    {
      $this->reviewFeedAttributeValue = $reviewFeedAttributeValue;
      return $this;
    }

}
