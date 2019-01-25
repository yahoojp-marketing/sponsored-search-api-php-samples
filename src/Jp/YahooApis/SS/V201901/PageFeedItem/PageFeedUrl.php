<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedUrl
{

    /**
     * @var string $text
     */
    protected $text = null;

    /**
     * @var PageFeedUrlMatchType $matchType
     */
    protected $matchType = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedUrl
     */
    public function setText($text)
    {
      $this->text = $text;
      return $this;
    }

    /**
     * @return PageFeedUrlMatchType
     */
    public function getMatchType()
    {
      return $this->matchType;
    }

    /**
     * @param PageFeedUrlMatchType $matchType
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedUrl
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

}
