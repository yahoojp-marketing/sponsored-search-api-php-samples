<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class ReportDefinitionValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var ReportDefinition $reportDefinition
     */
    protected $reportDefinition = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ReportDefinition
     */
    public function getReportDefinition()
    {
      return $this->reportDefinition;
    }

    /**
     * @param ReportDefinition $reportDefinition
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionValues
     */
    public function setReportDefinition($reportDefinition)
    {
      $this->reportDefinition = $reportDefinition;
      return $this;
    }

}
