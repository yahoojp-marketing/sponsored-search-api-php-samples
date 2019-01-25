<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class GeoTargetTypeSetting extends CampaignSettings
{

    /**
     * @var GeoTargetType $positiveGeoTargetType
     */
    protected $positiveGeoTargetType = null;

    /**
     * @var GeoTargetType $negativeGeoTargetType
     */
    protected $negativeGeoTargetType = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return GeoTargetType
     */
    public function getPositiveGeoTargetType()
    {
      return $this->positiveGeoTargetType;
    }

    /**
     * @param GeoTargetType $positiveGeoTargetType
     * @return \Jp\YahooApis\SS\V201901\Campaign\GeoTargetTypeSetting
     */
    public function setPositiveGeoTargetType($positiveGeoTargetType)
    {
      $this->positiveGeoTargetType = $positiveGeoTargetType;
      return $this;
    }

    /**
     * @return GeoTargetType
     */
    public function getNegativeGeoTargetType()
    {
      return $this->negativeGeoTargetType;
    }

    /**
     * @param GeoTargetType $negativeGeoTargetType
     * @return \Jp\YahooApis\SS\V201901\Campaign\GeoTargetTypeSetting
     */
    public function setNegativeGeoTargetType($negativeGeoTargetType)
    {
      $this->negativeGeoTargetType = $negativeGeoTargetType;
      return $this;
    }

}
