<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class PlatformTarget extends Target
{

    /**
     * @var PlatformType $platformType
     */
    protected $platformType = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PlatformType
     */
    public function getPlatformType()
    {
      return $this->platformType;
    }

    /**
     * @param PlatformType $platformType
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\PlatformTarget
     */
    public function setPlatformType($platformType)
    {
      $this->platformType = $platformType;
      return $this;
    }

}
