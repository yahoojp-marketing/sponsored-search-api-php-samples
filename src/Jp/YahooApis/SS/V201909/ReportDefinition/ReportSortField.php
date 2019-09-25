<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class ReportSortField
{

    /**
     * @var ReportSortType $type
     */
    protected $type = null;

    /**
     * @var string $field
     */
    protected $field = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ReportSortType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param ReportSortType $type
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportSortField
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return string
     */
    public function getField()
    {
      return $this->field;
    }

    /**
     * @param string $field
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\ReportSortField
     */
    public function setField($field)
    {
      $this->field = $field;
      return $this;
    }

}
