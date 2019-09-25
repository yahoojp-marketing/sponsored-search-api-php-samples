<?php

namespace Jp\YahooApis\SS\V201909\CampaignTarget;

class Target
{

    /**
     * @var string $targetId
     */
    protected $targetId = null;

    /**
     * @var TargetType $targetType
     */
    protected $targetType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getTargetId()
    {
      return $this->targetId;
    }

    /**
     * @param string $targetId
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\Target
     */
    public function setTargetId($targetId)
    {
      $this->targetId = $targetId;
      return $this;
    }

    /**
     * @return TargetType
     */
    public function getTargetType()
    {
      return $this->targetType;
    }

    /**
     * @param TargetType $targetType
     * @return \Jp\YahooApis\SS\V201909\CampaignTarget\Target
     */
    public function setTargetType($targetType)
    {
      $this->targetType = $targetType;
      return $this;
    }

}
