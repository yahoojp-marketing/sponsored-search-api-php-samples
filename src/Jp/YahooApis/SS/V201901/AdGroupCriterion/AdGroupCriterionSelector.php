<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionSelector
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
     * @var long[] $criterionIds
     */
    protected $criterionIds = null;

    /**
     * @var AdGroupCriterionUse $criterionUse
     */
    protected $criterionUse = null;

    /**
     * @var UserStatus[] $userStatuses
     */
    protected $userStatuses = null;

    /**
     * @var long[] $biddingStrategyIds
     */
    protected $biddingStrategyIds = null;

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
     * @param AdGroupCriterionUse $criterionUse
     */
    public function __construct($accountId, $criterionUse)
    {
      $this->accountId = $accountId;
      $this->criterionUse = $criterionUse;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
     */
    public function setAdGroupIds(array $adGroupIds = null)
    {
      $this->adGroupIds = $adGroupIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCriterionIds()
    {
      return $this->criterionIds;
    }

    /**
     * @param long[] $criterionIds
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
     */
    public function setCriterionIds(array $criterionIds = null)
    {
      $this->criterionIds = $criterionIds;
      return $this;
    }

    /**
     * @return AdGroupCriterionUse
     */
    public function getCriterionUse()
    {
      return $this->criterionUse;
    }

    /**
     * @param AdGroupCriterionUse $criterionUse
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
     */
    public function setCriterionUse($criterionUse)
    {
      $this->criterionUse = $criterionUse;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
     */
    public function setBiddingStrategyIds(array $biddingStrategyIds = null)
    {
      $this->biddingStrategyIds = $biddingStrategyIds;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
