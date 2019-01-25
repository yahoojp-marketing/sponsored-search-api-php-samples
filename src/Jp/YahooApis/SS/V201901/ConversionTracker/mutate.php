<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class mutate
{

    /**
     * @var ConversionTrackerOperation $operations
     */
    protected $operations = null;

    /**
     * @param ConversionTrackerOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return ConversionTrackerOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param ConversionTrackerOperation $operations
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
