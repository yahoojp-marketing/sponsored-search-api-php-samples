<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemJobStatusSelector
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
     * @var PageFeedItemJobType $jobType
     */
    protected $jobType = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     * @param PageFeedItemJobType $jobType
     */
    public function __construct($accountId, $jobType)
    {
      $this->accountId = $accountId;
      $this->jobType = $jobType;
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusSelector
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusSelector
     */
    public function setJobIds(array $jobIds = null)
    {
      $this->jobIds = $jobIds;
      return $this;
    }

    /**
     * @return PageFeedItemJobType
     */
    public function getJobType()
    {
      return $this->jobType;
    }

    /**
     * @param PageFeedItemJobType $jobType
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusSelector
     */
    public function setJobType($jobType)
    {
      $this->jobType = $jobType;
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
