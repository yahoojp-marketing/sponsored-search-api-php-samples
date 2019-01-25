<?php

namespace Jp\YahooApis\SS\V201901;

abstract class Page
{

    /**
     * @var int $totalNumEntries
     */
    protected $totalNumEntries = null;

    /**
     * @var string $PageType
     */
    protected $PageType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getTotalNumEntries()
    {
      return $this->totalNumEntries;
    }

    /**
     * @param int $totalNumEntries
     * @return \Jp\YahooApis\SS\V201901\Page
     */
    public function setTotalNumEntries($totalNumEntries)
    {
      $this->totalNumEntries = $totalNumEntries;
      return $this;
    }

    /**
     * @return string
     */
    public function getPageType()
    {
      return $this->PageType;
    }

    /**
     * @param string $PageType
     * @return \Jp\YahooApis\SS\V201901\Page
     */
    public function setPageType($PageType)
    {
      $this->PageType = $PageType;
      return $this;
    }

}
