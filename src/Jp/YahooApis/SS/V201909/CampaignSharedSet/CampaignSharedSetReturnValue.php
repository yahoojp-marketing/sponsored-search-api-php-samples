<?php

namespace Jp\YahooApis\SS\V201909\CampaignSharedSet;

class CampaignSharedSetReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var CampaignSharedSetValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignSharedSetValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignSharedSetValues[] $values
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
