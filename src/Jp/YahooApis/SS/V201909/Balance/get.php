<?php

namespace Jp\YahooApis\SS\V201909\Balance;

class get
{

    /**
     * @var BalanceSelector $selector
     */
    protected $selector = null;

    /**
     * @param BalanceSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return BalanceSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param BalanceSelector $selector
     * @return \Jp\YahooApis\SS\V201909\Balance\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
