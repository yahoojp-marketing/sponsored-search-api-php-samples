<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AdGroupAd\AdGroupAd;
use Jp\YahooApis\SS\V201901\AdGroupAd\AdType;
use Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterion;
use Jp\YahooApis\SS\V201901\AdGroupCriterion\AdGroupCriterionUse;

/**
 * Utility method collection for PHP Sample Program.
 */
class AdGroupCriterionValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * AdGroupCriterionValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return AdGroupCriterion[]
     */
    public function getAdGroupCriterions(): array
    {
        $adGroupCriterions = [];
        if (!is_null($this->valuesHolder->getAdGroupCriterionValuesList())) {
            foreach ($this->valuesHolder->getAdGroupCriterionValuesList() as $adGroupCriterionValues) {
                $adGroupCriterions[] = $adGroupCriterionValues->getAdGroupCriterion();
            }
        }
        return $adGroupCriterions;
    }

    /**
     * @return int[]
     */
    public function getCriterionIds(): array
    {
        $criterionIds = [];
        if (!is_null($this->valuesHolder->getAdGroupCriterionValuesList())) {
            foreach ($this->valuesHolder->getAdGroupCriterionValuesList() as $adGroupCriterionValues) {
                $criterionIds[] = $adGroupCriterionValues->getAdGroupCriterion()->getCriterion()->getCriterionId();
            }
        }
        return $criterionIds;
    }

    /**
     * @param int $campaignId
     * @param int $adGroupId
     * @param AdGroupCriterionUse $adGroupCriterionUse
     * @return int|null
     */
    public function findCriterionId(int $campaignId, int $adGroupId, string $adGroupCriterionUse): ?int
    {
        if (is_null($this->valuesHolder->getAdGroupCriterionValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getAdGroupCriterionValuesList() as $adGroupCriterionValues) {
            if ($adGroupCriterionValues->getAdGroupCriterion()->getCampaignId() === $campaignId
                && $adGroupCriterionValues->getAdGroupCriterion()->getAdGroupId() === $adGroupId
                && $adGroupCriterionValues->getAdGroupCriterion()->getCriterionUse() === $adGroupCriterionUse) {
                return $adGroupCriterionValues->getAdGroupCriterion()->getCriterion()->getCriterionId();
            }
        }
        return null;
    }
}
