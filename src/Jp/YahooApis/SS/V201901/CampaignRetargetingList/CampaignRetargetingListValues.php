<?php

namespace Jp\YahooApis\SS\V201901\CampaignRetargetingList;

class CampaignRetargetingListValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var CampaignRetargetingList $campaignRetargetingList
     */
    protected $campaignRetargetingList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignRetargetingList
     */
    public function getCampaignRetargetingList()
    {
      return $this->campaignRetargetingList;
    }

    /**
     * @param CampaignRetargetingList $campaignRetargetingList
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\CampaignRetargetingListValues
     */
    public function setCampaignRetargetingList($campaignRetargetingList)
    {
      $this->campaignRetargetingList = $campaignRetargetingList;
      return $this;
    }

}
