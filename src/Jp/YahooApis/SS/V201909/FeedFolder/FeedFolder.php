<?php

namespace Jp\YahooApis\SS\V201909\FeedFolder;

class FeedFolder
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
     * @var int $feedFolderTrackId
     */
    protected $feedFolderTrackId = null;

    /**
     * @var string $feedFolderName
     */
    protected $feedFolderName = null;

    /**
     * @var FeedFolderPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    /**
     * @var FeedAttribute[] $feedAttribute
     */
    protected $feedAttribute = null;

    /**
     * @var string $domain
     */
    protected $domain = null;

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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
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
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setFeedFolderId($feedFolderId)
    {
      $this->feedFolderId = $feedFolderId;
      return $this;
    }

    /**
     * @return int
     */
    public function getFeedFolderTrackId()
    {
      return $this->feedFolderTrackId;
    }

    /**
     * @param int $feedFolderTrackId
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setFeedFolderTrackId($feedFolderTrackId)
    {
      $this->feedFolderTrackId = $feedFolderTrackId;
      return $this;
    }

    /**
     * @return string
     */
    public function getFeedFolderName()
    {
      return $this->feedFolderName;
    }

    /**
     * @param string $feedFolderName
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setFeedFolderName($feedFolderName)
    {
      $this->feedFolderName = $feedFolderName;
      return $this;
    }

    /**
     * @return FeedFolderPlaceholderType
     */
    public function getPlaceholderType()
    {
      return $this->placeholderType;
    }

    /**
     * @param FeedFolderPlaceholderType $placeholderType
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return FeedAttribute[]
     */
    public function getFeedAttribute()
    {
      return $this->feedAttribute;
    }

    /**
     * @param FeedAttribute[] $feedAttribute
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setFeedAttribute(array $feedAttribute = null)
    {
      $this->feedAttribute = $feedAttribute;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
      return $this->domain;
    }

    /**
     * @param string $domain
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\FeedFolder
     */
    public function setDomain($domain)
    {
      $this->domain = $domain;
      return $this;
    }

}
