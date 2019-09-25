<?php

namespace Jp\YahooApis\SS\V201909\CampaignRetargetingList;

class CampaignRetargetingListOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignRetargetingList[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignRetargetingList[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignRetargetingList[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignRetargetingList[] $operand
     * @return \Jp\YahooApis\SS\V201909\CampaignRetargetingList\CampaignRetargetingListOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
