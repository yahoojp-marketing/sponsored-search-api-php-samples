<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class mutate
{

    /**
     * @var AdGroupFeedOperation $operations
     */
    protected $operations = null;

    /**
     * @param AdGroupFeedOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AdGroupFeedOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AdGroupFeedOperation $operations
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
