<?php

namespace Jp\YahooApis\SS\V201909\AccountShared;

class AccountSharedPage extends \Jp\YahooApis\SS\V201909\Page
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
     * @return \Jp\YahooApis\SS\V201909\AccountShared\AccountSharedPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
