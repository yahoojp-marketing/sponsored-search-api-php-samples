<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class mutate
{

    /**
     * @var CampaignWebpageOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignWebpageOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignWebpageOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignWebpageOperation $operations
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
