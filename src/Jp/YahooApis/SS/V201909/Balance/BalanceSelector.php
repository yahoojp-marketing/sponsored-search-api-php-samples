<?php

namespace Jp\YahooApis\SS\V201909\Balance;

class BalanceSelector
{

    /**
     * @var long[] $accountIds
     */
    protected $accountIds = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
     */
    protected $paging = null;

    /**
     * @param long[] $accountIds
     */
    public function __construct(array $accountIds)
    {
      $this->accountIds = $accountIds;
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
     * @return \Jp\YahooApis\SS\V201909\Balance\BalanceSelector
     */
    public function setAccountIds(array $accountIds)
    {
      $this->accountIds = $accountIds;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201909\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201909\Paging $paging
     * @return \Jp\YahooApis\SS\V201909\Balance\BalanceSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
