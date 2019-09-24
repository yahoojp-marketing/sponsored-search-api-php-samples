<?php

namespace Jp\YahooApis\SS\V201909\AdGroupLabel;

class AdGroupLabelValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var AdGroupLabel $adGroupLabel
     */
    protected $adGroupLabel = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupLabel
     */
    public function getAdGroupLabel()
    {
      return $this->adGroupLabel;
    }

    /**
     * @param AdGroupLabel $adGroupLabel
     * @return \Jp\YahooApis\SS\V201909\AdGroupLabel\AdGroupLabelValues
     */
    public function setAdGroupLabel($adGroupLabel)
    {
      $this->adGroupLabel = $adGroupLabel;
      return $this;
    }

}
