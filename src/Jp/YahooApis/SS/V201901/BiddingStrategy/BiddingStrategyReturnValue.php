<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class BiddingStrategyReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var BiddingStrategyValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BiddingStrategyValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param BiddingStrategyValues[] $values
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
