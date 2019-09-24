<?php

namespace Jp\YahooApis\SS\V201909\FeedFolder;

class FeedFolderSelector
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
     * @var FeedFolderPlaceholderType[] $placeholderTypes
     */
    protected $placeholderTypes = null;

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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderSelector
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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderSelector
     */
    public function setFeedFolderIds(array $feedFolderIds = null)
    {
      $this->feedFolderIds = $feedFolderIds;
      return $this;
    }

    /**
     * @return FeedFolderPlaceholderType[]
     */
    public function getPlaceholderTypes()
    {
      return $this->placeholderTypes;
    }

    /**
     * @param FeedFolderPlaceholderType[] $placeholderTypes
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderSelector
     */
    public function setPlaceholderTypes(array $placeholderTypes = null)
    {
      $this->placeholderTypes = $placeholderTypes;
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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolderSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
