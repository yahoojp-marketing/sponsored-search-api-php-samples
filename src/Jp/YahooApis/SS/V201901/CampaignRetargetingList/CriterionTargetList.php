<?php

namespace Jp\YahooApis\SS\V201901\CampaignRetargetingList;

class CriterionTargetList
{

    /**
     * @var int $targetListId
     */
    protected $targetListId = null;

    /**
     * @var string $targetListName
     */
    protected $targetListName = null;

    /**
     * @var int $retargetingTrackId
     */
    protected $retargetingTrackId = null;

    /**
     * @param int $targetListId
     */
    public function __construct($targetListId)
    {
      $this->targetListId = $targetListId;
    }

    /**
     * @return int
     */
    public function getTargetListId()
    {
      return $this->targetListId;
    }

    /**
     * @param int $targetListId
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\CriterionTargetList
     */
    public function setTargetListId($targetListId)
    {
      $this->targetListId = $targetListId;
      return $this;
    }

    /**
     * @return string
     */
    public function getTargetListName()
    {
      return $this->targetListName;
    }

    /**
     * @param string $targetListName
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\CriterionTargetList
     */
    public function setTargetListName($targetListName)
    {
      $this->targetListName = $targetListName;
      return $this;
    }

    /**
     * @return int
     */
    public function getRetargetingTrackId()
    {
      return $this->retargetingTrackId;
    }

    /**
     * @param int $retargetingTrackId
     * @return \Jp\YahooApis\SS\V201901\CampaignRetargetingList\CriterionTargetList
     */
    public function setRetargetingTrackId($retargetingTrackId)
    {
      $this->retargetingTrackId = $retargetingTrackId;
      return $this;
    }

}
