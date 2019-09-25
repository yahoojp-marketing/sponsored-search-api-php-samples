<?php

namespace Jp\YahooApis\SS\V201909\CampaignRetargetingList;

class CampaignRetargetingListValues extends \Jp\YahooApis\SS\V201909\ReturnValue
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListValues
     */
    public function setCampaignRetargetingList($campaignRetargetingList)
    {
      $this->campaignRetargetingList = $campaignRetargetingList;
      return $this;
    }

}
