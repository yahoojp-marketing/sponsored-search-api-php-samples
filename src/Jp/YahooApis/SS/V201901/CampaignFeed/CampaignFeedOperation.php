<?php

namespace Jp\YahooApis\SS\V201901\CampaignFeed;

class CampaignFeedOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var CampaignFeedList[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param CampaignFeedList[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return CampaignFeedList[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param CampaignFeedList[] $operand
     * @return \Jp\YahooApis\SS\V201901\CampaignFeed\CampaignFeedOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
