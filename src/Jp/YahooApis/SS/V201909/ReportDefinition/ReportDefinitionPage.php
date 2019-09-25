<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class ReportDefinitionPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var ReportDefinitionValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ReportDefinitionValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param ReportDefinitionValues[] $values
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportDefinitionPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
