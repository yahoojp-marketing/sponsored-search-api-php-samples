<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

abstract class SearchParameter
{

    /**
     * @var SearchParameterUse $searchParameterUse
     */
    protected $searchParameterUse = null;

    /**
     * @param SearchParameterUse $searchParameterUse
     */
    public function __construct($searchParameterUse)
    {
      $this->searchParameterUse = $searchParameterUse;
    }

    /**
     * @return SearchParameterUse
     */
    public function getSearchParameterUse()
    {
      return $this->searchParameterUse;
    }

    /**
     * @param SearchParameterUse $searchParameterUse
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\SearchParameter
     */
    public function setSearchParameterUse($searchParameterUse)
    {
      $this->searchParameterUse = $searchParameterUse;
      return $this;
    }

}
