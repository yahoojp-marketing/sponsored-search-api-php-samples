<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAd;
use Jp\YahooApis\SS\V201909\AdGroupAd\AdType;

/**
 * Utility method collection for PHP Sample Program.
 */
class AdGroupAdValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * AdGroupAdValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return AdGroupAd[]
     */
    public function getAdGroupAds(): array
    {
        $adGroupAds = [];
        if (!is_null($this->valuesHolder->getAdGroupAdValuesList())) {
            foreach ($this->valuesHolder->getAdGroupAdValuesList() as $adGroupValues) {
                $adGroupAds[] = $adGroupValues->getAdGroupAd();
            }
        }
        return $adGroupAds;
    }

    /**
     * @return int[]
     */
    public function getAdIds(): array
    {
        $adIds = [];
        if (!is_null($this->valuesHolder->getAdGroupAdValuesList())) {
            foreach ($this->valuesHolder->getAdGroupAdValuesList() as $adGroupAdValues) {
                $adIds[] = $adGroupAdValues->getAdGroupAd()->getAdId();
            }
        }
        return $adIds;
    }

    /**
     * @param int $campaignId
     * @param int $adGroupId
     * @param AdType $adType
     * @return int|null
     */
    public function findAdId(int $campaignId, int $adGroupId, string $adType): ?int
    {
        if (is_null($this->valuesHolder->getAdGroupAdValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getAdGroupAdValuesList() as $adGroupValues) {
            if ($adGroupValues->getAdGroupAd()->getCampaignId() === $campaignId
                && $adGroupValues->getAdGroupAd()->getAdGroupId() === $adGroupId
                && $adGroupValues->getAdGroupAd()->getAd()->getType() === $adType) {
                return $adGroupValues->getAdGroupAd()->getAdId();
            }
        }
        return null;
    }
}
