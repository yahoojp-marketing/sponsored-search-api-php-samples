<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class AppConversion extends ConversionTracker
{

    /**
     * @var string $appId
     */
    protected $appId = null;

    /**
     * @var AppPlatform $appPlatform
     */
    protected $appPlatform = null;

    /**
     * @var AppConversionType $appConversionType
     */
    protected $appConversionType = null;

    /**
     * @var int $snippetId
     */
    protected $snippetId = null;

    /**
     * @var string $snippetLabel
     */
    protected $snippetLabel = null;

    /**
     * @var AppPostbackUrl $appPostbackUrl
     */
    protected $appPostbackUrl = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getAppId()
    {
      return $this->appId;
    }

    /**
     * @param string $appId
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setAppId($appId)
    {
      $this->appId = $appId;
      return $this;
    }

    /**
     * @return AppPlatform
     */
    public function getAppPlatform()
    {
      return $this->appPlatform;
    }

    /**
     * @param AppPlatform $appPlatform
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setAppPlatform($appPlatform)
    {
      $this->appPlatform = $appPlatform;
      return $this;
    }

    /**
     * @return AppConversionType
     */
    public function getAppConversionType()
    {
      return $this->appConversionType;
    }

    /**
     * @param AppConversionType $appConversionType
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setAppConversionType($appConversionType)
    {
      $this->appConversionType = $appConversionType;
      return $this;
    }

    /**
     * @return int
     */
    public function getSnippetId()
    {
      return $this->snippetId;
    }

    /**
     * @param int $snippetId
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setSnippetId($snippetId)
    {
      $this->snippetId = $snippetId;
      return $this;
    }

    /**
     * @return string
     */
    public function getSnippetLabel()
    {
      return $this->snippetLabel;
    }

    /**
     * @param string $snippetLabel
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setSnippetLabel($snippetLabel)
    {
      $this->snippetLabel = $snippetLabel;
      return $this;
    }

    /**
     * @return AppPostbackUrl
     */
    public function getAppPostbackUrl()
    {
      return $this->appPostbackUrl;
    }

    /**
     * @param AppPostbackUrl $appPostbackUrl
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\AppConversion
     */
    public function setAppPostbackUrl($appPostbackUrl)
    {
      $this->appPostbackUrl = $appPostbackUrl;
      return $this;
    }

}
