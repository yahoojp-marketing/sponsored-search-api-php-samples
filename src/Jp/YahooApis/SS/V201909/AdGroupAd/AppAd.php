<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AppAd extends Ad
{

    /**
     * @var string $description2
     */
    protected $description2 = null;

    /**
     * @var AppStore $appStore
     */
    protected $appStore = null;

    /**
     * @var string $appId
     */
    protected $appId = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getDescription2()
    {
      return $this->description2;
    }

    /**
     * @param string $description2
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AppAd
     */
    public function setDescription2($description2)
    {
      $this->description2 = $description2;
      return $this;
    }

    /**
     * @return AppStore
     */
    public function getAppStore()
    {
      return $this->appStore;
    }

    /**
     * @param AppStore $appStore
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AppAd
     */
    public function setAppStore($appStore)
    {
      $this->appStore = $appStore;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AppAd
     */
    public function setAppId($appId)
    {
      $this->appId = $appId;
      return $this;
    }

}
