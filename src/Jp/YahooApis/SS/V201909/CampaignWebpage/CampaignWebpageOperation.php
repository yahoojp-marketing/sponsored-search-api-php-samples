<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class CampaignWebpageOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignWebpage[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignWebpage[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignWebpage[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignWebpage[] $operand
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\CampaignWebpageOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
