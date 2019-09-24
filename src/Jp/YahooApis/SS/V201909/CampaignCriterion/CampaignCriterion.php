<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class CampaignCriterion
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
     * @var CampaignCriterionUse $criterionUse
     */
    protected $criterionUse = null;

    /**
     * @var Criterion $criterion
     */
    protected $criterion = null;

    /**
     * @param CampaignCriterionUse $criterionUse
     * @param Criterion $criterion
     */
    public function __construct($criterionUse, $criterion)
    {
      $this->criterionUse = $criterionUse;
      $this->criterion = $criterion;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion
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
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion
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
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

    /**
     * @return CampaignCriterionUse
     */
    public function getCriterionUse()
    {
      return $this->criterionUse;
    }

    /**
     * @param CampaignCriterionUse $criterionUse
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion
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
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\CampaignCriterion
     */
    public function setCriterion($criterion)
    {
      $this->criterion = $criterion;
      return $this;
    }

}
