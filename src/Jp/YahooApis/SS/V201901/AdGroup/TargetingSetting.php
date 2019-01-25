<?php

namespace Jp\YahooApis\SS\V201901\AdGroup;

class TargetingSetting extends AdGroupSettings
{

    /**
     * @var TargetAll $targetAll
     */
    protected $targetAll = null;

    /**
     * @param CriterionType $criterionType
     */
    public function __construct($criterionType)
    {
      parent::__construct($criterionType);
    }

    /**
     * @return TargetAll
     */
    public function getTargetAll()
    {
      return $this->targetAll;
    }

    /**
     * @param TargetAll $targetAll
     * @return \Jp\YahooApis\SS\V201901\AdGroup\TargetingSetting
     */
    public function setTargetAll($targetAll)
    {
      $this->targetAll = $targetAll;
      return $this;
    }

}
