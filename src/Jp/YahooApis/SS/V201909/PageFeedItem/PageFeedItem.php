<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItem
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $feedFolderId
     */
    protected $feedFolderId = null;

    /**
     * @var int $pageFeedItemId
     */
    protected $pageFeedItemId = null;

    /**
     * @var PageFeedItemApprovalStatus $approvalStatus
     */
    protected $approvalStatus = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    /**
     * @var string $disapprovalReasonComment
     */
    protected $disapprovalReasonComment = null;

    /**
     * @var string $pageFeedUrl
     */
    protected $pageFeedUrl = null;

    /**
     * @var string $pageFeedCustomLabel
     */
    protected $pageFeedCustomLabel = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedFolderId()
    {
      return $this->feedFolderId;
    }

    /**
     * @param int $feedFolderId
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
      return $this;
    }

    /**
     * @return int
     */
    public function getPageFeedItemId()
    {
      return $this->pageFeedItemId;
    }

    /**
     * @param int $pageFeedItemId
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setPageFeedItemId($pageFeedItemId)
    {
      $this->pageFeedItemId = $pageFeedItemId;
      return $this;
    }

    /**
     * @return PageFeedItemApprovalStatus
     */
    public function getApprovalStatus()
    {
      return $this->approvalStatus;
    }

    /**
     * @param PageFeedItemApprovalStatus $approvalStatus
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setApprovalStatus($approvalStatus)
    {
      $this->approvalStatus = $approvalStatus;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getDisapprovalReasonCodes()
    {
      return $this->disapprovalReasonCodes;
    }

    /**
     * @param string[] $disapprovalReasonCodes
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisapprovalReasonComment()
    {
      return $this->disapprovalReasonComment;
    }

    /**
     * @param string $disapprovalReasonComment
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setDisapprovalReasonComment($disapprovalReasonComment)
    {
      $this->disapprovalReasonComment = $disapprovalReasonComment;
      return $this;
    }

    /**
     * @return string
     */
    public function getPageFeedUrl()
    {
      return $this->pageFeedUrl;
    }

    /**
     * @param string $pageFeedUrl
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setPageFeedUrl($pageFeedUrl)
    {
      $this->pageFeedUrl = $pageFeedUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getPageFeedCustomLabel()
    {
      return $this->pageFeedCustomLabel;
    }

    /**
     * @param string $pageFeedCustomLabel
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem
     */
    public function setPageFeedCustomLabel($pageFeedCustomLabel)
    {
      $this->pageFeedCustomLabel = $pageFeedCustomLabel;
      return $this;
    }

}
