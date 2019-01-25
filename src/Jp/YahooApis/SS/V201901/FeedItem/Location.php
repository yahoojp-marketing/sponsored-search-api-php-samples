<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class Location
{

    /**
     * @var string $targetId
     */
    protected $targetId = null;

    /**
     * @var CriterionTypeFeedItem $type
     */
    protected $type = null;

    /**
     * @var FeedItemGeoRestriction $geoTargetingRestriction
     */
    protected $geoTargetingRestriction = null;

    /**
     * @var IsRemove $isRemove
     */
    protected $isRemove = null;

    
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
     * @return \Jp\YahooApis\SS\V201901\FeedItem\Location
     */
    public function setTargetId($targetId)
    {
      $this->targetId = $targetId;
      return $this;
    }

    /**
     * @return CriterionTypeFeedItem
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param CriterionTypeFeedItem $type
     * @return \Jp\YahooApis\SS\V201901\FeedItem\Location
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return FeedItemGeoRestriction
     */
    public function getGeoTargetingRestriction()
    {
      return $this->geoTargetingRestriction;
    }

    /**
     * @param FeedItemGeoRestriction $geoTargetingRestriction
     * @return \Jp\YahooApis\SS\V201901\FeedItem\Location
     */
    public function setGeoTargetingRestriction($geoTargetingRestriction)
    {
      $this->geoTargetingRestriction = $geoTargetingRestriction;
      return $this;
    }

    /**
     * @return IsRemove
     */
    public function getIsRemove()
    {
      return $this->isRemove;
    }

    /**
     * @param IsRemove $isRemove
     * @return \Jp\YahooApis\SS\V201901\FeedItem\Location
     */
    public function setIsRemove($isRemove)
    {
      $this->isRemove = $isRemove;
      return $this;
    }

}
