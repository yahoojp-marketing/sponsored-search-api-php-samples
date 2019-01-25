<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class CampaignSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $campaignIds
     */
    protected $campaignIds = null;

    /**
     * @var UserStatus[] $userStatuses
     */
    protected $userStatuses = null;

    /**
     * @var long[] $biddingStrategyIds
     */
    protected $biddingStrategyIds = null;

    /**
     * @var long[] $labelIds
     */
    protected $labelIds = null;

    /**
     * @var ContainsLabelId $containsLabelId
     */
    protected $containsLabelId = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
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
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->campaignIds;
    }

    /**
     * @param long[] $campaignIds
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return UserStatus[]
     */
    public function getUserStatuses()
    {
      return $this->userStatuses;
    }

    /**
     * @param UserStatus[] $userStatuses
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setUserStatuses(array $userStatuses = null)
    {
      $this->userStatuses = $userStatuses;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getBiddingStrategyIds()
    {
      return $this->biddingStrategyIds;
    }

    /**
     * @param long[] $biddingStrategyIds
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setBiddingStrategyIds(array $biddingStrategyIds = null)
    {
      $this->biddingStrategyIds = $biddingStrategyIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getLabelIds()
    {
      return $this->labelIds;
    }

    /**
     * @param long[] $labelIds
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setLabelIds(array $labelIds = null)
    {
      $this->labelIds = $labelIds;
      return $this;
    }

    /**
     * @return ContainsLabelId
     */
    public function getContainsLabelId()
    {
      return $this->containsLabelId;
    }

    /**
     * @param ContainsLabelId $containsLabelId
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setContainsLabelId($containsLabelId)
    {
      $this->containsLabelId = $containsLabelId;
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
     * @return \Jp\YahooApis\SS\V201901\Campaign\CampaignSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
