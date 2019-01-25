<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class get
{

    /**
     * @var CampaignSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignSelector $selector
     * @return \Jp\YahooApis\SS\V201901\Campaign\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
