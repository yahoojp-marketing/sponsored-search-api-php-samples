<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

abstract class FeedItemAttribute
{

    /**
     * @var FeedItemPlaceholderField $placeholderField
     */
    protected $placeholderField = null;

    /**
     * @var int $feedAttributeId
     */
    protected $feedAttributeId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FeedItemPlaceholderField
     */
    public function getPlaceholderField()
    {
      return $this->placeholderField;
    }

    /**
     * @param FeedItemPlaceholderField $placeholderField
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemAttribute
     */
    public function setPlaceholderField($placeholderField)
    {
      $this->placeholderField = $placeholderField;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedAttributeId()
    {
      return $this->feedAttributeId;
    }

    /**
     * @param int $feedAttributeId
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemAttribute
     */
    public function setFeedAttributeId($feedAttributeId)
    {
      $this->feedAttributeId = $feedAttributeId;
      return $this;
    }

}
