<?php

namespace Jp\YahooApis\SS\V201901\AuditLog;

class AuditLogJobStatus
{
    const __default = 'IN_PROGRESS';
    const IN_PROGRESS = 'IN_PROGRESS';
    const COMPLETED = 'COMPLETED';
    const TIMEOUT = 'TIMEOUT';
    const SYSTEM_ERROR = 'SYSTEM_ERROR';


}
