<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class TargetingIdeaValues
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var TypeAttributeMapEntry $data
     */
    protected $data = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\TargetingIdeaValues
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return TypeAttributeMapEntry
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * @param TypeAttributeMapEntry $data
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\TargetingIdeaValues
     */
    public function setData($data)
    {
      $this->data = $data;
      return $this;
    }

}
