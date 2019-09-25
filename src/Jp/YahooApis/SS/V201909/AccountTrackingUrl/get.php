<?php

namespace Jp\YahooApis\SS\V201909\AccountTrackingUrl;

class get
{

    /**
     * @var AccountTrackingUrlSelector $selector
     */
    protected $selector = null;

    /**
     * @param AccountTrackingUrlSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AccountTrackingUrlSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AccountTrackingUrlSelector $selector
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
