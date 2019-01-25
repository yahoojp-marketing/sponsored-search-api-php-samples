<?php

namespace Jp\YahooApis\SS\V201901\ReportDefinition;

class ReportDefinitionSelector
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
     * @return \Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionSelector
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
     * @return \Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionSelector
     */
    public function setReportIds(array $reportIds = null)
    {
      $this->reportIds = $reportIds;
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
     * @return \Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinitionSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
