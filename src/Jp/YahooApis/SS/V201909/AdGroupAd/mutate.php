<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class mutate
{

    /**
     * @var AdGroupAdOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupAdOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupAdOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupAdOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
