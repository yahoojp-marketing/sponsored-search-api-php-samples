<?php

namespace Jp\YahooApis\SS\V201901\AdGroupLabel;

class AdGroupLabelValues extends \Jp\YahooApis\SS\V201901\ReturnValue
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelValues
     */
    public function setAdGroupLabel($adGroupLabel)
    {
      $this->adGroupLabel = $adGroupLabel;
      return $this;
    }

}
