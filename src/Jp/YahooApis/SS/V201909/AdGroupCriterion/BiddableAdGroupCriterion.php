<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class BiddableAdGroupCriterion extends AdGroupCriterion
{

    /**
     * @var UserStatus $userStatus
     */
    protected $userStatus = null;

    /**
     * @var ApprovalStatus $approvalStatus
     */
    protected $approvalStatus = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    /**
     * @var string $destinationUrl
     */
    protected $destinationUrl = null;

    /**
     * @var string $reviewDestinationUrl
     */
    protected $reviewDestinationUrl = null;

    /**
     * @var Bid $bid
     */
    protected $bid = null;

    /**
     * @var string $advancedUrl
     */
    protected $advancedUrl = null;

    /**
     * @var string $reviewAdvancedUrl
     */
    protected $reviewAdvancedUrl = null;

    /**
     * @var AdGroupCriterionAdditionalAdvancedUrls $additionalAdvancedUrls
     */
    protected $additionalAdvancedUrls = null;

    /**
     * @var string $advancedMobileUrl
     */
    protected $advancedMobileUrl = null;

    /**
     * @var string $reviewAdvancedMobileUrl
     */
    protected $reviewAdvancedMobileUrl = null;

    /**
     * @var AdGroupCriterionAdditionalAdvancedMobileUrls $additionalAdvancedMobileUrls
     */
    protected $additionalAdvancedMobileUrls = null;

    /**
     * @var string $trackingUrl
     */
    protected $trackingUrl = null;

    /**
     * @var string $reviewTrackingUrl
     */
    protected $reviewTrackingUrl = null;

    /**
     * @var CustomParameters $customParameters
     */
    protected $customParameters = null;

    /**
     * @var CustomParameters $reviewCustomParameters
     */
    protected $reviewCustomParameters = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return UserStatus
     */
    public function getUserStatus()
    {
      return $this->userStatus;
    }

    /**
     * @param UserStatus $userStatus
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setUserStatus($userStatus)
    {
      $this->userStatus = $userStatus;
      return $this;
    }

    /**
     * @return ApprovalStatus
     */
    public function getApprovalStatus()
    {
      return $this->approvalStatus;
    }

    /**
     * @param ApprovalStatus $approvalStatus
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setApprovalStatus($approvalStatus)
    {
      $this->approvalStatus = $approvalStatus;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

    /**
     * @return string
     */
    public function getDestinationUrl()
    {
      return $this->destinationUrl;
    }

    /**
     * @param string $destinationUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setDestinationUrl($destinationUrl)
    {
      $this->destinationUrl = $destinationUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewDestinationUrl()
    {
      return $this->reviewDestinationUrl;
    }

    /**
     * @param string $reviewDestinationUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setReviewDestinationUrl($reviewDestinationUrl)
    {
      $this->reviewDestinationUrl = $reviewDestinationUrl;
      return $this;
    }

    /**
     * @return Bid
     */
    public function getBid()
    {
      return $this->bid;
    }

    /**
     * @param Bid $bid
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setBid($bid)
    {
      $this->bid = $bid;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdvancedUrl()
    {
      return $this->advancedUrl;
    }

    /**
     * @param string $advancedUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setAdvancedUrl($advancedUrl)
    {
      $this->advancedUrl = $advancedUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewAdvancedUrl()
    {
      return $this->reviewAdvancedUrl;
    }

    /**
     * @param string $reviewAdvancedUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setReviewAdvancedUrl($reviewAdvancedUrl)
    {
      $this->reviewAdvancedUrl = $reviewAdvancedUrl;
      return $this;
    }

    /**
     * @return AdGroupCriterionAdditionalAdvancedUrls
     */
    public function getAdditionalAdvancedUrls()
    {
      return $this->additionalAdvancedUrls;
    }

    /**
     * @param AdGroupCriterionAdditionalAdvancedUrls $additionalAdvancedUrls
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setAdditionalAdvancedUrls($additionalAdvancedUrls)
    {
      $this->additionalAdvancedUrls = $additionalAdvancedUrls;
      return $this;
    }

    /**
     * @return string
     */
    public function getAdvancedMobileUrl()
    {
      return $this->advancedMobileUrl;
    }

    /**
     * @param string $advancedMobileUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setAdvancedMobileUrl($advancedMobileUrl)
    {
      $this->advancedMobileUrl = $advancedMobileUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewAdvancedMobileUrl()
    {
      return $this->reviewAdvancedMobileUrl;
    }

    /**
     * @param string $reviewAdvancedMobileUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setReviewAdvancedMobileUrl($reviewAdvancedMobileUrl)
    {
      $this->reviewAdvancedMobileUrl = $reviewAdvancedMobileUrl;
      return $this;
    }

    /**
     * @return AdGroupCriterionAdditionalAdvancedMobileUrls
     */
    public function getAdditionalAdvancedMobileUrls()
    {
      return $this->additionalAdvancedMobileUrls;
    }

    /**
     * @param AdGroupCriterionAdditionalAdvancedMobileUrls $additionalAdvancedMobileUrls
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setAdditionalAdvancedMobileUrls($additionalAdvancedMobileUrls)
    {
      $this->additionalAdvancedMobileUrls = $additionalAdvancedMobileUrls;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setTrackingUrl($trackingUrl)
    {
      $this->trackingUrl = $trackingUrl;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewTrackingUrl()
    {
      return $this->reviewTrackingUrl;
    }

    /**
     * @param string $reviewTrackingUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setReviewTrackingUrl($reviewTrackingUrl)
    {
      $this->reviewTrackingUrl = $reviewTrackingUrl;
      return $this;
    }

    /**
     * @return CustomParameters
     */
    public function getCustomParameters()
    {
      return $this->customParameters;
    }

    /**
     * @param CustomParameters $customParameters
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setCustomParameters($customParameters)
    {
      $this->customParameters = $customParameters;
      return $this;
    }

    /**
     * @return CustomParameters
     */
    public function getReviewCustomParameters()
    {
      return $this->reviewCustomParameters;
    }

    /**
     * @param CustomParameters $reviewCustomParameters
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\BiddableAdGroupCriterion
     */
    public function setReviewCustomParameters($reviewCustomParameters)
    {
      $this->reviewCustomParameters = $reviewCustomParameters;
      return $this;
    }

}
