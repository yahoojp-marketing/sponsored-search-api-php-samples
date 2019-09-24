<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class JobSelector
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
     * @var JobStatus[] $statuses
     */
    protected $statuses = null;

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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\JobSelector
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\JobSelector
     */
    public function setJobIds(array $jobIds = null)
    {
      $this->jobIds = $jobIds;
      return $this;
    }

    /**
     * @return JobStatus[]
     */
    public function getStatuses()
    {
      return $this->statuses;
    }

    /**
     * @param JobStatus[] $statuses
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\JobSelector
     */
    public function setStatuses(array $statuses = null)
    {
      $this->statuses = $statuses;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\JobSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
