<?php

namespace Jp\YahooApis\SS\V201901\AdGroupRetargetingList;

class mutate
{

    /**
     * @var AdGroupRetargetingListOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupRetargetingListOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupRetargetingListOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupRetargetingListOperation $operations
     * @return \Jp\YahooApis\SS\V201901\AdGroupRetargetingList\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
