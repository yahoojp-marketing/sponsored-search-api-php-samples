<?php

namespace Jp\YahooApis\SS\V201901\CampaignFeed;

class get
{

    /**
     * @var CampaignFeedSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignFeedSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignFeedSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignFeedSelector $selector
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
