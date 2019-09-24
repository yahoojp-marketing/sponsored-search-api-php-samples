<?php

namespace Jp\YahooApis\SS\V201909\AccountShared;

class AccountSharedReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var AccountSharedValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AccountSharedValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AccountSharedValues[] $values
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountSharedReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
