<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class AdGroupWebpagePage extends \Jp\YahooApis\SS\V201901\Page
{

    /**
     * @var AdGroupWebpageValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupWebpageValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupWebpageValues[] $values
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\AdGroupWebpagePage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
