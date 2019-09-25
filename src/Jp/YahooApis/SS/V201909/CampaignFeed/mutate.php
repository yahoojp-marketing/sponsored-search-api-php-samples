<?php

namespace Jp\YahooApis\SS\V201909\CampaignFeed;

class mutate
{

    /**
     * @var CampaignFeedOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignFeedOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignFeedOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignFeedOperation $operations
     * @return \Jp\YahooApis\SS\V201909\CampaignFeed\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
