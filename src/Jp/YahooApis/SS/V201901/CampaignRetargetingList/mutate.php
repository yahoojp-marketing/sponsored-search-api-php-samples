<?php

namespace Jp\YahooApis\SS\V201901\CampaignRetargetingList;

class mutate
{

    /**
     * @var CampaignRetargetingListOperation $operations
     */
    protected $operations = null;

    /**
     * @param CampaignRetargetingListOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return CampaignRetargetingListOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param CampaignRetargetingListOperation $operations
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
