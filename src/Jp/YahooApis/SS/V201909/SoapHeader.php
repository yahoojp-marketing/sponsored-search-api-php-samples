<?php

namespace Jp\YahooApis\SS\V201909;

class SoapHeader
{

    /**
     * @var string $license
     */
    protected $license = null;

    /**
     * @var string $apiAccountId
     */
    protected $apiAccountId = null;

    /**
     * @var string $apiAccountPassword
     */
    protected $apiAccountPassword = null;

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var string $onBehalfOfAccountId
     */
    protected $onBehalfOfAccountId = null;

    /**
     * @var string $onBehalfOfPassword
     */
    protected $onBehalfOfPassword = null;

    /**
     * @param string $license
     * @param string $apiAccountId
     * @param string $apiAccountPassword
     */
    public function __construct($license, $apiAccountId, $apiAccountPassword)
    {
      $this->license = $license;
      $this->apiAccountId = $apiAccountId;
      $this->apiAccountPassword = $apiAccountPassword;
    }

    /**
     * @return string
     */
    public function getLicense()
    {
      return $this->license;
    }

    /**
     * @param string $license
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setLicense($license)
    {
      $this->license = $license;
      return $this;
    }

    /**
     * @return string
     */
    public function getApiAccountId()
    {
      return $this->apiAccountId;
    }

    /**
     * @param string $apiAccountId
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setApiAccountId($apiAccountId)
    {
      $this->apiAccountId = $apiAccountId;
      return $this;
    }

    /**
     * @return string
     */
    public function getApiAccountPassword()
    {
      return $this->apiAccountPassword;
    }

    /**
     * @param string $apiAccountPassword
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setApiAccountPassword($apiAccountPassword)
    {
      $this->apiAccountPassword = $apiAccountPassword;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return string
     */
    public function getOnBehalfOfAccountId()
    {
      return $this->onBehalfOfAccountId;
    }

    /**
     * @param string $onBehalfOfAccountId
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setOnBehalfOfAccountId($onBehalfOfAccountId)
    {
      $this->onBehalfOfAccountId = $onBehalfOfAccountId;
      return $this;
    }

    /**
     * @return string
     */
    public function getOnBehalfOfPassword()
    {
      return $this->onBehalfOfPassword;
    }

    /**
     * @param string $onBehalfOfPassword
     * @return \Jp\YahooApis\SS\V201909\SoapHeader
     */
    public function setOnBehalfOfPassword($onBehalfOfPassword)
    {
      $this->onBehalfOfPassword = $onBehalfOfPassword;
      return $this;
    }

}
