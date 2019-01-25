<?php

namespace Jp\YahooApis\SS\V201901\CampaignCriterion;

class CampaignCriterionSelector
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
     * @var long[] $criterionIds
     */
    protected $criterionIds = null;

    /**
     * @var CampaignCriterionUse $criterionUse
     */
    protected $criterionUse = null;

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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector
     */
    public function setCriterionIds(array $criterionIds = null)
    {
      $this->criterionIds = $criterionIds;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector
     */
    public function setCriterionUse($criterionUse)
    {
      $this->criterionUse = $criterionUse;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
