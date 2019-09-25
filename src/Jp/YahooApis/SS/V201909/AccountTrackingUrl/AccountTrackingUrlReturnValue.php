<?php

namespace Jp\YahooApis\SS\V201909\AccountTrackingUrl;

class AccountTrackingUrlReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var AccountTrackingUrlValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AccountTrackingUrlValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AccountTrackingUrlValues[] $values
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrlReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
