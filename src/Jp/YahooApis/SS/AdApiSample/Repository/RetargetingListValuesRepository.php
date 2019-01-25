<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\RetargetingList\TargetingList;
use Jp\YahooApis\SS\V201901\RetargetingList\TargetListType;

/**
 * Utility method collection for PHP Sample Program.
 */
class RetargetingListValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * RetargetingListValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return TargetingList[]
     */
    public function getTargetLists(): array
    {
        $targetLists = [];
        if (is_null($this->valuesHolder->getRetargetingListValuesList())) {
            return $targetLists;
        }
        foreach ($this->valuesHolder->getRetargetingListValuesList() as $retargetingListValues) {
            $targetLists[] = $retargetingListValues->getTargetList();
        }
        return $targetLists;
    }

    /**
     * @return int[]
     */
    public function getTargetListIds(): array
    {
        $targetListIds = [];
        if (is_null($this->valuesHolder->getRetargetingListValuesList())) {
            return $targetListIds;
        }
        foreach ($this->valuesHolder->getRetargetingListValuesList() as $retargetingListValues) {
            $targetListIds[] = $retargetingListValues->getTargetList()->getTargetListId();
        }
        return $targetListIds;
    }

    /**
     * @param TargetListType $targetListType
     * @return int|null
     */
    public function findTargetListId(string $targetListType): ?int
    {
        if (is_null($this->valuesHolder->getRetargetingListValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getRetargetingListValuesList() as $retargetingListValues) {
            if ($retargetingListValues->getTargetList()->getTargetListType() === $targetListType) {
                return $retargetingListValues->getTargetList()->getTargetListId();
            }
        }
        return null;
    }
}
