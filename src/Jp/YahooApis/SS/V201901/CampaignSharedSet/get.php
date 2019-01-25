<?php

namespace Jp\YahooApis\SS\V201901\CampaignSharedSet;

class get
{

    /**
     * @var CampaignSharedSetSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignSharedSetSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignSharedSetSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignSharedSetSelector $selector
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
