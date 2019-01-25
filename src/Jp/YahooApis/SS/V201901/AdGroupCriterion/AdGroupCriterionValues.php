<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var AdGroupCriterion $adGroupCriterion
     */
    protected $adGroupCriterion = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupCriterion
     */
    public function getAdGroupCriterion()
    {
      return $this->adGroupCriterion;
    }

    /**
     * @param AdGroupCriterion $adGroupCriterion
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionValues
     */
    public function setAdGroupCriterion($adGroupCriterion)
    {
      $this->adGroupCriterion = $adGroupCriterion;
      return $this;
    }

}
