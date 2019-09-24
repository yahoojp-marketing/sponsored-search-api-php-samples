<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemUploadUrlOperation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var PageFeedItemUploadUrl[] $operand
     */
    protected $operand = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return PageFeedItemUploadUrl[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param PageFeedItemUploadUrl[] $operand
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlOperation
     */
    public function setOperand(array $operand = null)
    {
      $this->operand = $operand;
      return $this;
    }

}
