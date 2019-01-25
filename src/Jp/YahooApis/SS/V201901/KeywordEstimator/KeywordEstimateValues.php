<?php

namespace Jp\YahooApis\SS\V201901\KeywordEstimator;

class KeywordEstimateValues extends \Jp\YahooApis\SS\V201901\ReturnValue
{

    /**
     * @var KeywordEstimateResult $data
     */
    protected $data = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return KeywordEstimateResult
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * @param KeywordEstimateResult $data
     * @return \Jp\YahooApis\SS\V201901\KeywordEstimator\KeywordEstimateValues
     */
    public function setData($data)
    {
      $this->data = $data;
      return $this;
    }

}
