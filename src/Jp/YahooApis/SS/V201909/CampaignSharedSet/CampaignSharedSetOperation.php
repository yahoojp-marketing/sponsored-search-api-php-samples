<?php

namespace Jp\YahooApis\SS\V201909\CampaignSharedSet;

class CampaignSharedSetOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignSharedSet[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignSharedSet[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignSharedSet[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignSharedSet[] $operand
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSetOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
