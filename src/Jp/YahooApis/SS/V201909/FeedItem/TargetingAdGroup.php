<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class TargetingAdGroup
{

    /**
     * @var int $targetingAdGroupId
     */
    protected $targetingAdGroupId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getTargetingAdGroupId()
    {
      return $this->targetingAdGroupId;
    }

    /**
     * @param int $targetingAdGroupId
     * @return \Jp\YahooApis\SS\V201909\FeedItem\TargetingAdGroup
     */
    public function setTargetingAdGroupId($targetingAdGroupId)
    {
      $this->targetingAdGroupId = $targetingAdGroupId;
      return $this;
    }

}
