<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class TargetingCampaign
{

    /**
     * @var int $targetingCampaignId
     */
    protected $targetingCampaignId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getTargetingCampaignId()
    {
      return $this->targetingCampaignId;
    }

    /**
     * @param int $targetingCampaignId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\TargetingCampaign
     */
    public function setTargetingCampaignId($targetingCampaignId)
    {
      $this->targetingCampaignId = $targetingCampaignId;
      return $this;
    }

}
