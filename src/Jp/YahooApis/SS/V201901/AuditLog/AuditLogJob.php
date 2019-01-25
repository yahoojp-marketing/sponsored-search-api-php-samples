<?php

namespace Jp\YahooApis\SS\V201901\AuditLog;

class AuditLogJob
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $jobId
     */
    protected $jobId = null;

    /**
     * @var string $jobName
     */
    protected $jobName = null;

    /**
     * @var AuditLogJobStatus $jobStatus
     */
    protected $jobStatus = null;

    /**
     * @var string $downloadUrl
     */
    protected $downloadUrl = null;

    /**
     * @var EventSelector[] $eventSelector
     */
    protected $eventSelector = null;

    /**
     * @var DateRange $dateRange
     */
    protected $dateRange = null;

    /**
     * @var AuditLogSourceType $sourceType
     */
    protected $sourceType = null;

    /**
     * @var AuditLogOutput $output
     */
    protected $output = null;

    /**
     * @var AuditLogEncoding $encoding
     */
    protected $encoding = null;

    /**
     * @var AuditLogLang $lang
     */
    protected $lang = null;

    
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
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getJobId()
    {
      return $this->jobId;
    }

    /**
     * @param int $jobId
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setJobId($jobId)
    {
      $this->jobId = $jobId;
      return $this;
    }

    /**
     * @return string
     */
    public function getJobName()
    {
      return $this->jobName;
    }

    /**
     * @param string $jobName
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setJobName($jobName)
    {
      $this->jobName = $jobName;
      return $this;
    }

    /**
     * @return AuditLogJobStatus
     */
    public function getJobStatus()
    {
      return $this->jobStatus;
    }

    /**
     * @param AuditLogJobStatus $jobStatus
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setJobStatus($jobStatus)
    {
      $this->jobStatus = $jobStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getDownloadUrl()
    {
      return $this->downloadUrl;
    }

    /**
     * @param string $downloadUrl
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setDownloadUrl($downloadUrl)
    {
      $this->downloadUrl = $downloadUrl;
      return $this;
    }

    /**
     * @return EventSelector[]
     */
    public function getEventSelector()
    {
      return $this->eventSelector;
    }

    /**
     * @param EventSelector[] $eventSelector
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setEventSelector(array $eventSelector = null)
    {
      $this->eventSelector = $eventSelector;
      return $this;
    }

    /**
     * @return DateRange
     */
    public function getDateRange()
    {
      return $this->dateRange;
    }

    /**
     * @param DateRange $dateRange
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setDateRange($dateRange)
    {
      $this->dateRange = $dateRange;
      return $this;
    }

    /**
     * @return AuditLogSourceType
     */
    public function getSourceType()
    {
      return $this->sourceType;
    }

    /**
     * @param AuditLogSourceType $sourceType
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setSourceType($sourceType)
    {
      $this->sourceType = $sourceType;
      return $this;
    }

    /**
     * @return AuditLogOutput
     */
    public function getOutput()
    {
      return $this->output;
    }

    /**
     * @param AuditLogOutput $output
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setOutput($output)
    {
      $this->output = $output;
      return $this;
    }

    /**
     * @return AuditLogEncoding
     */
    public function getEncoding()
    {
      return $this->encoding;
    }

    /**
     * @param AuditLogEncoding $encoding
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setEncoding($encoding)
    {
      $this->encoding = $encoding;
      return $this;
    }

    /**
     * @return AuditLogLang
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param AuditLogLang $lang
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogJob
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

}
