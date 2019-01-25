<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class CampaignTargetOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignTarget[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignTarget[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignTarget[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignTarget[] $operand
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
