<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class RetargetingAccountStatus
{

    /**
     * @var string $agreeDate
     */
    protected $agreeDate = null;

    /**
     * @var ReviewStatus $reviewStatus
     */
    protected $reviewStatus = null;

    /**
     * @var string $reviewRequestDate
     */
    protected $reviewRequestDate = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAgreeDate()
    {
      return $this->agreeDate;
    }

    /**
     * @param string $agreeDate
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingAccountStatus
     */
    public function setAgreeDate($agreeDate)
    {
      $this->agreeDate = $agreeDate;
      return $this;
    }

    /**
     * @return ReviewStatus
     */
    public function getReviewStatus()
    {
      return $this->reviewStatus;
    }

    /**
     * @param ReviewStatus $reviewStatus
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingAccountStatus
     */
    public function setReviewStatus($reviewStatus)
    {
      $this->reviewStatus = $reviewStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewRequestDate()
    {
      return $this->reviewRequestDate;
    }

    /**
     * @param string $reviewRequestDate
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RetargetingAccountStatus
     */
    public function setReviewRequestDate($reviewRequestDate)
    {
      $this->reviewRequestDate = $reviewRequestDate;
      return $this;
    }

}
