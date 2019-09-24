<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class Criterion
{

    /**
     * @var int $criterionId
     */
    protected $criterionId = null;

    /**
     * @var int $criterionTrackId
     */
    protected $criterionTrackId = null;

    /**
     * @var CriterionType $type
     */
    protected $type = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getCriterionId()
    {
      return $this->criterionId;
    }

    /**
     * @param int $criterionId
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\Criterion
     */
    public function setCriterionId($criterionId)
    {
      $this->criterionId = $criterionId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCriterionTrackId()
    {
      return $this->criterionTrackId;
    }

    /**
     * @param int $criterionTrackId
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\Criterion
     */
    public function setCriterionTrackId($criterionTrackId)
    {
      $this->criterionTrackId = $criterionTrackId;
      return $this;
    }

    /**
     * @return CriterionType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param CriterionType $type
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\Criterion
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

}
