<?php

namespace Jp\YahooApis\SS\V201901\CampaignExport;

class get
{

    /**
     * @var JobSelector $selector
     */
    protected $selector = null;

    /**
     * @param JobSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return JobSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param JobSelector $selector
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
