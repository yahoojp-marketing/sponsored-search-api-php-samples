<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemDownloadJobOperation
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var PageFeedItemDownloadJob[] $operand
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
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobOperation
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return PageFeedItemDownloadJob[]
     */
    public function getOperand()
    {
      return $this->operand;
    }

    /**
     * @param PageFeedItemDownloadJob[] $operand
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobOperation
     */
    public function setOperand(array $operand = null)
    {
      $this->operand = $operand;
      return $this;
    }

}
