<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class LocationTarget extends Target
{

    /**
     * @var string $provinceNameJA
     */
    protected $provinceNameJA = null;

    /**
     * @var string $provinceNameEN
     */
    protected $provinceNameEN = null;

    /**
     * @var string $cityNameJA
     */
    protected $cityNameJA = null;

    /**
     * @var string $cityNameEN
     */
    protected $cityNameEN = null;

    /**
     * @var ExcludedType $excludedType
     */
    protected $excludedType = null;

    /**
     * @var TargetingStatus $targetingStatus
     */
    protected $targetingStatus = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getProvinceNameJA()
    {
      return $this->provinceNameJA;
    }

    /**
     * @param string $provinceNameJA
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setProvinceNameJA($provinceNameJA)
    {
      $this->provinceNameJA = $provinceNameJA;
      return $this;
    }

    /**
     * @return string
     */
    public function getProvinceNameEN()
    {
      return $this->provinceNameEN;
    }

    /**
     * @param string $provinceNameEN
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setProvinceNameEN($provinceNameEN)
    {
      $this->provinceNameEN = $provinceNameEN;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityNameJA()
    {
      return $this->cityNameJA;
    }

    /**
     * @param string $cityNameJA
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setCityNameJA($cityNameJA)
    {
      $this->cityNameJA = $cityNameJA;
      return $this;
    }

    /**
     * @return string
     */
    public function getCityNameEN()
    {
      return $this->cityNameEN;
    }

    /**
     * @param string $cityNameEN
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setCityNameEN($cityNameEN)
    {
      $this->cityNameEN = $cityNameEN;
      return $this;
    }

    /**
     * @return ExcludedType
     */
    public function getExcludedType()
    {
      return $this->excludedType;
    }

    /**
     * @param ExcludedType $excludedType
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setExcludedType($excludedType)
    {
      $this->excludedType = $excludedType;
      return $this;
    }

    /**
     * @return TargetingStatus
     */
    public function getTargetingStatus()
    {
      return $this->targetingStatus;
    }

    /**
     * @param TargetingStatus $targetingStatus
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\LocationTarget
     */
    public function setTargetingStatus($targetingStatus)
    {
      $this->targetingStatus = $targetingStatus;
      return $this;
    }

}
