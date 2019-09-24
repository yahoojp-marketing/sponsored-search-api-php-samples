<?php

namespace Jp\YahooApis\SS\V201909\ConversionTracker;

class ConversionTracker
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $conversionTrackerId
     */
    protected $conversionTrackerId = null;

    /**
     * @var string $conversionTrackerName
     */
    protected $conversionTrackerName = null;

    /**
     * @var ConversionTrackerStatus $status
     */
    protected $status = null;

    /**
     * @var ConversionTrackerCategory $category
     */
    protected $category = null;

    /**
     * @var int $conversions
     */
    protected $conversions = null;

    /**
     * @var string $conversionValue
     */
    protected $conversionValue = null;

    /**
     * @var int $allConversions
     */
    protected $allConversions = null;

    /**
     * @var string $allConversionValue
     */
    protected $allConversionValue = null;

    /**
     * @var string $mostRecentConversionDate
     */
    protected $mostRecentConversionDate = null;

    /**
     * @var ConversionTrackerType $conversionTrackerType
     */
    protected $conversionTrackerType = null;

    /**
     * @var string $userRevenueValue
     */
    protected $userRevenueValue = null;

    /**
     * @var ConversionCountingType $countingType
     */
    protected $countingType = null;

    /**
     * @var ExcludeFromBidding $excludeFromBidding
     */
    protected $excludeFromBidding = null;

    /**
     * @var int $measurementPeriod
     */
    protected $measurementPeriod = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getConversionTrackerId()
    {
      return $this->conversionTrackerId;
    }

    /**
     * @param int $conversionTrackerId
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setConversionTrackerId($conversionTrackerId)
    {
      $this->conversionTrackerId = $conversionTrackerId;
      return $this;
    }

    /**
     * @return string
     */
    public function getConversionTrackerName()
    {
      return $this->conversionTrackerName;
    }

    /**
     * @param string $conversionTrackerName
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setConversionTrackerName($conversionTrackerName)
    {
      $this->conversionTrackerName = $conversionTrackerName;
      return $this;
    }

    /**
     * @return ConversionTrackerStatus
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param ConversionTrackerStatus $status
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

    /**
     * @return ConversionTrackerCategory
     */
    public function getCategory()
    {
      return $this->category;
    }

    /**
     * @param ConversionTrackerCategory $category
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setCategory($category)
    {
      $this->category = $category;
      return $this;
    }

    /**
     * @return int
     */
    public function getConversions()
    {
      return $this->conversions;
    }

    /**
     * @param int $conversions
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setConversions($conversions)
    {
      $this->conversions = $conversions;
      return $this;
    }

    /**
     * @return string
     */
    public function getConversionValue()
    {
      return $this->conversionValue;
    }

    /**
     * @param string $conversionValue
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setConversionValue($conversionValue)
    {
      $this->conversionValue = $conversionValue;
      return $this;
    }

    /**
     * @return int
     */
    public function getAllConversions()
    {
      return $this->allConversions;
    }

    /**
     * @param int $allConversions
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setAllConversions($allConversions)
    {
      $this->allConversions = $allConversions;
      return $this;
    }

    /**
     * @return string
     */
    public function getAllConversionValue()
    {
      return $this->allConversionValue;
    }

    /**
     * @param string $allConversionValue
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setAllConversionValue($allConversionValue)
    {
      $this->allConversionValue = $allConversionValue;
      return $this;
    }

    /**
     * @return string
     */
    public function getMostRecentConversionDate()
    {
      return $this->mostRecentConversionDate;
    }

    /**
     * @param string $mostRecentConversionDate
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setMostRecentConversionDate($mostRecentConversionDate)
    {
      $this->mostRecentConversionDate = $mostRecentConversionDate;
      return $this;
    }

    /**
     * @return ConversionTrackerType
     */
    public function getConversionTrackerType()
    {
      return $this->conversionTrackerType;
    }

    /**
     * @param ConversionTrackerType $conversionTrackerType
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setConversionTrackerType($conversionTrackerType)
    {
      $this->conversionTrackerType = $conversionTrackerType;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserRevenueValue()
    {
      return $this->userRevenueValue;
    }

    /**
     * @param string $userRevenueValue
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setUserRevenueValue($userRevenueValue)
    {
      $this->userRevenueValue = $userRevenueValue;
      return $this;
    }

    /**
     * @return ConversionCountingType
     */
    public function getCountingType()
    {
      return $this->countingType;
    }

    /**
     * @param ConversionCountingType $countingType
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setCountingType($countingType)
    {
      $this->countingType = $countingType;
      return $this;
    }

    /**
     * @return ExcludeFromBidding
     */
    public function getExcludeFromBidding()
    {
      return $this->excludeFromBidding;
    }

    /**
     * @param ExcludeFromBidding $excludeFromBidding
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setExcludeFromBidding($excludeFromBidding)
    {
      $this->excludeFromBidding = $excludeFromBidding;
      return $this;
    }

    /**
     * @return int
     */
    public function getMeasurementPeriod()
    {
      return $this->measurementPeriod;
    }

    /**
     * @param int $measurementPeriod
     * @return \Jp\YahooApis\SS\V201909\ConversionTracker\ConversionTracker
     */
    public function setMeasurementPeriod($measurementPeriod)
    {
      $this->measurementPeriod = $measurementPeriod;
      return $this;
    }

}
