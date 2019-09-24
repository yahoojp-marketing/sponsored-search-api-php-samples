<?php

namespace Jp\YahooApis\SS\V201909\AuditLog;

class get
{

    /**
     * @var AuditLogSelector $selector
     */
    protected $selector = null;

    /**
     * @param AuditLogSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return AuditLogSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param AuditLogSelector $selector
     * @return \Jp\YahooApis\SS\V201909\AuditLog\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
