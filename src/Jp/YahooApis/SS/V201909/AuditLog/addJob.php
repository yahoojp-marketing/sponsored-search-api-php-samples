<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class addJob
{

    /**
     * @var AuditLogOperation $operations
     */
    protected $operations = null;

    /**
     * @param AuditLogOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return AuditLogOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param AuditLogOperation $operations
     * @return \Jp\YahooApis\SS\V201909\AuditLog\addJob
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
