<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

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

    /**
     * @param AuditLogJob[] $operand
     */
    public function __construct(array $operand)
    {
      $this->operand = $operand;
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
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogOperation
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
     * @return \Jp\YahooApis\SS\V201909\AuditLog\AuditLogOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
