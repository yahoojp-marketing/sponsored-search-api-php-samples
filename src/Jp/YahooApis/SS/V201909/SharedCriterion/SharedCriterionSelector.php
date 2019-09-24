<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class SharedCriterionSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $sharedListIds
     */
    protected $sharedListIds = null;

    /**
     * @var long[] $criterionIds
     */
    protected $criterionIds = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Paging $paging
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
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getSharedListIds()
    {
      return $this->sharedListIds;
    }

    /**
     * @param long[] $sharedListIds
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector
     */
    public function setSharedListIds(array $sharedListIds = null)
    {
      $this->sharedListIds = $sharedListIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCriterionIds()
    {
      return $this->criterionIds;
    }

    /**
     * @param long[] $criterionIds
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector
     */
    public function setCriterionIds(array $criterionIds = null)
    {
      $this->criterionIds = $criterionIds;
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
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterionSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
