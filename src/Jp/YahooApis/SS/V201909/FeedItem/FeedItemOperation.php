<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemOperation extends Operation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var FeedItemPlaceholderType $placeholderType
     */
    protected $placeholderType = null;

    /**
     * @var FeedItem[] $operand
     */
    protected $operand = null;

    /**
     * @param Operator $operator
     * @param int $accountId
     * @param FeedItemPlaceholderType $placeholderType
     * @param FeedItem[] $operand
     */
    public function __construct($operator, $accountId, $placeholderType, array $operand)
    {
      parent::__construct($operator);
      $this->accountId = $accountId;
      $this->placeholderType = $placeholderType;
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return FeedItemPlaceholderType
     */
    public function getPlaceholderType()
    {
      return $this->placeholderType;
    }

    /**
     * @param FeedItemPlaceholderType $placeholderType
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemOperation
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return FeedItem[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param FeedItem[] $operand
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
