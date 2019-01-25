<?php

namespace Jp\YahooApis\SS\V201901\Balance;

class Balance
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $balance
     */
    protected $balance = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201901\Balance\Balance
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getBalance()
    {
      return $this->balance;
    }

    /**
     * @param int $balance
     * @return \Jp\YahooApis\SS\V201901\Balance\Balance
     */
    public function setBalance($balance)
    {
      $this->balance = $balance;
      return $this;
    }

}
