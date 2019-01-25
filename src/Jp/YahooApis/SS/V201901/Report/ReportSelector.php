<?php

namespace Jp\YahooApis\SS\V201901\Report;

class ReportSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $reportIds
     */
    protected $reportIds = null;

    /**
     * @var long[] $reportJobIds
     */
    protected $reportJobIds = null;

    /**
     * @var ReportType[] $reportTypes
     */
    protected $reportTypes = null;

    /**
     * @var ReportJobStatus[] $reportJobStatuses
     */
    protected $reportJobStatuses = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getReportIds()
    {
      return $this->reportIds;
    }

    /**
     * @param long[] $reportIds
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setReportIds(array $reportIds = null)
    {
      $this->reportIds = $reportIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getReportJobIds()
    {
      return $this->reportJobIds;
    }

    /**
     * @param long[] $reportJobIds
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setReportJobIds(array $reportJobIds = null)
    {
      $this->reportJobIds = $reportJobIds;
      return $this;
    }

    /**
     * @return ReportType[]
     */
    public function getReportTypes()
    {
      return $this->reportTypes;
    }

    /**
     * @param ReportType[] $reportTypes
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setReportTypes(array $reportTypes = null)
    {
      $this->reportTypes = $reportTypes;
      return $this;
    }

    /**
     * @return ReportJobStatus[]
     */
    public function getReportJobStatuses()
    {
      return $this->reportJobStatuses;
    }

    /**
     * @param ReportJobStatus[] $reportJobStatuses
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setReportJobStatuses(array $reportJobStatuses = null)
    {
      $this->reportJobStatuses = $reportJobStatuses;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Paging $paging
     * @return \Jp\YahooApis\SS\V201901\Report\ReportSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
