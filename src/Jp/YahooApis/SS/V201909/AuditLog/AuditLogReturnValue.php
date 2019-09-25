<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class AuditLogReturnValue extends \Jp\YahooApis\SS\V201909\ListReturnValue
{

    /**
     * @var AuditLogValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AuditLogValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AuditLogValues[] $values
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
