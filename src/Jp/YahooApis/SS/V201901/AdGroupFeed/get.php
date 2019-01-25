<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class get
{

    /**
     * @var AdGroupFeedSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupFeedSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupFeedSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupFeedSelector $selector
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
