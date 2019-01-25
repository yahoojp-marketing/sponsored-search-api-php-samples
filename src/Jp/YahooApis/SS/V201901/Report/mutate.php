<?php

namespace Jp\YahooApis\SS\V201901\Report;

class mutate
{

    /**
     * @var ReportOperation $operations
     */
    protected $operations = null;

    /**
     * @param ReportOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return ReportOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param ReportOperation $operations
     * @return \Jp\YahooApis\SS\V201901\Report\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
