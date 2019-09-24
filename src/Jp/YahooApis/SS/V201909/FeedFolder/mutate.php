<?php

namespace Jp\YahooApis\SS\V201909\FeedFolder;

class mutate
{

    /**
     * @var FeedFolderOperation $operations
     */
    protected $operations = null;

    /**
     * @param FeedFolderOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return FeedFolderOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param FeedFolderOperation $operations
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
