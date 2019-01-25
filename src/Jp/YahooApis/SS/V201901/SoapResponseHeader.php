<?php

namespace Jp\YahooApis\SS\V201901;

class SoapResponseHeader
{

    /**
     * @var string $service
     */
    protected $service = null;

    /**
     * @var string $timeTakenSeconds
     */
    protected $timeTakenSeconds = null;

    /**
     * @var string $requestTime
     */
    protected $requestTime = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getService()
    {
      return $this->service;
    }

    /**
     * @param string $service
     * @return \Jp\YahooApis\SS\V201901\SoapResponseHeader
     */
    public function setService($service)
    {
      $this->service = $service;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeTakenSeconds()
    {
      return $this->timeTakenSeconds;
    }

    /**
     * @param string $timeTakenSeconds
     * @return \Jp\YahooApis\SS\V201901\SoapResponseHeader
     */
    public function setTimeTakenSeconds($timeTakenSeconds)
    {
      $this->timeTakenSeconds = $timeTakenSeconds;
      return $this;
    }

    /**
     * @return string
     */
    public function getRequestTime()
    {
      return $this->requestTime;
    }

    /**
     * @param string $requestTime
     * @return \Jp\YahooApis\SS\V201901\SoapResponseHeader
     */
    public function setRequestTime($requestTime)
    {
      $this->requestTime = $requestTime;
      return $this;
    }

}
