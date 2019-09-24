<?php

namespace Jp\YahooApis\SS\V201909\AdGroupRetargetingList;

class get
{

    /**
     * @var AdGroupRetargetingListSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupRetargetingListSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupRetargetingListSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupRetargetingListSelector $selector
     * @return \Jp\YahooApis\SS\V201909\AdGroupRetargetingList\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
