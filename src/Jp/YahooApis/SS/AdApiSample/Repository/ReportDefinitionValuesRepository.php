<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\ReportDefinition\ReportDefinition;

/**
 * Utility method collection for PHP Sample Program.
 */
class ReportDefinitionValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * ReportDefinitionValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return ReportDefinition[]
     */
    public function getReportDefinitions(): array
    {
        $reportDefinitions = [];
        if (is_null($this->valuesHolder->getReportDefinitionValuesList())) {
            return $reportDefinitions;
        }
        foreach ($this->valuesHolder->getReportDefinitionValuesList() as $reportDefinitionValues) {
            $reportDefinitions[] = $reportDefinitionValues->getReportDefinition();
        }
        return $reportDefinitions;
    }

    /**
     * @return int[]
     */
    public function getReportIds(): array
    {
        $reportIds = [];
        if (is_null($this->valuesHolder->getReportDefinitionValuesList())) {
            return $reportIds;
        }
        foreach ($this->valuesHolder->getReportDefinitionValuesList() as $reportDefinitionValues) {
            $reportIds[] = $reportDefinitionValues->getReportDefinition()->getReportId();
        }
        return $reportIds;
    }
}
