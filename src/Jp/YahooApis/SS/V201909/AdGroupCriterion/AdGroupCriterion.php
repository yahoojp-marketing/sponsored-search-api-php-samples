<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class AdGroupCriterion
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
     * @var int $campaignTrackId
     */
    protected $campaignTrackId = null;

    /**
     * @var string $campaignName
     */
    protected $campaignName = null;

    /**
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var int $adGroupTrackId
     */
    protected $adGroupTrackId = null;

    /**
     * @var string $adGroupName
     */
    protected $adGroupName = null;

    /**
     * @var AdGroupCriterionUse $criterionUse
     */
    protected $criterionUse = null;

    /**
     * @var Criterion $criterion
     */
    protected $criterion = null;

    /**
     * @var Label[] $labels
     */
    protected $labels = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignTrackId()
    {
      return $this->campaignTrackId;
    }

    /**
     * @param int $campaignTrackId
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setCampaignTrackId($campaignTrackId)
    {
      $this->campaignTrackId = $campaignTrackId;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->adGroupId;
    }

    /**
     * @param int $adGroupId
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupTrackId()
    {
      return $this->adGroupTrackId;
    }

    /**
     * @param int $adGroupTrackId
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setAdGroupTrackId($adGroupTrackId)
    {
      $this->adGroupTrackId = $adGroupTrackId;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdGroupName()
    {
      return $this->adGroupName;
    }

    /**
     * @param string $adGroupName
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setAdGroupName($adGroupName)
    {
      $this->adGroupName = $adGroupName;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setCriterionUse($criterionUse)
    {
      $this->criterionUse = $criterionUse;
      return $this;
    }

    /**
     * @return Criterion
     */
    public function getCriterion()
    {
      return $this->criterion;
    }

    /**
     * @param Criterion $criterion
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setCriterion($criterion)
    {
      $this->criterion = $criterion;
      return $this;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
      return $this->labels;
    }

    /**
     * @param Label[] $labels
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterion
     */
    public function setLabels(array $labels = null)
    {
      $this->labels = $labels;
      return $this;
    }

}
