<?php

namespace Jp\YahooApis\SS\V201909\Campaign;

abstract class CampaignSettings
{

    /**
     * @var SettingType $type
     */
    protected $type = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return SettingType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param SettingType $type
     * @return \Jp\YahooApis\SS\V201909\Campaign\CampaignSettings
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

}
