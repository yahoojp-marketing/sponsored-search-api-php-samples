<?php

namespace Jp\YahooApis\SS\V201901\LocationService_sandbox.wsdl;

class get
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\LocationService_sandbox.wsdl\get
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

}
