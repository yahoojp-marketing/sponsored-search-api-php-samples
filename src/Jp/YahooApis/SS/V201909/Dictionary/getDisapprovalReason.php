<?php

namespace Jp\YahooApis\SS\V201909\Dictionary;

class getDisapprovalReason
{

    /**
     * @var DisapprovalReasonSelector $selector
     */
    protected $selector = null;

    /**
     * @param DisapprovalReasonSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return DisapprovalReasonSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param DisapprovalReasonSelector $selector
     * @return \Jp\YahooApis\SS\V201909\Dictionary\getDisapprovalReason
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
