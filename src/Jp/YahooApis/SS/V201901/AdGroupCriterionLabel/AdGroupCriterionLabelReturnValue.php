<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterionLabel;

class AdGroupCriterionLabelReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupCriterionLabelValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupCriterionLabelValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupCriterionLabelValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterionLabel\AdGroupCriterionLabelReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
