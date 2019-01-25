<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class CampaignTargetPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
