<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAdLabel;

class mutate
{

    /**
     * @var AdGroupAdLabelOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupAdLabelOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupAdLabelOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupAdLabelOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AdGroupAdLabel\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
