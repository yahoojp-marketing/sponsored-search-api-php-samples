<?php

namespace Jp\YahooApis\SS\V201901\TargetingIdea;

abstract class Attribute
{

    /**
     * @var AttributeType $attributeType
     */
    protected $attributeType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AttributeType
     */
    public function getAttributeType()
    {
      return $this->attributeType;
    }

    /**
     * @param AttributeType $attributeType
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\Attribute
     */
    public function setAttributeType($attributeType)
    {
      $this->attributeType = $attributeType;
      return $this;
    }

}
