<?php

namespace Jp\YahooApis\SS\V201901\CampaignWebpage;

class CampaignWebpageReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var CampaignWebpageValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignWebpageValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignWebpageValues[] $values
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpageReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
