<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class CampaignWebpagePage extends \Jp\YahooApis\SS\V201909\Page
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
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpagePage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
