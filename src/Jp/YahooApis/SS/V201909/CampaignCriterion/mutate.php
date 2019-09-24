<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class mutate
{

    /**
     * @var CampaignCriterionOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignCriterionOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignCriterionOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignCriterionOperation $operations
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
