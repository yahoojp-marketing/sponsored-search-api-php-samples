<?php

namespace Jp\YahooApis\SS\V201909\AdGroup;

class AdGroupSettings
{

    /**
     * @var CriterionType $criterionType
     */
    protected $criterionType = null;

    /**
     * @param CriterionType $criterionType
     */
    public function __construct($criterionType)
    {
      $this->criterionType = $criterionType;
    }

    /**
     * @return CriterionType
     */
    public function getCriterionType()
    {
      return $this->criterionType;
    }

    /**
     * @param CriterionType $criterionType
     * @return \Jp\YahooApis\SS\V201909\AdGroup\AdGroupSettings
     */
    public function setCriterionType($criterionType)
    {
      $this->criterionType = $criterionType;
      return $this;
    }

}
