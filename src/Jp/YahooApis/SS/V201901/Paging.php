<?php

namespace Jp\YahooApis\SS\V201901;

class Paging
{

    /**
     * @var int $startIndex
     */
    protected $startIndex = null;

    /**
     * @var int $numberResults
     */
    protected $numberResults = null;

    /**
     * @param int $startIndex
     * @param int $numberResults
     */
    public function __construct($startIndex, $numberResults)
    {
      $this->startIndex = $startIndex;
      $this->numberResults = $numberResults;
    }

    /**
     * @return int
     */
    public function getStartIndex()
    {
      return $this->startIndex;
    }

    /**
     * @param int $startIndex
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function setStartIndex($startIndex)
    {
      $this->startIndex = $startIndex;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumberResults()
    {
      return $this->numberResults;
    }

    /**
     * @param int $numberResults
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function setNumberResults($numberResults)
    {
      $this->numberResults = $numberResults;
      return $this;
    }

}
