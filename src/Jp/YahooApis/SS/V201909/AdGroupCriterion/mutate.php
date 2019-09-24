<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class mutate
{

    /**
     * @var AdGroupCriterionOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupCriterionOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupCriterionOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupCriterionOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
