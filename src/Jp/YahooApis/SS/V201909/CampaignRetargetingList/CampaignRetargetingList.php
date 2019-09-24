<?php

namespace Jp\YahooApis\SS\V201909\CampaignRetargetingList;

class CampaignRetargetingList
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var string $campaignName
     */
    protected $campaignName = null;

    /**
     * @var CriterionTargetList $criterionTargetList
     */
    protected $criterionTargetList = null;

    /**
     * @var ExcludedType $excludedType
     */
    protected $excludedType = null;

    /**
     * @var float $bidMultiplier
     */
    protected $bidMultiplier = null;

    /**
     * @param int $campaignId
     * @param CriterionTargetList $criterionTargetList
     */
    public function __construct($campaignId, $criterionTargetList)
    {
      $this->campaignId = $campaignId;
      $this->criterionTargetList = $criterionTargetList;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->campaignId;
    }

    /**
     * @param int $campaignId
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return string
     */
    public function getCampaignName()
    {
      return $this->campaignName;
    }

    /**
     * @param string $campaignName
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

    /**
     * @return CriterionTargetList
     */
    public function getCriterionTargetList()
    {
      return $this->criterionTargetList;
    }

    /**
     * @param CriterionTargetList $criterionTargetList
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setCriterionTargetList($criterionTargetList)
    {
      $this->criterionTargetList = $criterionTargetList;
      return $this;
    }

    /**
     * @return ExcludedType
     */
    public function getExcludedType()
    {
      return $this->excludedType;
    }

    /**
     * @param ExcludedType $excludedType
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setExcludedType($excludedType)
    {
      $this->excludedType = $excludedType;
      return $this;
    }

    /**
     * @return float
     */
    public function getBidMultiplier()
    {
      return $this->bidMultiplier;
    }

    /**
     * @param float $bidMultiplier
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingList
     */
    public function setBidMultiplier($bidMultiplier)
    {
      $this->bidMultiplier = $bidMultiplier;
      return $this;
    }

}
