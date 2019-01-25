<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategy;
use Jp\YahooApis\SS\V201901\BiddingStrategy\BiddingStrategyType;

/**
 * Utility method collection for PHP Sample Program.
 */
class BiddingStrategyValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * BiddingStrategyValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return BiddingStrategy[]
     */
    public function getBiddingStrategies(): array
    {
        $biddingStrategies = [];
        if (is_null($this->valuesHolder->getBiddingStrategyValuesList())) {
            return $biddingStrategies;
        }
        foreach ($this->valuesHolder->getBiddingStrategyValuesList() as $biddingStrategyValues) {
            $biddingStrategies[] = $biddingStrategyValues->getBiddingStrategy();
        }
        return $biddingStrategies;
    }

    /**
     * @return int[]
     */
    public function getBiddingStrategyIds(): array
    {
        $biddingStrategyIds = [];
        if (is_null($this->valuesHolder->getBiddingStrategyValuesList())) {
            return $biddingStrategyIds;
        }
        foreach ($this->valuesHolder->getBiddingStrategyValuesList() as $biddingStrategyValues) {
            $biddingStrategyIds[] = $biddingStrategyValues->getBiddingStrategy()->getBiddingStrategyId();
        }
        return $biddingStrategyIds;
    }

    /**
     * @param BiddingStrategyType $biddingStrategyType
     * @return BiddingStrategy|null
     */
    public function findBiddingStrategy(string $biddingStrategyType): ?BiddingStrategy
    {
        if (is_null($this->valuesHolder->getBiddingStrategyValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getBiddingStrategyValuesList() as $biddingStrategyValues) {
            if ($biddingStrategyValues->getBiddingStrategy()->getBiddingStrategyType() === $biddingStrategyType) {
                return $biddingStrategyValues->getBiddingStrategy();
            }
        }
        return null;
    }

    /**
     * @param BiddingStrategyType $biddingStrategyType
     * @return int|null
     */
    public function findBiddingStrategyId(string $biddingStrategyType): ?int
    {
        if (is_null($this->valuesHolder->getBiddingStrategyValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getBiddingStrategyValuesList() as $biddingStrategyValues) {
            if ($biddingStrategyValues->getBiddingStrategy()->getBiddingStrategyType() === $biddingStrategyType) {
                return $biddingStrategyValues->getBiddingStrategy()->getBiddingStrategyId();
            }
        }
        return null;
    }
}
