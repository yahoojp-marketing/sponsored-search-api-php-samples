<?php

namespace Jp\YahooApis\SS\V201901\CampaignTarget;

class CampaignTargetSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $campaignIds
     */
    protected $campaignIds = null;

    /**
     * @var string[] $targetIds
     */
    protected $targetIds = null;

    /**
     * @var TargetType[] $targetTypes
     */
    protected $targetTypes = null;

    /**
     * @var ExcludedType $excludedType
     */
    protected $excludedType = null;

    /**
     * @var PlatformType[] $platformTypes
     */
    protected $platformTypes = null;

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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->campaignIds;
    }

    /**
     * @param long[] $campaignIds
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getTargetIds()
    {
      return $this->targetIds;
    }

    /**
     * @param string[] $targetIds
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setTargetIds(array $targetIds = null)
    {
      $this->targetIds = $targetIds;
      return $this;
    }

    /**
     * @return TargetType[]
     */
    public function getTargetTypes()
    {
      return $this->targetTypes;
    }

    /**
     * @param TargetType[] $targetTypes
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setTargetTypes(array $targetTypes = null)
    {
      $this->targetTypes = $targetTypes;
      return $this;
    }

    /**
     * @return ExcludedType
     */
    public function getExcludedType()
    {
      return $this->excludedType;
    }

    /**
     * @param ExcludedType $excludedType
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setExcludedType($excludedType)
    {
      $this->excludedType = $excludedType;
      return $this;
    }

    /**
     * @return PlatformType[]
     */
    public function getPlatformTypes()
    {
      return $this->platformTypes;
    }

    /**
     * @param PlatformType[] $platformTypes
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setPlatformTypes(array $platformTypes = null)
    {
      $this->platformTypes = $platformTypes;
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
     * @return \Jp\YahooApis\SS\V201901\CampaignTarget\CampaignTargetSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
