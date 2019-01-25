<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class AdGroupFeedOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupFeedList[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupFeedList[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupFeedList[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupFeedList[] $operand
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\AdGroupFeedOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
