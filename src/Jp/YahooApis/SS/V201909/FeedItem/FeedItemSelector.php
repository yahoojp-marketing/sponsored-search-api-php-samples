<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $feedItemIds
     */
    protected $feedItemIds = null;

    /**
     * @var long[] $feedFolderIds
     */
    protected $feedFolderIds = null;

    /**
     * @var FeedItemPlaceholderType[] $placeholderTypes
     */
    protected $placeholderTypes = null;

    /**
     * @var ApprovalStatus[] $approvalStatuses
     */
    protected $approvalStatuses = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getFeedItemIds()
    {
      return $this->feedItemIds;
    }

    /**
     * @param long[] $feedItemIds
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setFeedItemIds(array $feedItemIds = null)
    {
      $this->feedItemIds = $feedItemIds;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setFeedFolderIds(array $feedFolderIds = null)
    {
      $this->feedFolderIds = $feedFolderIds;
      return $this;
    }

    /**
     * @return FeedItemPlaceholderType[]
     */
    public function getPlaceholderTypes()
    {
      return $this->placeholderTypes;
    }

    /**
     * @param FeedItemPlaceholderType[] $placeholderTypes
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setPlaceholderTypes(array $placeholderTypes = null)
    {
      $this->placeholderTypes = $placeholderTypes;
      return $this;
    }

    /**
     * @return ApprovalStatus[]
     */
    public function getApprovalStatuses()
    {
      return $this->approvalStatuses;
    }

    /**
     * @param ApprovalStatus[] $approvalStatuses
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setApprovalStatuses(array $approvalStatuses = null)
    {
      $this->approvalStatuses = $approvalStatuses;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
