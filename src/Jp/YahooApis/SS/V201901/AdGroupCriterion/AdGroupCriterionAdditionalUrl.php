<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionAdditionalUrl
{

    /**
     * @var string $url
     */
    protected $url = null;

    /**
     * @var string $reviewUrl
     */
    protected $reviewUrl = null;

    /**
     * @var string[] $disapprovalReasonCodes
     */
    protected $disapprovalReasonCodes = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getUrl()
    {
      return $this->url;
    }

    /**
     * @param string $url
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalUrl
     */
    public function setUrl($url)
    {
      $this->url = $url;
      return $this;
    }

    /**
     * @return string
     */
    public function getReviewUrl()
    {
      return $this->reviewUrl;
    }

    /**
     * @param string $reviewUrl
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalUrl
     */
    public function setReviewUrl($reviewUrl)
    {
      $this->reviewUrl = $reviewUrl;
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalUrl
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
