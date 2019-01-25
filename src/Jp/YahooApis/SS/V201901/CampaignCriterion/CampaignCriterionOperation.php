<?php

namespace Jp\YahooApis\SS\V201901\CampaignCriterion;

class CampaignCriterionOperation extends Operation
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
     * @var CampaignCriterionUse $criterionUse
     */
    protected $criterionUse = null;

    /**
     * @var CampaignCriterion[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignCriterion[] $operand
     */
    public function __construct($operator, $accountId, array $operand)
    {
      parent::__construct($operator);
      $this->accountId = $accountId;
      $this->operand = $operand;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionOperation
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionOperation
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionOperation
     */
    public function setCriterionUse($criterionUse)
    {
      $this->criterionUse = $criterionUse;
      return $this;
    }

    /**
     * @return CampaignCriterion[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignCriterion[] $operand
     * @return \Jp\YahooApis\SS\V201901\CampaignCriterion\CampaignCriterionOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
