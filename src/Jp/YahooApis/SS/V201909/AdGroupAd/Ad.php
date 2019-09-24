<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class Ad
{

    /**
     * @var AdType $type
     */
    protected $type = null;

    /**
     * @var string $advancedUrl
     */
    protected $advancedUrl = null;

    /**
     * @var AdGroupAdAdditionalAdvancedUrls[] $additionalAdvancedUrls
     */
    protected $additionalAdvancedUrls = null;

    /**
     * @var string $advancedMobileUrl
     */
    protected $advancedMobileUrl = null;

    /**
     * @var AdGroupAdAdditionalAdvancedMobileUrls[] $additionalAdvancedMobileUrls
     */
    protected $additionalAdvancedMobileUrls = null;

    /**
     * @var string $trackingUrl
     */
    protected $trackingUrl = null;

    /**
     * @var CustomParameters $customParameters
     */
    protected $customParameters = null;

    /**
     * @var string $url
     */
    protected $url = null;

    /**
     * @var string $displayUrl
     */
    protected $displayUrl = null;

    /**
     * @var string $headline
     */
    protected $headline = null;

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var DevicePreference $devicePreference
     */
    protected $devicePreference = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AdType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param AdType $type
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdvancedUrl()
    {
      return $this->advancedUrl;
    }

    /**
     * @param string $advancedUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setAdvancedUrl($advancedUrl)
    {
      $this->advancedUrl = $advancedUrl;
      return $this;
    }

    /**
     * @return AdGroupAdAdditionalAdvancedUrls[]
     */
    public function getAdditionalAdvancedUrls()
    {
      return $this->additionalAdvancedUrls;
    }

    /**
     * @param AdGroupAdAdditionalAdvancedUrls[] $additionalAdvancedUrls
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setAdditionalAdvancedUrls(array $additionalAdvancedUrls = null)
    {
      $this->additionalAdvancedUrls = $additionalAdvancedUrls;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdvancedMobileUrl()
    {
      return $this->advancedMobileUrl;
    }

    /**
     * @param string $advancedMobileUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setAdvancedMobileUrl($advancedMobileUrl)
    {
      $this->advancedMobileUrl = $advancedMobileUrl;
      return $this;
    }

    /**
     * @return AdGroupAdAdditionalAdvancedMobileUrls[]
     */
    public function getAdditionalAdvancedMobileUrls()
    {
      return $this->additionalAdvancedMobileUrls;
    }

    /**
     * @param AdGroupAdAdditionalAdvancedMobileUrls[] $additionalAdvancedMobileUrls
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setAdditionalAdvancedMobileUrls(array $additionalAdvancedMobileUrls = null)
    {
      $this->additionalAdvancedMobileUrls = $additionalAdvancedMobileUrls;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setTrackingUrl($trackingUrl)
    {
      $this->trackingUrl = $trackingUrl;
      return $this;
    }

    /**
     * @return CustomParameters
     */
    public function getCustomParameters()
    {
      return $this->customParameters;
    }

    /**
     * @param CustomParameters $customParameters
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setCustomParameters($customParameters)
    {
      $this->customParameters = $customParameters;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setUrl($url)
    {
      $this->url = $url;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisplayUrl()
    {
      return $this->displayUrl;
    }

    /**
     * @param string $displayUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setDisplayUrl($displayUrl)
    {
      $this->displayUrl = $displayUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
      return $this->headline;
    }

    /**
     * @param string $headline
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setHeadline($headline)
    {
      $this->headline = $headline;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return DevicePreference
     */
    public function getDevicePreference()
    {
      return $this->devicePreference;
    }

    /**
     * @param DevicePreference $devicePreference
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\Ad
     */
    public function setDevicePreference($devicePreference)
    {
      $this->devicePreference = $devicePreference;
      return $this;
    }

}
