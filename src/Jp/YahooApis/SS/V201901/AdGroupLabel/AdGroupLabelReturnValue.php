<?php

namespace Jp\YahooApis\SS\V201901\AdGroupLabel;

class AdGroupLabelReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var AdGroupLabelValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupLabelValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupLabelValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupLabel\AdGroupLabelReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
