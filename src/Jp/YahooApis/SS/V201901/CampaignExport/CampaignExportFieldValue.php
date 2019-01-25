<?php

namespace Jp\YahooApis\SS\V201901\CampaignExport;

class CampaignExportFieldValue extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var CampaignExportFieldAttribute[] $fields
     */
    protected $fields = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return CampaignExportFieldAttribute[]
     */
    public function getFields()
    {
      return $this->fields;
    }

    /**
     * @param CampaignExportFieldAttribute[] $fields
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldValue
     */
    public function setFields(array $fields = null)
    {
      $this->fields = $fields;
      return $this;
    }

}
