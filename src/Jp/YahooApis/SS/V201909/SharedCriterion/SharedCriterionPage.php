<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class SharedCriterionPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var SharedCriterionValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return SharedCriterionValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param SharedCriterionValues[] $values
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
