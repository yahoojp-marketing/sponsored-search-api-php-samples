<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdSetTrademarkStatus
{

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var int $adGroupId
     */
    protected $adGroupId = null;

    /**
     * @var int $adId
     */
    protected $adId = null;

    /**
     * @param int $campaignId
     * @param int $adGroupId
     * @param int $adId
     */
    public function __construct($campaignId, $adGroupId, $adId)
    {
      $this->campaignId = $campaignId;
      $this->adGroupId = $adGroupId;
      $this->adId = $adId;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->campaignId;
    }

    /**
     * @param int $campaignId
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatus
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupId()
    {
      return $this->adGroupId;
    }

    /**
     * @param int $adGroupId
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatus
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdId()
    {
      return $this->adId;
    }

    /**
     * @param int $adId
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdSetTrademarkStatus
     */
    public function setAdId($adId)
    {
      $this->adId = $adId;
      return $this;
    }

}
