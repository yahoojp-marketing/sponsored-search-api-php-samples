<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class Job
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
     * @var string $userName
     */
    protected $userName = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    /**
     * @var JobStatus $status
     */
    protected $status = null;

    /**
     * @var int $progress
     */
    protected $progress = null;

    /**
     * @var string $downloadUrl
     */
    protected $downloadUrl = null;

    /**
     * @var string[] $exportFields
     */
    protected $exportFields = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setJobName($jobName)
    {
      $this->jobName = $jobName;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
      return $this->userName;
    }

    /**
     * @param string $userName
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setUserName($userName)
    {
      $this->userName = $userName;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setStartDate($startDate)
    {
      $this->startDate = $startDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

    /**
     * @return JobStatus
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param JobStatus $status
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

    /**
     * @return int
     */
    public function getProgress()
    {
      return $this->progress;
    }

    /**
     * @param int $progress
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setProgress($progress)
    {
      $this->progress = $progress;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setDownloadUrl($downloadUrl)
    {
      $this->downloadUrl = $downloadUrl;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getExportFields()
    {
      return $this->exportFields;
    }

    /**
     * @param string[] $exportFields
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\Job
     */
    public function setExportFields(array $exportFields = null)
    {
      $this->exportFields = $exportFields;
      return $this;
    }

}
