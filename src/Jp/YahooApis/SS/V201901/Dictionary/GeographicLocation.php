<?php

namespace Jp\YahooApis\SS\V201901\Dictionary;

class GeographicLocation
{

    /**
     * @var string $code
     */
    protected $code = null;

    /**
     * @var string $parent
     */
    protected $parent = null;

    /**
     * @var string $name
     */
    protected $name = null;

    /**
     * @var string $fullName
     */
    protected $fullName = null;

    /**
     * @var string $order
     */
    protected $order = null;

    /**
     * @var GeographicLocationStatus $status
     */
    protected $status = null;

    /**
     * @var GeographicLocation[] $child
     */
    protected $child = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCode()
    {
      return $this->code;
    }

    /**
     * @param string $code
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setCode($code)
    {
      $this->code = $code;
      return $this;
    }

    /**
     * @return string
     */
    public function getParent()
    {
      return $this->parent;
    }

    /**
     * @param string $parent
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setParent($parent)
    {
      $this->parent = $parent;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param string $name
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setName($name)
    {
      $this->name = $name;
      return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
      return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setFullName($fullName)
    {
      $this->fullName = $fullName;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
      return $this->order;
    }

    /**
     * @param string $order
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setOrder($order)
    {
      $this->order = $order;
      return $this;
    }

    /**
     * @return GeographicLocationStatus
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param GeographicLocationStatus $status
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

    /**
     * @return GeographicLocation[]
     */
    public function getChild()
    {
      return $this->child;
    }

    /**
     * @param GeographicLocation[] $child
     * @return \Jp\YahooApis\SS\V201901\Dictionary\GeographicLocation
     */
    public function setChild(array $child = null)
    {
      $this->child = $child;
      return $this;
    }

}
