<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class NetworkTarget extends Target
{

    /**
     * @var NetworkCoverageType $networkCoverageType
     */
    protected $networkCoverageType = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return NetworkCoverageType
     */
    public function getNetworkCoverageType()
    {
      return $this->networkCoverageType;
    }

    /**
     * @param NetworkCoverageType $networkCoverageType
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\NetworkTarget
     */
    public function setNetworkCoverageType($networkCoverageType)
    {
      $this->networkCoverageType = $networkCoverageType;
      return $this;
    }

}
