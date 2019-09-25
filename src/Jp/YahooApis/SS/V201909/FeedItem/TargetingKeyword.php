<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class TargetingKeyword
{

    /**
     * @var int $targetingKeywordId
     */
    protected $targetingKeywordId = null;

    /**
     * @var string $text
     */
    protected $text = null;

    /**
     * @var KeywordMatchType $matchType
     */
    protected $matchType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getTargetingKeywordId()
    {
      return $this->targetingKeywordId;
    }

    /**
     * @param int $targetingKeywordId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\TargetingKeyword
     */
    public function setTargetingKeywordId($targetingKeywordId)
    {
      $this->targetingKeywordId = $targetingKeywordId;
      return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
      return $this->text;
    }

    /**
     * @param string $text
     * @return \Jp\YahooApis\SS\V201909\FeedItem\TargetingKeyword
     */
    public function setText($text)
    {
      $this->text = $text;
      return $this;
    }

    /**
     * @return KeywordMatchType
     */
    public function getMatchType()
    {
      return $this->matchType;
    }

    /**
     * @param KeywordMatchType $matchType
     * @return \Jp\YahooApis\SS\V201909\FeedItem\TargetingKeyword
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

}
