<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class AdGroupCriterionAdditionalAdvancedMobileUrls
{

    /**
     * @var AdGroupCriterionAdditionalUrl[] $additionalAdvancedMobileUrl
     */
    protected $additionalAdvancedMobileUrl = null;

    /**
     * @var IsRemove $isRemove
     */
    protected $isRemove = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AdGroupCriterionAdditionalUrl[]
     */
    public function getAdditionalAdvancedMobileUrl()
    {
      return $this->additionalAdvancedMobileUrl;
    }

    /**
     * @param AdGroupCriterionAdditionalUrl[] $additionalAdvancedMobileUrl
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedMobileUrls
     */
    public function setAdditionalAdvancedMobileUrl(array $additionalAdvancedMobileUrl = null)
    {
      $this->additionalAdvancedMobileUrl = $additionalAdvancedMobileUrl;
      return $this;
    }

    /**
     * @return IsRemove
     */
    public function getIsRemove()
    {
      return $this->isRemove;
    }

    /**
     * @param IsRemove $isRemove
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedMobileUrls
     */
    public function setIsRemove($isRemove)
    {
      $this->isRemove = $isRemove;
      return $this;
    }

}
