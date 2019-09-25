<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\AdGroup\AdGroup;

/**
 * Utility method collection for PHP Sample Program.
 */
class AdGroupValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * AdGroupValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return AdGroup[]
     */
    public function getAdGroups(): array
    {
        $adGroups = [];
        if (!is_null($this->valuesHolder->getAdGroupValuesList())) {
            foreach ($this->valuesHolder->getAdGroupValuesList() as $adGroupValues) {
                $adGroups[] = $adGroupValues->getAdGroup();
            }
        }
        return $adGroups;
    }

    /**
     * @return int[]
     */
    public function getAdGroupIds(): array
    {
        $adGroupIds = [];
        if (!is_null($this->valuesHolder->getAdGroupValuesList())) {
            foreach ($this->valuesHolder->getAdGroupValuesList() as $adGroupValues) {
                $adGroupIds[] = $adGroupValues->getAdGroup()->getAdGroupId();
            }
        }
        return $adGroupIds;
    }

    /**
     * @param int $campaignId
     * @return int|null
     */
    public function findAdGroupId(int $campaignId): ?int
    {
        if (is_null($this->valuesHolder->getAdGroupValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getAdGroupValuesList() as $adGroupValues) {
            if ($adGroupValues->getAdGroup()->getCampaignId() === $campaignId) {
                return $adGroupValues->getAdGroup()->getAdGroupId();
            }
        }
        return null;
    }
}
