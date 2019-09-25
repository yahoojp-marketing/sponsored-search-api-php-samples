<?php

namespace Jp\YahooApis\SS\V201909\AccountTrackingUrl;

class AccountTrackingUrl
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var string $accountName
     */
    protected $accountName = null;

    /**
     * @var string $trackingUrl
     */
    protected $trackingUrl = null;

    /**
     * @var string $inReviewUrl
     */
    protected $inReviewUrl = null;

    /**
     * @var string $disapprovalReviewUrl
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
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
      return $this->accountName;
    }

    /**
     * @param string $accountName
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
     */
    public function setAccountName($accountName)
    {
      $this->accountName = $accountName;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
      return $this->trackingUrl;
    }

    /**
     * @param string $trackingUrl
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
     */
    public function setTrackingUrl($trackingUrl)
    {
      $this->trackingUrl = $trackingUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getInReviewUrl()
    {
      return $this->inReviewUrl;
    }

    /**
     * @param string $inReviewUrl
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
     */
    public function setInReviewUrl($inReviewUrl)
    {
      $this->inReviewUrl = $inReviewUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisapprovalReviewUrl()
    {
      return $this->disapprovalReviewUrl;
    }

    /**
     * @param string $disapprovalReviewUrl
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
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
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
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
     * @return \Jp\YahooApis\SS\V201909\AccountTrackingUrl\AccountTrackingUrl
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
