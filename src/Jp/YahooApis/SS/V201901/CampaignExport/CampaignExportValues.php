<?php

namespace Jp\YahooApis\SS\V201901\CampaignExport;

class CampaignExportValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var Job $job
     */
    protected $job = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return Job
     */
    public function getJob()
    {
      return $this->job;
    }

    /**
     * @param Job $job
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportValues
     */
    public function setJob($job)
    {
      $this->job = $job;
      return $this;
    }

}
