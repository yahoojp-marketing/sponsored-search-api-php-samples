<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class CampaignValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var Campaign $campaign
     */
    protected $campaign = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return Campaign
     */
    public function getCampaign()
    {
      return $this->campaign;
    }

    /**
     * @param Campaign $campaign
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignValues
     */
    public function setCampaign($campaign)
    {
      $this->campaign = $campaign;
      return $this;
    }

}
