<?php

namespace Jp\YahooApis\SS\V201901\BiddingStrategy;

class BiddingStrategySelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $biddingStrategyIds
     */
    protected $biddingStrategyIds = null;

    /**
     * @var BiddingStrategyType[] $biddingStrategyTypes
     */
    protected $biddingStrategyTypes = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategySelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getBiddingStrategyIds()
    {
      return $this->biddingStrategyIds;
    }

    /**
     * @param long[] $biddingStrategyIds
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategySelector
     */
    public function setBiddingStrategyIds(array $biddingStrategyIds = null)
    {
      $this->biddingStrategyIds = $biddingStrategyIds;
      return $this;
    }

    /**
     * @return BiddingStrategyType[]
     */
    public function getBiddingStrategyTypes()
    {
      return $this->biddingStrategyTypes;
    }

    /**
     * @param BiddingStrategyType[] $biddingStrategyTypes
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategySelector
     */
    public function setBiddingStrategyTypes(array $biddingStrategyTypes = null)
    {
      $this->biddingStrategyTypes = $biddingStrategyTypes;
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
     * @return \Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategySelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
