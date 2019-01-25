<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class Budget
{

    /**
     * @var BudgetPeriod $period
     */
    protected $period = null;

    /**
     * @var int $amount
     */
    protected $amount = null;

    /**
     * @var BudgetDeliveryMethod $deliveryMethod
     */
    protected $deliveryMethod = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return BudgetPeriod
     */
    public function getPeriod()
    {
      return $this->period;
    }

    /**
     * @param BudgetPeriod $period
     * @return \Jp\YahooApis\SS\V201901\Campaign\Budget
     */
    public function setPeriod($period)
    {
      $this->period = $period;
      return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
      return $this->amount;
    }

    /**
     * @param int $amount
     * @return \Jp\YahooApis\SS\V201901\Campaign\Budget
     */
    public function setAmount($amount)
    {
      $this->amount = $amount;
      return $this;
    }

    /**
     * @return BudgetDeliveryMethod
     */
    public function getDeliveryMethod()
    {
      return $this->deliveryMethod;
    }

    /**
     * @param BudgetDeliveryMethod $deliveryMethod
     * @return \Jp\YahooApis\SS\V201901\Campaign\Budget
     */
    public function setDeliveryMethod($deliveryMethod)
    {
      $this->deliveryMethod = $deliveryMethod;
      return $this;
    }

}
