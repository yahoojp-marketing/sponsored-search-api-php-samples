<?php

namespace Jp\YahooApis\SS\V201901\CampaignRetargetingList;

class get
{

    /**
     * @var CampaignRetargetingListSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignRetargetingListSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignRetargetingListSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignRetargetingListSelector $selector
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
