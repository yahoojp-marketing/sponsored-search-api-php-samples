<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class WebpageParameter
{

    /**
     * @var WebpageCondition[] $conditions
     */
    protected $conditions = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return WebpageCondition[]
     */
    public function getConditions()
    {
      return $this->conditions;
    }

    /**
     * @param WebpageCondition[] $conditions
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\WebpageParameter
     */
    public function setConditions(array $conditions = null)
    {
      $this->conditions = $conditions;
      return $this;
    }

}
