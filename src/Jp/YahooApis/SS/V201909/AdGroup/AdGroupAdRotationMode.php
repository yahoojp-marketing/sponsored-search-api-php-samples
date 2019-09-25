<?php

namespace Jp\YahooApis\SS\V201909\AdGroup;

class AdGroupAdRotationMode
{

    /**
     * @var AdRotationMode $adRotationMode
     */
    protected $adRotationMode = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AdRotationMode
     */
    public function getAdRotationMode()
    {
      return $this->adRotationMode;
    }

    /**
     * @param AdRotationMode $adRotationMode
     * @return \Jp\YahooApis\SS\V201909\AdGroup\AdGroupAdRotationMode
     */
    public function setAdRotationMode($adRotationMode)
    {
      $this->adRotationMode = $adRotationMode;
      return $this;
    }

}
