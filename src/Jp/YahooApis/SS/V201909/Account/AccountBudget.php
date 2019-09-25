<?php

namespace Jp\YahooApis\SS\V201909\Account;

class AccountBudget
{

    /**
     * @var int $amount
     */
    protected $amount = null;

    /**
     * @var LimitChargeType $limitChargeType
     */
    protected $limitChargeType = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAmount()
    {
      return $this->amount;
    }

    /**
     * @param int $amount
     * @return \Jp\YahooApis\SS\V201909\Account\AccountBudget
     */
    public function setAmount($amount)
    {
      $this->amount = $amount;
      return $this;
    }

    /**
     * @return LimitChargeType
     */
    public function getLimitChargeType()
    {
      return $this->limitChargeType;
    }

    /**
     * @param LimitChargeType $limitChargeType
     * @return \Jp\YahooApis\SS\V201909\Account\AccountBudget
     */
    public function setLimitChargeType($limitChargeType)
    {
      $this->limitChargeType = $limitChargeType;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return \Jp\YahooApis\SS\V201909\Account\AccountBudget
     */
    public function setStartDate($startDate)
    {
      $this->startDate = $startDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return \Jp\YahooApis\SS\V201909\Account\AccountBudget
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

}
