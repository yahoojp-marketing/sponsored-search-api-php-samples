<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class get
{

    /**
     * @var SharedCriterionSelector $selector
     */
    protected $selector = null;

    /**
     * @param SharedCriterionSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return SharedCriterionSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param SharedCriterionSelector $selector
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
