<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class CampaignExportReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var CampaignExportValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignExportValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param CampaignExportValues[] $values
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
