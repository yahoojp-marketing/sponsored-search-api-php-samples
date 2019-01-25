<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class CampaignPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
