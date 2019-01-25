<?php

namespace Jp\YahooApis\SS\V201901\Campaign;

class UrlReviewData
{

    /**
     * @var ReviewUrl $inReviewUrl
     */
    protected $inReviewUrl = null;

    /**
     * @var ReviewUrl $disapprovalReviewUrl
     */
    protected $disapprovalReviewUrl = null;

    /**
     * @var UrlApprovalStatus $urlApprovalStatus
     */
    protected $urlApprovalStatus = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ReviewUrl
     */
    public function getInReviewUrl()
    {
      return $this->inReviewUrl;
    }

    /**
     * @param ReviewUrl $inReviewUrl
     * @return \Jp\YahooApis\SS\V201901\Campaign\UrlReviewData
     */
    public function setInReviewUrl($inReviewUrl)
    {
      $this->inReviewUrl = $inReviewUrl;
      return $this;
    }

    /**
     * @return ReviewUrl
     */
    public function getDisapprovalReviewUrl()
    {
      return $this->disapprovalReviewUrl;
    }

    /**
     * @param ReviewUrl $disapprovalReviewUrl
     * @return \Jp\YahooApis\SS\V201901\Campaign\UrlReviewData
     */
    public function setDisapprovalReviewUrl($disapprovalReviewUrl)
    {
      $this->disapprovalReviewUrl = $disapprovalReviewUrl;
      return $this;
    }

    /**
     * @return UrlApprovalStatus
     */
    public function getUrlApprovalStatus()
    {
      return $this->urlApprovalStatus;
    }

    /**
     * @param UrlApprovalStatus $urlApprovalStatus
     * @return \Jp\YahooApis\SS\V201901\Campaign\UrlReviewData
     */
    public function setUrlApprovalStatus($urlApprovalStatus)
    {
      $this->urlApprovalStatus = $urlApprovalStatus;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getDisapprovalReasonCodes()
    {
      return $this->disapprovalReasonCodes;
    }

    /**
     * @param string[] $disapprovalReasonCodes
     * @return \Jp\YahooApis\SS\V201901\Campaign\UrlReviewData
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
