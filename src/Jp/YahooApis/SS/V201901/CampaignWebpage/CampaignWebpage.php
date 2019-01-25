<?php

namespace Jp\YahooApis\SS\V201901\CampaignWebpage;

class CampaignWebpage
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $campaignId
     */
    protected $campaignId = null;

    /**
     * @var int $campaignTrackId
     */
    protected $campaignTrackId = null;

    /**
     * @var Webpage $webpage
     */
    protected $webpage = null;

    /**
     * @param int $campaignId
     * @param Webpage $webpage
     */
    public function __construct($campaignId, $webpage)
    {
      $this->campaignId = $campaignId;
      $this->webpage = $webpage;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpage
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpage
     */
    public function setCampaignId($campaignId)
    {
      $this->campaignId = $campaignId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignTrackId()
    {
      return $this->campaignTrackId;
    }

    /**
     * @param int $campaignTrackId
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpage
     */
    public function setCampaignTrackId($campaignTrackId)
    {
      $this->campaignTrackId = $campaignTrackId;
      return $this;
    }

    /**
     * @return Webpage
     */
    public function getWebpage()
    {
      return $this->webpage;
    }

    /**
     * @param Webpage $webpage
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\CampaignWebpage
     */
    public function setWebpage($webpage)
    {
      $this->webpage = $webpage;
      return $this;
    }

}
