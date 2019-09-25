<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RetargetingListCustomKeyPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var CustomKey $customKeys
     */
    protected $customKeys = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CustomKey
     */
    public function getCustomKeys()
    {
      return $this->customKeys;
    }

    /**
     * @param CustomKey $customKeys
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RetargetingListCustomKeyPage
     */
    public function setCustomKeys($customKeys)
    {
      $this->customKeys = $customKeys;
      return $this;
    }

}
