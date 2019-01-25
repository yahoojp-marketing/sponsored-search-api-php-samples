<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionPage extends \Jp\YahooApis\SS\V201901\Page
{

    /**
     * @var AdGroupCriterionValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupCriterionValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupCriterionValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
