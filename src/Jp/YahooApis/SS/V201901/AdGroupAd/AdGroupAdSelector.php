<?php

namespace Jp\YahooApis\SS\V201901\AdGroupAd;

class AdGroupAdSelector
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
     * @var long[] $adGroupIds
     */
    protected $adGroupIds = null;

    /**
     * @var long[] $adIds
     */
    protected $adIds = null;

    /**
     * @var AdType[] $adTypes
     */
    protected $adTypes = null;

    /**
     * @var UserStatus[] $userStatuses
     */
    protected $userStatuses = null;

    /**
     * @var ApprovalStatus[] $approvalStatuses
     */
    protected $approvalStatuses = null;

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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdGroupIds()
    {
      return $this->adGroupIds;
    }

    /**
     * @param long[] $adGroupIds
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setAdGroupIds(array $adGroupIds = null)
    {
      $this->adGroupIds = $adGroupIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdIds()
    {
      return $this->adIds;
    }

    /**
     * @param long[] $adIds
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setAdIds(array $adIds = null)
    {
      $this->adIds = $adIds;
      return $this;
    }

    /**
     * @return AdType[]
     */
    public function getAdTypes()
    {
      return $this->adTypes;
    }

    /**
     * @param AdType[] $adTypes
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setAdTypes(array $adTypes = null)
    {
      $this->adTypes = $adTypes;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setUserStatuses(array $userStatuses = null)
    {
      $this->userStatuses = $userStatuses;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setApprovalStatuses(array $approvalStatuses = null)
    {
      $this->approvalStatuses = $approvalStatuses;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAdSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
