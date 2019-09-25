<?php

namespace Jp\YahooApis\SS\V201909\Account;

class get
{

    /**
     * @var AccountSelector $selector
     */
    protected $selector = null;

    /**
     * @param AccountSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AccountSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AccountSelector $selector
     * @return \Jp\YahooApis\SS\V201909\Account\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
