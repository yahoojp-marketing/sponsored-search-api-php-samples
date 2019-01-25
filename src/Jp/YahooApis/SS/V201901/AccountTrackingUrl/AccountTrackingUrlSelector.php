<?php

namespace Jp\YahooApis\SS\V201901\AccountTrackingUrl;

class AccountTrackingUrlSelector
{

    /**
     * @var long[] $accountIds
     */
    protected $accountIds = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return long[]
     */
    public function getAccountIds()
    {
      return $this->accountIds;
    }

    /**
     * @param long[] $accountIds
     * @return \Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlSelector
     */
    public function setAccountIds(array $accountIds = null)
    {
      $this->accountIds = $accountIds;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Paging $paging
     * @return \Jp\YahooApis\SS\V201901\AccountTrackingUrl\AccountTrackingUrlSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
