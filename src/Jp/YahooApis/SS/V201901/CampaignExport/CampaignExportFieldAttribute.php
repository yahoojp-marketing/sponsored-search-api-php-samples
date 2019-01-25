<?php

namespace Jp\YahooApis\SS\V201901\CampaignExport;

class CampaignExportFieldAttribute
{

    /**
     * @var string $fieldName
     */
    protected $fieldName = null;

    /**
     * @var string $displayFieldNameJA
     */
    protected $displayFieldNameJA = null;

    /**
     * @var string $displayFieldNameEN
     */
    protected $displayFieldNameEN = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
      return $this->fieldName;
    }

    /**
     * @param string $fieldName
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldAttribute
     */
    public function setFieldName($fieldName)
    {
      $this->fieldName = $fieldName;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisplayFieldNameJA()
    {
      return $this->displayFieldNameJA;
    }

    /**
     * @param string $displayFieldNameJA
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldAttribute
     */
    public function setDisplayFieldNameJA($displayFieldNameJA)
    {
      $this->displayFieldNameJA = $displayFieldNameJA;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisplayFieldNameEN()
    {
      return $this->displayFieldNameEN;
    }

    /**
     * @param string $displayFieldNameEN
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldAttribute
     */
    public function setDisplayFieldNameEN($displayFieldNameEN)
    {
      $this->displayFieldNameEN = $displayFieldNameEN;
      return $this;
    }

}
