<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class mutate
{

    /**
     * @var AdGroupWebpageOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupWebpageOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupWebpageOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupWebpageOperation $operations
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
