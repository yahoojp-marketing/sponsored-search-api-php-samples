<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class CampaignTargetReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var CampaignTargetValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignTargetValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignTargetValues[] $values
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\CampaignTargetReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
