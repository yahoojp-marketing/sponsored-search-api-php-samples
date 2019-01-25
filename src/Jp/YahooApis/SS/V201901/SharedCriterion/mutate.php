<?php

namespace Jp\YahooApis\SS\V201901\SharedCriterion;

class mutate
{

    /**
     * @var SharedCriterionOperation $operations
     */
    protected $operations = null;

    /**
     * @param SharedCriterionOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return SharedCriterionOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param SharedCriterionOperation $operations
     * @return \Jp\YahooApis\SS\V201901\SharedCriterion\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
