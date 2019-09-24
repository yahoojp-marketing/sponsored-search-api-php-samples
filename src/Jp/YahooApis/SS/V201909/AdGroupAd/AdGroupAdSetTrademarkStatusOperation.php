<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdSetTrademarkStatusOperation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AdGroupAdSetTrademarkStatus[] $operand
     */
    protected $operand = null;

    /**
     * @param int $accountId
     * @param AdGroupAdSetTrademarkStatus[] $operand
     */
    public function __construct($accountId, array $operand)
    {
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatusOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AdGroupAdSetTrademarkStatus[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AdGroupAdSetTrademarkStatus[] $operand
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatusOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
