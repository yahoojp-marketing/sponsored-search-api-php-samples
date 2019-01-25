<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class AdGroupFeedValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroupFeedList $adGroupFeedList
     */
    protected $adGroupFeedList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupFeedList
     */
    public function getAdGroupFeedList()
    {
      return $this->adGroupFeedList;
    }

    /**
     * @param AdGroupFeedList $adGroupFeedList
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedValues
     */
    public function setAdGroupFeedList($adGroupFeedList)
    {
      $this->adGroupFeedList = $adGroupFeedList;
      return $this;
    }

}
