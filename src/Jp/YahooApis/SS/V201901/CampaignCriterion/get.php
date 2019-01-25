<?php

namespace Jp\YahooApis\SS\V201901\CampaignCriterion;

class get
{

    /**
     * @var CampaignCriterionSelector $selector
     */
    protected $selector = null;

    /**
     * @param CampaignCriterionSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return CampaignCriterionSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param CampaignCriterionSelector $selector
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
