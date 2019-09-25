<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class get
{

    /**
     * @var TargetingIdeaSelector $selector
     */
    protected $selector = null;

    /**
     * @param TargetingIdeaSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return TargetingIdeaSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param TargetingIdeaSelector $selector
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
