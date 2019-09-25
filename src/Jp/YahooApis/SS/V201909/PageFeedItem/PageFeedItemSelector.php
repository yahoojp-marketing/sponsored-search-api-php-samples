<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $feedFolderIds
     */
    protected $feedFolderIds = null;

    /**
     * @var PageFeedItemApprovalStatus[] $approvalStatuses
     */
    protected $approvalStatuses = null;

    /**
     * @var PageFeedUrl[] $pageFeedUrl
     */
    protected $pageFeedUrl = null;

    /**
     * @var string[] $pageFeedCustomLabel
     */
    protected $pageFeedCustomLabel = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     * @param long[] $feedFolderIds
     */
    public function __construct($accountId, array $feedFolderIds)
    {
      $this->accountId = $accountId;
      $this->feedFolderIds = $feedFolderIds;
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setFeedFolderIds(array $feedFolderIds)
    {
      $this->feedFolderIds = $feedFolderIds;
      return $this;
    }

    /**
     * @return PageFeedItemApprovalStatus[]
     */
    public function getApprovalStatuses()
    {
      return $this->approvalStatuses;
    }

    /**
     * @param PageFeedItemApprovalStatus[] $approvalStatuses
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setApprovalStatuses(array $approvalStatuses = null)
    {
      $this->approvalStatuses = $approvalStatuses;
      return $this;
    }

    /**
     * @return PageFeedUrl[]
     */
    public function getPageFeedUrl()
    {
      return $this->pageFeedUrl;
    }

    /**
     * @param PageFeedUrl[] $pageFeedUrl
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setPageFeedUrl(array $pageFeedUrl = null)
    {
      $this->pageFeedUrl = $pageFeedUrl;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getPageFeedCustomLabel()
    {
      return $this->pageFeedCustomLabel;
    }

    /**
     * @param string[] $pageFeedCustomLabel
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setPageFeedCustomLabel(array $pageFeedCustomLabel = null)
    {
      $this->pageFeedCustomLabel = $pageFeedCustomLabel;
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
