<?php

namespace Jp\YahooApis\SS\V201909;

class ErrorDetail
{

    /**
     * @var string $requestKey
     */
    protected $requestKey = null;

    /**
     * @var string[] $requestValue
     */
    protected $requestValue = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getRequestKey()
    {
      return $this->requestKey;
    }

    /**
     * @param string $requestKey
     * @return \Jp\YahooApis\SS\V201909\ErrorDetail
     */
    public function setRequestKey($requestKey)
    {
      $this->requestKey = $requestKey;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getRequestValue()
    {
      return $this->requestValue;
    }

    /**
     * @param string[] $requestValue
     * @return \Jp\YahooApis\SS\V201909\ErrorDetail
     */
    public function setRequestValue(array $requestValue = null)
    {
      $this->requestValue = $requestValue;
      return $this;
    }

}
