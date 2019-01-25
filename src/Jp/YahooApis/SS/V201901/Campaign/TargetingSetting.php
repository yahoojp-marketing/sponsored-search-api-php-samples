<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class TargetingSetting extends CampaignSettings
{

    /**
     * @var TargetAll $targetAll
     */
    protected $targetAll = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return TargetAll
     */
    public function getTargetAll()
    {
      return $this->targetAll;
    }

    /**
     * @param TargetAll $targetAll
     * @return \Jp\YahooApis\SS\V201901\Campaign\TargetingSetting
     */
    public function setTargetAll($targetAll)
    {
      $this->targetAll = $targetAll;
      return $this;
    }

}
