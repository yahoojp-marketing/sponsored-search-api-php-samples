<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class CampaignReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var CampaignValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignValues[] $values
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
