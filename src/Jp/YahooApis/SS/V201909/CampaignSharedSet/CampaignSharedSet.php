<?php

namespace Jp\YahooApis\SS\V201909\CampaignSharedSet;

class CampaignSharedSet
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $sharedListId
     */
    protected $sharedListId = null;

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var string $sharedListName
     */
    protected $sharedListName = null;

    /**
     * @var string $campaignName
     */
    protected $campaignName = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getSharedListId()
    {
      return $this->sharedListId;
    }

    /**
     * @param int $sharedListId
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet
     */
    public function setSharedListId($sharedListId)
    {
      $this->sharedListId = $sharedListId;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return string
     */
    public function getSharedListName()
    {
      return $this->sharedListName;
    }

    /**
     * @param string $sharedListName
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet
     */
    public function setSharedListName($sharedListName)
    {
      $this->sharedListName = $sharedListName;
      return $this;
    }

    /**
     * @return string
     */
    public function getCampaignName()
    {
      return $this->campaignName;
    }

    /**
     * @param string $campaignName
     * @return \Jp\YahooApis\SS\V201909\CampaignSharedSet\CampaignSharedSet
     */
    public function setCampaignName($campaignName)
    {
      $this->campaignName = $campaignName;
      return $this;
    }

}
