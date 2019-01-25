<?php

namespace Jp\YahooApis\SS\V201901\CampaignSharedSet;

class CampaignSharedSetValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var CampaignSharedSet $campaignSharedSet
     */
    protected $campaignSharedSet = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignSharedSet
     */
    public function getCampaignSharedSet()
    {
      return $this->campaignSharedSet;
    }

    /**
     * @param CampaignSharedSet $campaignSharedSet
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetValues
     */
    public function setCampaignSharedSet($campaignSharedSet)
    {
      $this->campaignSharedSet = $campaignSharedSet;
      return $this;
    }

}
