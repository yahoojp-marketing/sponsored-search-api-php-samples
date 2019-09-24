<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class CampaignTargetValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var CampaignTarget $campaignTarget
     */
    protected $campaignTarget = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignTarget
     */
    public function getCampaignTarget()
    {
      return $this->campaignTarget;
    }

    /**
     * @param CampaignTarget $campaignTarget
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetValues
     */
    public function setCampaignTarget($campaignTarget)
    {
      $this->campaignTarget = $campaignTarget;
      return $this;
    }

}
