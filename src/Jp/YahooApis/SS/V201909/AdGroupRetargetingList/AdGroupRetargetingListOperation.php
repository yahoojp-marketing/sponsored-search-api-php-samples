<?php

namespace Jp\YahooApis\SS\V201909\AdGroupRetargetingList;

class AdGroupRetargetingListOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupRetargetingList[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param AdGroupRetargetingList[] $operand
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupRetargetingList[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupRetargetingList[] $operand
     * @return \Jp\YahooApis\SS\V201909\AdGroupRetargetingList\AdGroupRetargetingListOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
