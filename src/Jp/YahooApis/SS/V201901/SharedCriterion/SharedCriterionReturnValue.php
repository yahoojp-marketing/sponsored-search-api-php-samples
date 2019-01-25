<?php

namespace Jp\YahooApis\SS\V201901\SharedCriterion;

class SharedCriterionReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
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
     * @return \Jp\YahooApis\SS\V201901\SharedCriterion\SharedCriterionReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
