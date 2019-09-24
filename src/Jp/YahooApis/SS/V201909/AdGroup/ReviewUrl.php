<?php

namespace Jp\YahooApis\SS\V201909\AdGroup;

class ReviewUrl
{

    /**
     * @var string $trackingUrl
     */
    protected $trackingUrl = null;

    /**
     * @var CustomParameter[] $parameters
     */
    protected $parameters = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
      return $this->trackingUrl;
    }

    /**
     * @param string $trackingUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroup\ReviewUrl
     */
    public function setTrackingUrl($trackingUrl)
    {
      $this->trackingUrl = $trackingUrl;
      return $this;
    }

    /**
     * @return CustomParameter[]
     */
    public function getParameters()
    {
      return $this->parameters;
    }

    /**
     * @param CustomParameter[] $parameters
     * @return \Jp\YahooApis\SS\V201909\AdGroup\ReviewUrl
     */
    public function setParameters(array $parameters = null)
    {
      $this->parameters = $parameters;
      return $this;
    }

}
