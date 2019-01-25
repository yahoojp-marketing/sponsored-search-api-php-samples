<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class mutate
{

    /**
     * @var RetargetingListOperation $operations
     */
    protected $operations = null;

    /**
     * @param RetargetingListOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return RetargetingListOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param RetargetingListOperation $operations
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
