<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class DefaultTargetList extends TargetingList
{

    /**
     * @var Tag $tag
     */
    protected $tag = null;

    /**
     * @param int $accountId
     * @param TargetListType $targetListType
     */
    public function __construct($accountId, $targetListType)
    {
      parent::__construct($accountId, $targetListType);
    }

    /**
     * @return Tag
     */
    public function getTag()
    {
      return $this->tag;
    }

    /**
     * @param Tag $tag
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\DefaultTargetList
     */
    public function setTag($tag)
    {
      $this->tag = $tag;
      return $this;
    }

}
