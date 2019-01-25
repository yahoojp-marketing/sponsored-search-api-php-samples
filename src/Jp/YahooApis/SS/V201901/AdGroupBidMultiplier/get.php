<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class get
{

    /**
     * @var AdGroupBidMultiplierSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupBidMultiplierSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupBidMultiplierSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupBidMultiplierSelector $selector
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
