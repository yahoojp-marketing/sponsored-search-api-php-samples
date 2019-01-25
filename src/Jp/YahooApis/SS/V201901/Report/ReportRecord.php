<?php

namespace Jp\YahooApis\SS\V201901\Report;

class ReportRecord
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $reportId
     */
    protected $reportId = null;

    /**
     * @var int $reportJobId
     */
    protected $reportJobId = null;

    /**
     * @var string $reportName
     */
    protected $reportName = null;

    /**
     * @var ReportJobStatus $reportJobStatus
     */
    protected $reportJobStatus = null;

    /**
     * @var string $reportJobErrorDetail
     */
    protected $reportJobErrorDetail = null;

    /**
     * @var string $requestTime
     */
    protected $requestTime = null;

    /**
     * @var string $completeTime
     */
    protected $completeTime = null;

    /**
     * @var string $reportDownloadURL
     */
    protected $reportDownloadURL = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getReportId()
    {
      return $this->reportId;
    }

    /**
     * @param int $reportId
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportId($reportId)
    {
      $this->reportId = $reportId;
      return $this;
    }

    /**
     * @return int
     */
    public function getReportJobId()
    {
      return $this->reportJobId;
    }

    /**
     * @param int $reportJobId
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportJobId($reportJobId)
    {
      $this->reportJobId = $reportJobId;
      return $this;
    }

    /**
     * @return string
     */
    public function getReportName()
    {
      return $this->reportName;
    }

    /**
     * @param string $reportName
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportName($reportName)
    {
      $this->reportName = $reportName;
      return $this;
    }

    /**
     * @return ReportJobStatus
     */
    public function getReportJobStatus()
    {
      return $this->reportJobStatus;
    }

    /**
     * @param ReportJobStatus $reportJobStatus
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportJobStatus($reportJobStatus)
    {
      $this->reportJobStatus = $reportJobStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getReportJobErrorDetail()
    {
      return $this->reportJobErrorDetail;
    }

    /**
     * @param string $reportJobErrorDetail
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportJobErrorDetail($reportJobErrorDetail)
    {
      $this->reportJobErrorDetail = $reportJobErrorDetail;
      return $this;
    }

    /**
     * @return string
     */
    public function getRequestTime()
    {
      return $this->requestTime;
    }

    /**
     * @param string $requestTime
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setRequestTime($requestTime)
    {
      $this->requestTime = $requestTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getCompleteTime()
    {
      return $this->completeTime;
    }

    /**
     * @param string $completeTime
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setCompleteTime($completeTime)
    {
      $this->completeTime = $completeTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getReportDownloadURL()
    {
      return $this->reportDownloadURL;
    }

    /**
     * @param string $reportDownloadURL
     * @return \Jp\YahooApis\SS\V201901\Report\ReportRecord
     */
    public function setReportDownloadURL($reportDownloadURL)
    {
      $this->reportDownloadURL = $reportDownloadURL;
      return $this;
    }

}
