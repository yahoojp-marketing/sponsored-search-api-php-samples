<?php

namespace Jp\YahooApis\SS\V201909\Balance;

class BalancePage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var BalanceValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BalanceValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param BalanceValues[] $values
     * @return \Jp\YahooApis\SS\V201909\Balance\BalancePage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
