<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class CustomParameters
{

    /**
     * @var IsRemove $isRemove
     */
    protected $isRemove = null;

    /**
     * @var CustomParameter[] $parameters
     */
    protected $parameters = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return IsRemove
     */
    public function getIsRemove()
    {
      return $this->isRemove;
    }

    /**
     * @param IsRemove $isRemove
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\CustomParameters
     */
    public function setIsRemove($isRemove)
    {
      $this->isRemove = $isRemove;
      return $this;
    }

    /**
     * @return CustomParameter[]
     */
    public function getParameters()
    {
      return $this->parameters;
    }

    /**
     * @param CustomParameter[] $parameters
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\CustomParameters
     */
    public function setParameters(array $parameters = null)
    {
      $this->parameters = $parameters;
      return $this;
    }

}
