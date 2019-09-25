<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class get
{

    /**
     * @var AdGroupCriterionSelector $selector
     */
    protected $selector = null;

    /**
     * @param AdGroupCriterionSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AdGroupCriterionSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AdGroupCriterionSelector $selector
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
