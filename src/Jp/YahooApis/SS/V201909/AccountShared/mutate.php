<?php

namespace Jp\YahooApis\SS\V201909\AccountShared;

class mutate
{

    /**
     * @var AccountSharedOperation $operations
     */
    protected $operations = null;

    /**
     * @param AccountSharedOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AccountSharedOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AccountSharedOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AccountShared\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
