<?php

namespace Jp\YahooApis\SS\V201901\AuditLog;

class EventSelector
{

    /**
     * @var string $entityType
     */
    protected $entityType = null;

    /**
     * @var AuditLogEventType[] $eventTypes
     */
    protected $eventTypes = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getEntityType()
    {
      return $this->entityType;
    }

    /**
     * @param string $entityType
     * @return \Jp\YahooApis\SS\V201901\AuditLog\EventSelector
     */
    public function setEntityType($entityType)
    {
      $this->entityType = $entityType;
      return $this;
    }

    /**
     * @return AuditLogEventType[]
     */
    public function getEventTypes()
    {
      return $this->eventTypes;
    }

    /**
     * @param AuditLogEventType[] $eventTypes
     * @return \Jp\YahooApis\SS\V201901\AuditLog\EventSelector
     */
    public function setEventTypes(array $eventTypes = null)
    {
      $this->eventTypes = $eventTypes;
      return $this;
    }

}
