<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class setTrademarkStatus
{

    /**
     * @var FeedItemSetTrademarkStatusOperation $operations
     */
    protected $operations = null;

    /**
     * @param FeedItemSetTrademarkStatusOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return FeedItemSetTrademarkStatusOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param FeedItemSetTrademarkStatusOperation $operations
     * @return \Jp\YahooApis\SS\V201909\FeedItem\setTrademarkStatus
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
