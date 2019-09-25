<?php

namespace Jp\YahooApis\SS\V201909\AdGroupWebpage;

class get
{

    /**
     * @var AdGroupWebpageSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupWebpageSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupWebpageSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupWebpageSelector $selector
     * @return \Jp\YahooApis\SS\V201909\AdGroupWebpage\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
