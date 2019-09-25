<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdAdditionalAdvancedMobileUrls
{

    /**
     * @var string $advancedMobileUrl
     */
    protected $advancedMobileUrl = null;

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
    public function getAdvancedMobileUrl()
    {
      return $this->advancedMobileUrl;
    }

    /**
     * @param string $advancedMobileUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedMobileUrls
     */
    public function setAdvancedMobileUrl($advancedMobileUrl)
    {
      $this->advancedMobileUrl = $advancedMobileUrl;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedMobileUrls
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
