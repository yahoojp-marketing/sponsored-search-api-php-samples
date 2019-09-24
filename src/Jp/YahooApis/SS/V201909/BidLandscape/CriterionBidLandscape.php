<?php

namespace Jp\YahooApis\SS\V201909\BidLandscape;

class CriterionBidLandscape extends BidLandscape
{

    /**
     * @var int $criterionId
     */
    protected $criterionId = null;

    
    public function __construct()
    {
      parent::__construct();
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
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\CriterionBidLandscape
     */
    public function setCriterionId($criterionId)
    {
      $this->criterionId = $criterionId;
      return $this;
    }

}
