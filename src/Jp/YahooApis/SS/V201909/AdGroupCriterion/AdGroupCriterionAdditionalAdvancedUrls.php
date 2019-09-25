<?php

namespace Jp\YahooApis\SS\V201909\AdGroupCriterion;

class AdGroupCriterionAdditionalAdvancedUrls
{

    /**
     * @var AdGroupCriterionAdditionalUrl[] $additionalAdvancedUrl
     */
    protected $additionalAdvancedUrl = null;

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
    public function getAdditionalAdvancedUrl()
    {
      return $this->additionalAdvancedUrl;
    }

    /**
     * @param AdGroupCriterionAdditionalUrl[] $additionalAdvancedUrl
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedUrls
     */
    public function setAdditionalAdvancedUrl(array $additionalAdvancedUrl = null)
    {
      $this->additionalAdvancedUrl = $additionalAdvancedUrl;
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
     * @return \Jp\YahooApis\SS\V201909\AdGroupCriterion\AdGroupCriterionAdditionalAdvancedUrls
     */
    public function setIsRemove($isRemove)
    {
      $this->isRemove = $isRemove;
      return $this;
    }

}
