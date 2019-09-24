<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class mutate
{

    /**
     * @var CampaignTargetOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignTargetOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignTargetOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignTargetOperation $operations
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
