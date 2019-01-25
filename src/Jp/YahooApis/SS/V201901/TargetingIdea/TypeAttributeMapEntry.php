<?php

namespace Jp\YahooApis\SS\V201901\TargetingIdea;

class TypeAttributeMapEntry
{

    /**
     * @var AttributeType $key
     */
    protected $key = null;

    /**
     * @var Attribute $value
     */
    protected $value = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AttributeType
     */
    public function getKey()
    {
      return $this->key;
    }

    /**
     * @param AttributeType $key
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\TypeAttributeMapEntry
     */
    public function setKey($key)
    {
      $this->key = $key;
      return $this;
    }

    /**
     * @return Attribute
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param Attribute $value
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\TypeAttributeMapEntry
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
