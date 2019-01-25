<?php

namespace Jp\YahooApis\SS\V201901\CampaignFeed;

class CampaignFeedValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var CampaignFeedList $campaignFeedList
     */
    protected $campaignFeedList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignFeedList
     */
    public function getCampaignFeedList()
    {
      return $this->campaignFeedList;
    }

    /**
     * @param CampaignFeedList $campaignFeedList
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedValues
     */
    public function setCampaignFeedList($campaignFeedList)
    {
      $this->campaignFeedList = $campaignFeedList;
      return $this;
    }

}
