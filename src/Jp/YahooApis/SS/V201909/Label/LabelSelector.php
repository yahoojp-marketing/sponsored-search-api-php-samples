<?php

namespace Jp\YahooApis\SS\V201909\Label;

class LabelSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $labelIds
     */
    protected $labelIds = null;

    /**
     * @var CountLabeledEntity $countLabeledEntity
     */
    protected $countLabeledEntity = null;

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
     * @return \Jp\YahooApis\SS\V201909\Label\LabelSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getLabelIds()
    {
      return $this->labelIds;
    }

    /**
     * @param long[] $labelIds
     * @return \Jp\YahooApis\SS\V201909\Label\LabelSelector
     */
    public function setLabelIds(array $labelIds = null)
    {
      $this->labelIds = $labelIds;
      return $this;
    }

    /**
     * @return CountLabeledEntity
     */
    public function getCountLabeledEntity()
    {
      return $this->countLabeledEntity;
    }

    /**
     * @param CountLabeledEntity $countLabeledEntity
     * @return \Jp\YahooApis\SS\V201909\Label\LabelSelector
     */
    public function setCountLabeledEntity($countLabeledEntity)
    {
      $this->countLabeledEntity = $countLabeledEntity;
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
     * @return \Jp\YahooApis\SS\V201909\Label\LabelSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
