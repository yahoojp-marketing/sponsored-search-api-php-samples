<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class MultipleFeedItemAttribute extends FeedItemAttribute
{

    /**
     * @var FeedAttributeValue[] $feedAttributeValues
     */
    protected $feedAttributeValues = null;

    /**
     * @var IsRemove $isRemove
     */
    protected $isRemove = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return FeedAttributeValue[]
     */
    public function getFeedAttributeValues()
    {
      return $this->feedAttributeValues;
    }

    /**
     * @param FeedAttributeValue[] $feedAttributeValues
     * @return \Jp\YahooApis\SS\V201901\FeedItem\MultipleFeedItemAttribute
     */
    public function setFeedAttributeValues(array $feedAttributeValues = null)
    {
      $this->feedAttributeValues = $feedAttributeValues;
      return $this;
    }

    /**
     * @return IsRemove
     */
    public function getIsRemove()
    {
      return $this->isRemove;
    }

    /**
     * @param IsRemove $isRemove
     * @return \Jp\YahooApis\SS\V201901\FeedItem\MultipleFeedItemAttribute
     */
    public function setIsRemove($isRemove)
    {
      $this->isRemove = $isRemove;
      return $this;
    }

}
