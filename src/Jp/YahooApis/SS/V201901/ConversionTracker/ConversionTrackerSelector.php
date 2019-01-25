<?php

namespace Jp\YahooApis\SS\V201901\ConversionTracker;

class ConversionTrackerSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $conversionTrackerIds
     */
    protected $conversionTrackerIds = null;

    /**
     * @var string[] $appIds
     */
    protected $appIds = null;

    /**
     * @var ConversionTrackerStatus[] $statuses
     */
    protected $statuses = null;

    /**
     * @var ConversionTrackerCategory[] $categories
     */
    protected $categories = null;

    /**
     * @var ConversionTrackerType[] $conversionTrackerTypes
     */
    protected $conversionTrackerTypes = null;

    /**
     * @var TrackingCodeType[] $trackingCodeTypes
     */
    protected $trackingCodeTypes = null;

    /**
     * @var ConversionCountingType[] $countingTypes
     */
    protected $countingTypes = null;

    /**
     * @var ExcludeFromBidding[] $excludeFromBiddings
     */
    protected $excludeFromBiddings = null;

    /**
     * @var ConversionDateRange $dateRange
     */
    protected $dateRange = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
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
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getConversionTrackerIds()
    {
      return $this->conversionTrackerIds;
    }

    /**
     * @param long[] $conversionTrackerIds
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setConversionTrackerIds(array $conversionTrackerIds = null)
    {
      $this->conversionTrackerIds = $conversionTrackerIds;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getAppIds()
    {
      return $this->appIds;
    }

    /**
     * @param string[] $appIds
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setAppIds(array $appIds = null)
    {
      $this->appIds = $appIds;
      return $this;
    }

    /**
     * @return ConversionTrackerStatus[]
     */
    public function getStatuses()
    {
      return $this->statuses;
    }

    /**
     * @param ConversionTrackerStatus[] $statuses
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setStatuses(array $statuses = null)
    {
      $this->statuses = $statuses;
      return $this;
    }

    /**
     * @return ConversionTrackerCategory[]
     */
    public function getCategories()
    {
      return $this->categories;
    }

    /**
     * @param ConversionTrackerCategory[] $categories
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setCategories(array $categories = null)
    {
      $this->categories = $categories;
      return $this;
    }

    /**
     * @return ConversionTrackerType[]
     */
    public function getConversionTrackerTypes()
    {
      return $this->conversionTrackerTypes;
    }

    /**
     * @param ConversionTrackerType[] $conversionTrackerTypes
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setConversionTrackerTypes(array $conversionTrackerTypes = null)
    {
      $this->conversionTrackerTypes = $conversionTrackerTypes;
      return $this;
    }

    /**
     * @return TrackingCodeType[]
     */
    public function getTrackingCodeTypes()
    {
      return $this->trackingCodeTypes;
    }

    /**
     * @param TrackingCodeType[] $trackingCodeTypes
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setTrackingCodeTypes(array $trackingCodeTypes = null)
    {
      $this->trackingCodeTypes = $trackingCodeTypes;
      return $this;
    }

    /**
     * @return ConversionCountingType[]
     */
    public function getCountingTypes()
    {
      return $this->countingTypes;
    }

    /**
     * @param ConversionCountingType[] $countingTypes
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setCountingTypes(array $countingTypes = null)
    {
      $this->countingTypes = $countingTypes;
      return $this;
    }

    /**
     * @return ExcludeFromBidding[]
     */
    public function getExcludeFromBiddings()
    {
      return $this->excludeFromBiddings;
    }

    /**
     * @param ExcludeFromBidding[] $excludeFromBiddings
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setExcludeFromBiddings(array $excludeFromBiddings = null)
    {
      $this->excludeFromBiddings = $excludeFromBiddings;
      return $this;
    }

    /**
     * @return ConversionDateRange
     */
    public function getDateRange()
    {
      return $this->dateRange;
    }

    /**
     * @param ConversionDateRange $dateRange
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setDateRange($dateRange)
    {
      $this->dateRange = $dateRange;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Paging $paging
     * @return \Jp\YahooApis\SS\V201901\ConversionTracker\ConversionTrackerSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
