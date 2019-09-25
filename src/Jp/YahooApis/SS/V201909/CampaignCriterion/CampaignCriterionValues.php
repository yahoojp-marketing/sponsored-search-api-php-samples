<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class CampaignCriterionValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var CampaignCriterion $campaignCriterion
     */
    protected $campaignCriterion = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignCriterion
     */
    public function getCampaignCriterion()
    {
      return $this->campaignCriterion;
    }

    /**
     * @param CampaignCriterion $campaignCriterion
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterionValues
     */
    public function setCampaignCriterion($campaignCriterion)
    {
      $this->campaignCriterion = $campaignCriterion;
      return $this;
    }

}
