<?php

namespace Jp\YahooApis\SS\V201901\CampaignSharedSet;

class CampaignSharedSetPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\CampaignSharedSetPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
