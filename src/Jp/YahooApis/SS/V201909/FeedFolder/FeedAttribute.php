<?php

namespace Jp\YahooApis\SS\V201909\FeedFolder;

class FeedAttribute
{

    /**
     * @var int $feedAttributeId
     */
    protected $feedAttributeId = null;

    /**
     * @var string $feedAttributeName
     */
    protected $feedAttributeName = null;

    /**
     * @var FeedFolderPlaceholderField $placeholderField
     */
    protected $placeholderField = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedAttribute
     */
    public function setFeedAttributeId($feedAttributeId)
    {
      $this->feedAttributeId = $feedAttributeId;
      return $this;
    }

    /**
     * @return string
     */
    public function getFeedAttributeName()
    {
      return $this->feedAttributeName;
    }

    /**
     * @param string $feedAttributeName
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedAttribute
     */
    public function setFeedAttributeName($feedAttributeName)
    {
      $this->feedAttributeName = $feedAttributeName;
      return $this;
    }

    /**
     * @return FeedFolderPlaceholderField
     */
    public function getPlaceholderField()
    {
      return $this->placeholderField;
    }

    /**
     * @param FeedFolderPlaceholderField $placeholderField
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedAttribute
     */
    public function setPlaceholderField($placeholderField)
    {
      $this->placeholderField = $placeholderField;
      return $this;
    }

}
