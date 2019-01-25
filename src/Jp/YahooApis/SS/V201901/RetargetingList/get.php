<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class get
{

    /**
     * @var RetargetingListSelector $selector
     */
    protected $selector = null;

    /**
     * @param RetargetingListSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return RetargetingListSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param RetargetingListSelector $selector
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
