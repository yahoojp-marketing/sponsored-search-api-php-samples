<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class WebConversion extends ConversionTracker
{

    /**
     * @var string $snippet
     */
    protected $snippet = null;

    /**
     * @var MarkupLanguage $markupLanguage
     */
    protected $markupLanguage = null;

    /**
     * @var TrackingCodeType $trackingCodeType
     */
    protected $trackingCodeType = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getSnippet()
    {
      return $this->snippet;
    }

    /**
     * @param string $snippet
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\WebConversion
     */
    public function setSnippet($snippet)
    {
      $this->snippet = $snippet;
      return $this;
    }

    /**
     * @return MarkupLanguage
     */
    public function getMarkupLanguage()
    {
      return $this->markupLanguage;
    }

    /**
     * @param MarkupLanguage $markupLanguage
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\WebConversion
     */
    public function setMarkupLanguage($markupLanguage)
    {
      $this->markupLanguage = $markupLanguage;
      return $this;
    }

    /**
     * @return TrackingCodeType
     */
    public function getTrackingCodeType()
    {
      return $this->trackingCodeType;
    }

    /**
     * @param TrackingCodeType $trackingCodeType
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\WebConversion
     */
    public function setTrackingCodeType($trackingCodeType)
    {
      $this->trackingCodeType = $trackingCodeType;
      return $this;
    }

}
