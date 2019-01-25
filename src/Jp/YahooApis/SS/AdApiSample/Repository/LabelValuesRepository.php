<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;

/**
 * Utility method collection for PHP Sample Program.
 */
class LabelValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * LabelValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    public function getLabels():array
    {
        $labels = [];
        if (is_null($this->valuesHolder->getLabelValuesList())) {
            return $labels;
        }
        foreach ($this->valuesHolder->getLabelValuesList() as $labelValues) {
            $labels[] = $labelValues->getLabel();
        }
        return $labels;
    }

    /**
     * @return int[]
     */
    public function getLabelIds(): array
    {
        $labelIds = [];
        if (is_null($this->valuesHolder->getLabelValuesList())) {
            return $labelIds;
        }
        foreach ($this->valuesHolder->getLabelValuesList() as $labelValues) {
            $labelIds[] = $labelValues->getLabel()->getLabelId();
        }
        return $labelIds;
    }
}