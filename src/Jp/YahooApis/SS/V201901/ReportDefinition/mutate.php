<?php

namespace Jp\YahooApis\SS\V201901\ReportDefinition;

class mutate
{

    /**
     * @var ReportDefinitionOperation $operations
     */
    protected $operations = null;

    /**
     * @param ReportDefinitionOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return ReportDefinitionOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param ReportDefinitionOperation $operations
     * @return \Jp\YahooApis\SS\V201901\ReportDefinition\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
