<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class AuditLogValues extends \Jp\YahooApis\SS\V201909\ReturnValue
{

    /**
     * @var AuditLogJob $job
     */
    protected $job = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AuditLogJob
     */
    public function getJob()
    {
      return $this->job;
    }

    /**
     * @param AuditLogJob $job
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogValues
     */
    public function setJob($job)
    {
      $this->job = $job;
      return $this;
    }

}
