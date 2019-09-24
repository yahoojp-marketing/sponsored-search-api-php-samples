<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class AuditLogPage extends \Jp\YahooApis\SS\V201909\Page
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
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
