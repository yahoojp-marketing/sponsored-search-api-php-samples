<?php

namespace Jp\YahooApis\SS\V201901\ReportDefinition;

class getReportFields
{

    /**
     * @var ReportType $reportType
     */
    protected $reportType = null;

    /**
     * @param ReportType $reportType
     */
    public function __construct($reportType)
    {
      $this->reportType = $reportType;
    }

    /**
     * @return ReportType
     */
    public function getReportType()
    {
      return $this->reportType;
    }

    /**
     * @param ReportType $reportType
     * @return \Jp\YahooApis\SS\V201901\ReportDefinition\getReportFields
     */
    public function setReportType($reportType)
    {
      $this->reportType = $reportType;
      return $this;
    }

}
