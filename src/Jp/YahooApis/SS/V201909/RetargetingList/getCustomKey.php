<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class getCustomKey
{

    /**
     * @var GetCustomKeySelector $selector
     */
    protected $selector = null;

    /**
     * @param GetCustomKeySelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return GetCustomKeySelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param GetCustomKeySelector $selector
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\getCustomKey
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
