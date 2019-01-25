<?php

namespace Jp\YahooApis\SS\V201901\AdGroup;

class get
{

    /**
     * @var AdGroupSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupSelector $selector
     * @return \Jp\YahooApis\SS\V201901\AdGroup\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
