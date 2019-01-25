<?php

namespace Jp\YahooApis\SS\V201901\CampaignSharedSet;

class mutate
{

    /**
     * @var CampaignSharedSetOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignSharedSetOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignSharedSetOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignSharedSetOperation $operations
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
