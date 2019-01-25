<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class AppPostbackUrl
{

    /**
     * @var string $url
     */
    protected $url = null;

    /**
     * @var AppPostbackUrlClearFlag $clearFlag
     */
    protected $clearFlag = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getUrl()
    {
      return $this->url;
    }

    /**
     * @param string $url
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppPostbackUrl
     */
    public function setUrl($url)
    {
      $this->url = $url;
      return $this;
    }

    /**
     * @return AppPostbackUrlClearFlag
     */
    public function getClearFlag()
    {
      return $this->clearFlag;
    }

    /**
     * @param AppPostbackUrlClearFlag $clearFlag
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppPostbackUrl
     */
    public function setClearFlag($clearFlag)
    {
      $this->clearFlag = $clearFlag;
      return $this;
    }

}
