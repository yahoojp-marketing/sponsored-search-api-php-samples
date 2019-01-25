<?php

namespace Jp\YahooApis\SS\V201901\AccountShared;

class get
{

    /**
     * @var AccountSharedSelector $selector
     */
    protected $selector = null;

    /**
     * @param AccountSharedSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AccountSharedSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AccountSharedSelector $selector
     * @return \Jp\YahooApis\SS\V201901\AccountShared\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
