<?php

namespace Jp\YahooApis\SS\V201901\TargetingIdea;

class TargetingIdeaSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var SearchParameter[] $searchParameter
     */
    protected $searchParameter = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     * @param SearchParameter[] $searchParameter
     */
    public function __construct($accountId, array $searchParameter)
    {
      $this->accountId = $accountId;
      $this->searchParameter = $searchParameter;
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
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return SearchParameter[]
     */
    public function getSearchParameter()
    {
      return $this->searchParameter;
    }

    /**
     * @param SearchParameter[] $searchParameter
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaSelector
     */
    public function setSearchParameter(array $searchParameter)
    {
      $this->searchParameter = $searchParameter;
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
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\TargetingIdeaSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
