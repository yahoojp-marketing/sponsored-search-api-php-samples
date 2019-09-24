<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

abstract class PageFeedItemJob
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
     * @var long[] $feedFolderIds
     */
    protected $feedFolderIds = null;

    /**
     * @var int $progress
     */
    protected $progress = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
     */
    public function setJobId($jobId)
    {
      $this->jobId = $jobId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getFeedFolderIds()
    {
      return $this->feedFolderIds;
    }

    /**
     * @param long[] $feedFolderIds
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
     */
    public function setFeedFolderIds(array $feedFolderIds = null)
    {
      $this->feedFolderIds = $feedFolderIds;
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
     */
    public function setProgress($progress)
    {
      $this->progress = $progress;
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

}
