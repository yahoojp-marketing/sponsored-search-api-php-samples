<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class addJob
{

    /**
     * @var ExportSetting $setting
     */
    protected $setting = null;

    /**
     * @param ExportSetting $setting
     */
    public function __construct($setting)
    {
      $this->setting = $setting;
    }

    /**
     * @return ExportSetting
     */
    public function getSetting()
    {
      return $this->setting;
    }

    /**
     * @param ExportSetting $setting
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\addJob
     */
    public function setSetting($setting)
    {
      $this->setting = $setting;
      return $this;
    }

}
