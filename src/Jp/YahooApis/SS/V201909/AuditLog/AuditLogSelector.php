<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class AuditLogSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $jobIds
     */
    protected $jobIds = null;

    /**
     * @var AuditLogJobStatus[] $jobStatuses
     */
    protected $jobStatuses = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
     */
    protected $paging = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getJobIds()
    {
      return $this->jobIds;
    }

    /**
     * @param long[] $jobIds
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogSelector
     */
    public function setJobIds(array $jobIds = null)
    {
      $this->jobIds = $jobIds;
      return $this;
    }

    /**
     * @return AuditLogJobStatus[]
     */
    public function getJobStatuses()
    {
      return $this->jobStatuses;
    }

    /**
     * @param AuditLogJobStatus[] $jobStatuses
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogSelector
     */
    public function setJobStatuses(array $jobStatuses = null)
    {
      $this->jobStatuses = $jobStatuses;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201909\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201909\Paging $paging
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
