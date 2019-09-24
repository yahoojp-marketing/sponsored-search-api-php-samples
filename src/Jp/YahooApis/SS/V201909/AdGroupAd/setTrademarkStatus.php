<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class setTrademarkStatus
{

    /**
     * @var AdGroupAdSetTrademarkStatusOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupAdSetTrademarkStatusOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupAdSetTrademarkStatusOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupAdSetTrademarkStatusOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\setTrademarkStatus
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
