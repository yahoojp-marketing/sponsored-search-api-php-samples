<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class mutate
{

    /**
     * @var BiddingStrategyOperation $operations
     */
    protected $operations = null;

    /**
     * @param BiddingStrategyOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return BiddingStrategyOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param BiddingStrategyOperation $operations
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
