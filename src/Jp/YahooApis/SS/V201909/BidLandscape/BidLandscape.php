<?php

namespace Jp\YahooApis\SS\V201909\BidLandscape;

abstract class BidLandscape
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
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    /**
     * @var LandscapePoints[] $landscapePoints
     */
    protected $landscapePoints = null;

    /**
     * @var string $BidLandscapeType
     */
    protected $BidLandscapeType = null;

    
    public function __construct()
    {
    
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
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
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
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
     */
    public function setAdGroupId($adGroupId)
    {
      $this->adGroupId = $adGroupId;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
     */
    public function setStartDate($startDate)
    {
      $this->startDate = $startDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

    /**
     * @return LandscapePoints[]
     */
    public function getLandscapePoints()
    {
      return $this->landscapePoints;
    }

    /**
     * @param LandscapePoints[] $landscapePoints
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
     */
    public function setLandscapePoints(array $landscapePoints = null)
    {
      $this->landscapePoints = $landscapePoints;
      return $this;
    }

    /**
     * @return string
     */
    public function getBidLandscapeType()
    {
      return $this->BidLandscapeType;
    }

    /**
     * @param string $BidLandscapeType
     * @return \Jp\YahooApis\SS\V201909\BidLandscape\BidLandscape
     */
    public function setBidLandscapeType($BidLandscapeType)
    {
      $this->BidLandscapeType = $BidLandscapeType;
      return $this;
    }

}
