<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class DynamicAdsForSearchSetting extends CampaignSettings
{

    /**
     * @var long[] $feedFolderIds
     */
    protected $feedFolderIds = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return long[]
     */
    public function getFeedFolderIds()
    {
      return $this->feedFolderIds;
    }

    /**
     * @param long[] $feedFolderIds
     * @return \Jp\YahooApis\SS\V201901\Campaign\DynamicAdsForSearchSetting
     */
    public function setFeedFolderIds(array $feedFolderIds = null)
    {
      $this->feedFolderIds = $feedFolderIds;
      return $this;
    }

}
