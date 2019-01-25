<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemReviewSummary
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
     * @var int $entityCount
     */
    protected $entityCount = null;

    /**
     * @var int $approvedCount
     */
    protected $approvedCount = null;

    /**
     * @var int $approvedWithReviewCount
     */
    protected $approvedWithReviewCount = null;

    /**
     * @var int $reviewCount
     */
    protected $reviewCount = null;

    /**
     * @var int $preDisapprovedCount
     */
    protected $preDisapprovedCount = null;

    /**
     * @var int $postDisapprovedCount
     */
    protected $postDisapprovedCount = null;

    
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
      return $this;
    }

    /**
     * @return int
     */
    public function getEntityCount()
    {
      return $this->entityCount;
    }

    /**
     * @param int $entityCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setEntityCount($entityCount)
    {
      $this->entityCount = $entityCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getApprovedCount()
    {
      return $this->approvedCount;
    }

    /**
     * @param int $approvedCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setApprovedCount($approvedCount)
    {
      $this->approvedCount = $approvedCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getApprovedWithReviewCount()
    {
      return $this->approvedWithReviewCount;
    }

    /**
     * @param int $approvedWithReviewCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setApprovedWithReviewCount($approvedWithReviewCount)
    {
      $this->approvedWithReviewCount = $approvedWithReviewCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getReviewCount()
    {
      return $this->reviewCount;
    }

    /**
     * @param int $reviewCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setReviewCount($reviewCount)
    {
      $this->reviewCount = $reviewCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getPreDisapprovedCount()
    {
      return $this->preDisapprovedCount;
    }

    /**
     * @param int $preDisapprovedCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setPreDisapprovedCount($preDisapprovedCount)
    {
      $this->preDisapprovedCount = $preDisapprovedCount;
      return $this;
    }

    /**
     * @return int
     */
    public function getPostDisapprovedCount()
    {
      return $this->postDisapprovedCount;
    }

    /**
     * @param int $postDisapprovedCount
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary
     */
    public function setPostDisapprovedCount($postDisapprovedCount)
    {
      $this->postDisapprovedCount = $postDisapprovedCount;
      return $this;
    }

}
