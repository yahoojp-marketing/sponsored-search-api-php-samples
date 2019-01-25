<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class BiddingStrategyPage extends \Jp\YahooApis\SS\V201901\Page
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
