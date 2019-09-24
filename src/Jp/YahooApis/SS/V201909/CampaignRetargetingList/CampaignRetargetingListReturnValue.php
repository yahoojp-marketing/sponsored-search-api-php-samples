<?php

namespace Jp\YahooApis\SS\V201909\CampaignRetargetingList;

class CampaignRetargetingListReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var CampaignRetargetingListValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignRetargetingListValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignRetargetingListValues[] $values
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
