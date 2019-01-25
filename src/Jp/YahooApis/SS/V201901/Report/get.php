<?php

namespace Jp\YahooApis\SS\V201901\Report;

class get
{

    /**
     * @var ReportSelector $selector
     */
    protected $selector = null;

    /**
     * @param ReportSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return ReportSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param ReportSelector $selector
     * @return \Jp\YahooApis\SS\V201901\Report\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
