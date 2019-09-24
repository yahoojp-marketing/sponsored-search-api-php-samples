<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class get
{

    /**
     * @var CampaignTargetSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignTargetSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignTargetSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignTargetSelector $selector
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
