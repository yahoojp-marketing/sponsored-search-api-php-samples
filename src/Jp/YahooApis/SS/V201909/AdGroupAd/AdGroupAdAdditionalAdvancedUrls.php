<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdAdditionalAdvancedUrls
{

    /**
     * @var string $advancedUrl
     */
    protected $advancedUrl = null;

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
    public function getAdvancedUrl()
    {
      return $this->advancedUrl;
    }

    /**
     * @param string $advancedUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedUrls
     */
    public function setAdvancedUrl($advancedUrl)
    {
      $this->advancedUrl = $advancedUrl;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdAdditionalAdvancedUrls
     */
    public function setDisapprovalReasonCodes(array $disapprovalReasonCodes = null)
    {
      $this->disapprovalReasonCodes = $disapprovalReasonCodes;
      return $this;
    }

}
