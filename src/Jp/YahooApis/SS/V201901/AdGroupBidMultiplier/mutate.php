<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class mutate
{

    /**
     * @var AdGroupBidMultiplierOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupBidMultiplierOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupBidMultiplierOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupBidMultiplierOperation $operations
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
