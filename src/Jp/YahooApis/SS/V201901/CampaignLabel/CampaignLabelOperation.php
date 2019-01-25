<?php

namespace Jp\YahooApis\SS\V201901\CampaignLabel;

class CampaignLabelOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignLabel[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignLabel[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignLabel[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignLabel[] $operand
     * @return \Jp\YahooApis\SS\V201901\CampaignLabel\CampaignLabelOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
