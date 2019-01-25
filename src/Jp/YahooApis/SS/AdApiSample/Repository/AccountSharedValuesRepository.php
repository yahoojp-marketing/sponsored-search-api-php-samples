<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\AccountShared\AccountShared;

/**
 * Utility method collection for PHP Sample Program.
 */
class AccountSharedValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * AccountSharedValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return AccountShared[]
     */
    public function getAccountShareds(): array
    {
        $accountShareds = [];
        if (is_null($this->valuesHolder->getAccountSharedValuesList())) {
            return $accountShareds;
        }
        foreach ($this->valuesHolder->getAccountSharedValuesList() as $accountSharedValues) {
            $accountShareds[] = $accountSharedValues->getAccountShared();
        }
        return $accountShareds;
    }

    /**
     * @return int[]
     */
    public function getSharedListIds(): array
    {
        $sharedListIds = [];
        if (is_null($this->valuesHolder->getAccountSharedValuesList())) {
            return $sharedListIds;
        }
        foreach ($this->valuesHolder->getAccountSharedValuesList() as $accountSharedValues) {
            $sharedListIds[] = $accountSharedValues->getAccountShared()->getSharedListId();
        }
        return $sharedListIds;
    }
}