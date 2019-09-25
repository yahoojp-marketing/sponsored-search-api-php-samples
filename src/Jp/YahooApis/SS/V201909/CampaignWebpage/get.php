<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class get
{

    /**
     * @var CampaignWebpageSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignWebpageSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignWebpageSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignWebpageSelector $selector
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
