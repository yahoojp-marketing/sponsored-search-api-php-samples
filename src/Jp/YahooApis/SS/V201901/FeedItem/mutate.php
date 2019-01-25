<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class mutate
{

    /**
     * @var FeedItemOperation $operations
     */
    protected $operations = null;

    /**
     * @param FeedItemOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return FeedItemOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param FeedItemOperation $operations
     * @return \Jp\YahooApis\SS\V201901\FeedItem\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
