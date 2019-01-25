<?php

namespace Jp\YahooApis\SS\V201901\Account;

class AccountValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var Account $account
     */
    protected $account = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
      return $this->account;
    }

    /**
     * @param Account $account
     * @return \Jp\YahooApis\SS\V201901\Account\AccountValues
     */
    public function setAccount($account)
    {
      $this->account = $account;
      return $this;
    }

}
