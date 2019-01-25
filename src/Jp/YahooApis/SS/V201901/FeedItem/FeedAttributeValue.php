<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class FeedAttributeValue
{

    /**
     * @var string $feedAttributeValue
     */
    protected $feedAttributeValue = null;

    /**
     * @var string $reviewFeedAttributeValue
     */
    protected $reviewFeedAttributeValue = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedAttributeValue
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
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedAttributeValue
     */
    public function setReviewFeedAttributeValue($reviewFeedAttributeValue)
    {
      $this->reviewFeedAttributeValue = $reviewFeedAttributeValue;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getDisapprovalReasonCodes()
    {
      return $this->disapprovalReasonCodes;
    }

    /**
     * @param string[] $disapprovalReasonCodes
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedAttributeValue
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
