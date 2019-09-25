<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterionLabel;

class mutate
{

    /**
     * @var AdGroupCriterionLabelOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupCriterionLabelOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupCriterionLabelOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupCriterionLabelOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterionLabel\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
