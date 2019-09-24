<?php

namespace Jp\YahooApis\SS\V201909\AccountTrackingUrl;

class mutate
{

    /**
     * @var AccountTrackingUrlOperation $operations
     */
    protected $operations = null;

    /**
     * @param AccountTrackingUrlOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AccountTrackingUrlOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AccountTrackingUrlOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
