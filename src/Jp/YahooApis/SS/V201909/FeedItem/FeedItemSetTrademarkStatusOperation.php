<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemSetTrademarkStatusOperation
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
     * @var FeedItemSetTrademarkStatus[] $operand
     */
    protected $operand = null;

    /**
     * @param int $accountId
     * @param FeedItemPlaceholderType $placeholderType
     * @param FeedItemSetTrademarkStatus[] $operand
     */
    public function __construct($accountId, $placeholderType, array $operand)
    {
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatusOperation
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
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatusOperation
     */
    public function setPlaceholderType($placeholderType)
    {
      $this->placeholderType = $placeholderType;
      return $this;
    }

    /**
     * @return FeedItemSetTrademarkStatus[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param FeedItemSetTrademarkStatus[] $operand
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemSetTrademarkStatusOperation
     */
    public function setOperand(array $operand)
    {
      $this->operand = $operand;
      return $this;
    }

}
