<?php

namespace Jp\YahooApis\SS\V201901\AuditLog;

class AuditLogOperation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var AuditLogJob[] $operand
     */
    protected $operand = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return AuditLogJob[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param AuditLogJob[] $operand
     * @return \Jp\YahooApis\SS\V201901\AuditLog\AuditLogOperation
     */
    public function setOperand(array $operand = null)
    {
      $this->operand = $operand;
      return $this;
    }

}
